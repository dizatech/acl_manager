<?php

namespace Dizatech\AclManager\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * The type of menu, modules or manager
     * @var
     */
    public $type;

    public function __construct()
    {

    }

    public function render()
    {
        return view('moduleMenu::components.menu');
    }
}
