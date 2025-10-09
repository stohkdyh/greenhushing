<?php

namespace App\Http\Controllers;

use App\Models\PostTest;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostTestController extends Controller
{
    public function show($productName)
    {
        // Validate product name
        if (!in_array($productName, ['onephone', 'neuphone', 'xarelphone', 'zenophone'])) {
            return redirect()->route('market')->with('error', __('Invalid product.'));
        }

        $respondentId = session('respondent_id');
        
        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }

        // Check if user has already completed post-test for this product
        $existingPostTest = PostTest::where('respondent_id', $respondentId)
            ->where('product_name', $productName)
            ->first();
        
        if ($existingPostTest) {
            return redirect()->route('market')
                ->with('info', __('You have already completed the post-test for :product.', ['product' => $productName]));
        }

        // Get all questions for this product
        $questions = $this->getQuestionsForProduct($productName);
        $displayName = ucfirst($productName);
        $hasManipulationQuestions = in_array($productName, ['zenophone', 'neuphone']);

        // Show post-test form for this product
        return view('post-test', compact(
            'questions', 
            'productName', 
            'displayName', 
            'hasManipulationQuestions'
        ));
    }

    public function store(Request $request, $productName)
    {
        // Validate product name
        if (!in_array($productName, ['onephone', 'neuphone', 'xarelphone', 'zenophone'])) {
            return redirect()->route('market')->with('error', __('Invalid product.'));
        }

        // Build validation rules based on product
        $validationRules = [];
        
        // Post-test questions for all products
        for ($i = 1; $i <= 31; $i++) {
            // Skip questions 16-18 for onephone and xarelphone
            if (!in_array($productName, ['zenophone', 'neuphone']) && in_array($i, [16, 17, 18])) {
                continue;
            }
            $validationRules["pt_q$i"] = 'required|integer|between:1,7';
        }
        
        // Add validation for intention to buy
        $validationRules["intention_to_buy"] = 'required|integer|between:1,10';
        
        // Add validation for manipulation questions if applicable
        if (in_array($productName, ['zenophone', 'neuphone'])) {
            $manipulationCount = $productName === 'zenophone' ? 13 : 7;
            for ($i = 1; $i <= $manipulationCount; $i++) {
                $validationRules["mc_q$i"] = 'required|in:yes,no';
            }
        }

        // Validate the request
        $validated = $request->validate($validationRules);

        // Get respondent ID from session
        $respondentId = session('respondent_id');

        if (!$respondentId) {
            return redirect()->route('welcome')->with('error', __('Please complete your profile first.'));
        }

        // Check if user already completed post-test for this product
        $existingPostTest = PostTest::where('respondent_id', $respondentId)
            ->where('product_name', $productName)
            ->first();
        
        if ($existingPostTest) {
            return redirect()->route('market')->with('info', __('You have already completed the post-test for this product.'));
        }

        // Prepare data for database
        $postTestData = [
            'respondent_id' => $respondentId,
            'product_name' => $productName,
            'intention_to_buy' => $validated['intention_to_buy'],
        ];
        
        // Add post-test questions
        for ($i = 1; $i <= 31; $i++) {
            // Skip questions 16-18 for onephone and xarelphone
            if (!in_array($productName, ['zenophone', 'neuphone']) && in_array($i, [16, 17, 18])) {
                continue;
            }
            
            if (isset($validated["pt_q$i"])) {
                $postTestData["pt_q$i"] = $validated["pt_q$i"];
            }
        }
        
        // Add manipulation check answers as JSON if applicable
        if (in_array($productName, ['zenophone', 'neuphone'])) {
            $manipulationAnswers = [];
            $manipulationCount = $productName === 'zenophone' ? 13 : 7;
            
            for ($i = 1; $i <= $manipulationCount; $i++) {
                $manipulationAnswers["q$i"] = $validated["mc_q$i"];
            }
            
            $postTestData['manipulation_answers'] = json_encode($manipulationAnswers);
        }

        // Create post-test record
        PostTest::create($postTestData);

        // Store completion in session array
        $completedPostTests = session('completed_post_tests', []);
        $completedPostTests[] = $productName;
        session(['completed_post_tests' => $completedPostTests]);

        // Check if all post-tests for available products have been completed
        $productsToShow = session('products_to_show', ['onephone', 'neuphone', 'xarelphone', 'zenophone']);
        $allCompleted = true;
        
        foreach ($productsToShow as $product) {
            if (!in_array($product, $completedPostTests)) {
                $allCompleted = false;
                break;
            }
        }

        // if ($allCompleted) {
        //     session(['all_post_tests_completed' => true]);
        //     return redirect()->route('end')->with('success', __('All post-tests completed successfully! Thank you for your participation.'));
        // }

        // Redirect back to market to continue with other products
        return redirect()->route('market')->with('success', __('Post-test for :product completed successfully!', ['product' => ucfirst($productName)]));
    }

    private function getQuestionsForProduct($productName)
    {
        $questions = [];
        $productCapitalized = ucfirst($productName);
        
        // Add manipulation check questions if applicable
        if (in_array($productName, ['zenophone', 'neuphone'])) {
            $manipulationQuestions = [];
            
            if ($productName === 'zenophone') {
                $manipulationQuestions = [
                    "mc_q1" => __(':product presents a confusing message (using certain words and images) about its environmental behavior.', ['product' => $productCapitalized]),
                    "mc_q2" => __(':product provides vague or seemingly unprovable environmental claims about its environmental performance.', ['product' => $productCapitalized]),
                    "mc_q3" => __(':product overstates or exaggerates its environmental behavior.', ['product' => $productCapitalized]),
                    "mc_q4" => __(':product omits or hides important information about its real environmental behavior.', ['product' => $productCapitalized]),
                    "mc_q5" => __('The product deceives me by means of words in its environmental features'),
                    "mc_q6" => __('The product deceives me by means of visuals or graphics in its environmental features'),
                    "mc_q7" => __('The product deceives me by means of green claims that are unclear'),
                    "mc_q8" => __('The product exaggerates or overstates its green functionality'),
                    "mc_q9" => __('The product hides important information, making the green claim sound better than it is'),
                    "mc_q10" => __('The mission, vision and values of :product, visible on its website, clearly focus on transmitting its total commitment to the environment', ['product' => $productCapitalized]),
                    "mc_q11" => __(':product`s website has content on environmental aspects of the company', ['product' => $productCapitalized]),
                    "mc_q12" => __(':product is a clear example for the rest of the companies in the sector on how the environmental aspects in a company should be treated to guarantee low environmental impact.', ['product' => $productCapitalized]),
                    "mc_q13" => __(':product has good environmental performance', ['product' => $productCapitalized])
                ];
            } else { // neuphone
                $manipulationQuestions = [
                    "mc_q1" => __(':product does not disclose the negative environmental impact of its production or operational activities or related data.', ['product' => $productCapitalized]),
                    "mc_q2" => __(':product does not disclose environmental data, monitoring results, or carbon emission information', ['product' => $productCapitalized]),
                    "mc_q3" => __(':product does not disclose the achievements in environmental protection, energy conservation or emission reduction.', ['product' => $productCapitalized]),
                    "mc_q4" => __('The mission, vision and values of :product, visible on its website, clearly focus on transmitting its total commitment to the environment', ['product' => $productCapitalized]),
                    "mc_q5" => __(':product`s website has content on environmental aspects of the company', ['product' => $productCapitalized]),
                    "mc_q6" => __(':product is a clear example for the rest of the companies in the sector on how the environmental aspects in a company should be treated to guarantee low environmental impact.', ['product' => $productCapitalized]),
                    "mc_q7" => __(':product has good environmental performance', ['product' => $productCapitalized])
                ];
            }
            
            $questions['manipulation'] = $manipulationQuestions;
        }
        
        // Add intention to buy question
        $questions['intention_to_buy'] = __('From 1 to 10, what number best represents your feelings about buying :product?', ['product' => $productCapitalized]);
        
        // Add post-test questions from language files
        $postTestQuestions = [];
        
        // Green Confusion (GC) questions
        $postTestQuestions["pt_q1"] = __('GC1');
        $postTestQuestions["pt_q2"] = __('GC2');
        $postTestQuestions["pt_q3"] = __('GC3');
        $postTestQuestions["pt_q4"] = __('GC4');
        $postTestQuestions["pt_q5"] = __('GC5');
        
        // Green Choice Confusion (GCC) questions
        $postTestQuestions["pt_q6"] = __('GCC1');
        $postTestQuestions["pt_q7"] = __('GCC2');
        $postTestQuestions["pt_q8"] = __('GCC3');
        $postTestQuestions["pt_q9"] = __('GCC4');
        $postTestQuestions["pt_q10"] = __('GCC5');
        
        // Green Perceived Risk (GPR) questions
        $postTestQuestions["pt_q11"] = __('GPR1');
        $postTestQuestions["pt_q12"] = __('GPR2');
        $postTestQuestions["pt_q13"] = __('GPR3');
        $postTestQuestions["pt_q14"] = __('GPR4');
        $postTestQuestions["pt_q15"] = __('GPR5');
        
        // Green Trust (GT) questions
        $postTestQuestions["pt_q16"] = __('GT1');
        $postTestQuestions["pt_q17"] = __('GT2');
        $postTestQuestions["pt_q18"] = __('GT3');
        $postTestQuestions["pt_q19"] = __('GT4');
        $postTestQuestions["pt_q20"] = __('GT5');
        
        // Green Reputation (GR) questions - only for zenophone and neuphone
        if (in_array($productName, ['zenophone', 'neuphone'])) {
            $postTestQuestions["pt_q21"] = __('GR1');
        }
        // GR1honest only for onephone and xarelphone
        else {
            $postTestQuestions["pt_q21"] = __('GR1honest');
        }
        $postTestQuestions["pt_q22"] = __('GR2');
        $postTestQuestions["pt_q23"] = __('GR3');
        
        // Green Purchase Intention (GPI) questions
        $postTestQuestions["pt_q24"] = __('GPI1');
        $postTestQuestions["pt_q25"] = __('GPI2');
        $postTestQuestions["pt_q26"] = __('GPI3');
        $postTestQuestions["pt_q27"] = __('GPI4');
        $postTestQuestions["pt_q28"] = __('GPI5');
        $postTestQuestions["pt_q29"] = __('GPI6');
        $postTestQuestions["pt_q30"] = __('GPI7');
        $postTestQuestions["pt_q31"] = __('GPI8');
        
        $questions['post_test'] = $postTestQuestions;
        
        return $questions;
    }
}
