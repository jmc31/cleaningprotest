<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\Attributes\Layout;

class BookingEdit extends Component
{
    #[Layout('layouts.app')]
    public $booking;
    public $name, $email, $address, $type_of_cleaning, $date, $time, $payment_method;

    public function mount($id)
    {
        $this->booking = Booking::findOrFail($id);
        $this->fill($this->booking->toArray());
    }

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'address' => 'required|string',
        'type_of_cleaning' => 'required|string',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required',
        'payment_method' => 'required'
    ];

    public function updateBooking()
    {
        $this->validate();

        $this->booking->update([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'type_of_cleaning' => $this->type_of_cleaning,
            'date' => $this->date,
            'time' => $this->time,
            'payment_method' => $this->payment_method,
        ]);

        session()->flash('message', 'Booking updated successfully.');

        return redirect()->route('booking.view');
    }

    public function render()
    {
        return view('livewire.booking-edit')->layout('layouts.app');
    }
}
