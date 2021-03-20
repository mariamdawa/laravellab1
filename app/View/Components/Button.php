<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
   

    public function __construct($type)
    {
       
        //
    }
    public function render()
    {
        return view('components.button');
    }
}
