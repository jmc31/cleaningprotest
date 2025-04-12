<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\Attributes\Layout;

class BookingView extends Component
{
    #[Layout('layouts.app')]
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::latest()->get();
    }

    public function cancel($id)
    {
        Booking::destroy($id);
        session()->flash('message', 'Booking cancelled.');
        return redirect()->route('booking.view');
    }

    public function render()
    {
        return view('livewire.booking-view')->layout('layouts.app');
    }
}
