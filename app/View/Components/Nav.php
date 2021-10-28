<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Nav extends Component
{
    public $search;
    public $type_search;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($search=true , $type_search=1 )
    {
        $this->search=$search;
        $this->type_search=$type_search;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav');
    }
}
