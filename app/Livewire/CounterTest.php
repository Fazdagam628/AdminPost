<?php

namespace App\Livewire;

use Livewire\Component;

class CounterTest extends Component
{
    // app/Livewire/CounterTest.php
    public $count = 0;
    public function increment()
    {
        $this->count++;
    }
    public function render()
    {
        return view('livewire.counter-test');
    }
}