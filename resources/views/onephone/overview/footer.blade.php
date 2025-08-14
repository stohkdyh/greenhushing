<x-footer 
    brand="Onephone" 
    logo="images/logo_claim_green.png"
    bg="bg-[#163F22]" 
    newsletterTitle="{{ __('Onephone Newsletter') }}"
    newsletterDesc="{{ __('Stay up to date with the latest news and stories from Onephone.') }}"
    :menus="[
        __('Support') => [
            ['label' => __('Contact Us'), 'url' => '/'],
            ['label' => __('User Guide'), 'url' => '/'],
            ['label' => __('Warranty'), 'url' => '/'],
            ['label' => __('International Warranty'), 'url' => '/'],
            ['label' => __('Scooter Safety Notice'), 'url' => '/'],
            ['label' => __('Android Enterprise Recommended'), 'url' => '/'],
            ['label' => __('Digital Services Act'), 'url' => '/'],
        ],
        __('About Us') => [
            ['label' => __('Onephone'), 'url' => '/'],
            ['label' => __('Management Team'), 'url' => '/'],
            ['label' => __('Privacy Policy'), 'url' => '/'],
            ['label' => __('Integrity & Compliance'), 'url' => '/'],
            ['label' => __('Investor Relations'), 'url' => '/'],
            ['label' => __('ESG and Sustainability'), 'url' => '/'],
            ['label' => __('Trust Center'), 'url' => '/'],
            ['label' => __('Accessibility'), 'url' => '/'],
            ['label' => __('HyperOS'), 'url' => '/'],
        ],
        __('Products') => [
            ['label' => __('Onephone'), 'url' => '/'],
            ['label' => __('Onephone with'), 'url' => '/'],
            ['label' => __('Onebuds'), 'url' => '/'],
            ['label' => __('Spare Parts'), 'url' => '/'],
            ['label' => __('Giftcard'), 'url' => '/'],
            ['label' => __('Where to Buy'), 'url' => '/'],
            ['label' => __('Promotions'), 'url' => '/'],
        ],
        __('Services') => [
            ['label' => __('Refer a Friend'), 'url' => '/'],
            ['label' => __('Getting Started'), 'url' => '/'],
        ],
    ]"
/>
