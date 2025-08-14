<x-product5-card 
    :image="'images/feature.png'"
    :specsLeft="[
        ['icon' => view('components.icon.camera')->render(), 'title' => 'Rear Camera Zoom', 'value' => 'Digital Zoom up to 10x'],
        ['icon' => view('components.icon.cpu')->render(), 'title' => 'CPU Speed', 'value' => '2.9 GHz'],
        ['icon' => view('components.icon.storage')->render(), 'title' => 'RAM / Storage', 'value' => '8 GB / 256 GB']
    ]"
    :specsRight="[
        ['icon' => view('components.icon.resolution-cam')->render(), 'title' => 'Resolution (Multiple)', 'value' => '50 MP + 12 MP + 24 MP'],
        ['icon' => view('components.icon.resolution')->render(), 'title' => 'Resolution (Main Display)', 'value' => '1080 x 2340 (FHD+)'],
        ['icon' => view('components.icon.weight')->render(), 'title' => 'Weight', 'value' => '169 grams']
    ]"
    textColor="#1C4F2B"
    textValueColor="#1C4F2B"
    imageWidth="400px"
    mb="mb-0"
/>
