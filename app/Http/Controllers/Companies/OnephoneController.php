<?php

namespace App\Http\Controllers\Companies;

use App\Http\Controllers\Controller;

class OnephoneController extends Controller
{
    public function show()
    {
        $testimonials = [
            [
                'image' => 'images/card1.png',
                'title' => 'Aditya Eka Prasetya',
                'subtitle' => 'Founder of Gun Market',
                'rating' => 5,
                'comment' => 'We’ve expanded our lineup of carbon-neutral products to include Aeraphone one series.',
            ],
            [
                'image' => 'images/card2.png',
                'title' => 'Siti Nurhaliza',
                'subtitle' => 'CEO of GreenTech',
                'rating' => 4,
                'comment' => 'Service sangat memuaskan, produk berkualitas tinggi!',
            ],
            [
                'image' => 'images/card3.png',
                'title' => 'Budi Santoso',
                'subtitle' => 'Entrepreneur',
                'rating' => 5,
                'comment' => 'Pelayanan cepat dan responsif, sangat direkomendasikan.',
            ],
        ];

        return view('companies.onephone', compact('testimonials'));
    }
}
