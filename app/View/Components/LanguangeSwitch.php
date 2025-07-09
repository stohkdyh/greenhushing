<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LanguangeSwitch extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $languages = [
            'en' => 'English',
            'id' => 'Indonesia',
        ];

        return view('components.languange-switch', compact('languages'));
    }
}
