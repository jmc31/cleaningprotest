<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\Attributes\Layout;

class Transactions extends Component
{
    #[Layout('layouts.app')]
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::with('audits')->get();
    }

    public function render()
    {
        return view('livewire.transactions');
    }
}
