<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Inbox extends Component
{ 
    public $notifications;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($notifications)
    {
        //
        $this->notifications=$notifications;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.inbox');
    }
}
