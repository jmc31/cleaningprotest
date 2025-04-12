<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\Attributes\Layout;

class BookingCreate extends Component
{
    #[Layout('layouts.app')]
    public $name, $email, $address, $type_of_cleaning, $date, $time;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'address' => 'required|string',
        'type_of_cleaning' => 'required|string',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required'
    ];

    public function createBooking()
    {
        $this->validate();

        Booking::create([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'type_of_cleaning' => $this->type_of_cleaning,
            'date' => $this->date,
            'time' => $this->time,
        ]);

        session()->flash('message', 'Booking created successfully.');

        return redirect()->route('booking.view');
    }
    public function render()
    {
        return view('livewire.booking-create');
    }
}
