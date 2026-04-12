<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageBanner extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $image;
    public function __construct($title,$image='')
    {
        $this->title = $title;
        $this->image = $image?$image : asset('assets/images/slider-1.jpeg');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-banner');
    }
}
