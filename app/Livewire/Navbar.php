<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Navbar extends Component
{
    public bool $isOpen = false;

    public function toggleMenu()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function render()
    {
        return view('livewire.components.navbar');
    }
}