<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\Attributes\Layout;

class BookingPayment extends Component
{
    #[Layout('layouts.app')]
    public $booking;

    public function mount($id)
    {
        $this->booking = Booking::findOrFail($id);
    }

    public function payNow()
    {
        $this->booking->update(['status' => 'paid']);
        session()->flash('message', 'Payment successful.');
        return redirect()->route('booking.view');
    }

    public function render()
    {
        return view('livewire.booking-payment')->layout('layouts.app');
    }
}
