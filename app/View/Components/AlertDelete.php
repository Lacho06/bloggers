<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AlertDelete extends Component
{
    public $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post=null)
    {
        $this->post=$post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert-delete');
    }
}
