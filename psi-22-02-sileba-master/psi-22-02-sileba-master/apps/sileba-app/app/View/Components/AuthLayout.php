<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthLayout extends Component
{
    public $title;
    public function __construct($title = null)
    {
        $this->title = $title ?? 'SMK Negeri 3 Balige';
    }

    public function render()
    {
        return view('themes.auth.main');
    }
}
