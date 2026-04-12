<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SeoMeta extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $keyword;
    public $description;
    public function __construct($title='Pokhara Yoga', $keyword='', $description='')
    {
        $this->title = $title;
        $this->keyword = $keyword;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.seo-meta');
    }
}
