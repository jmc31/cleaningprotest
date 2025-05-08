<div class="max-w-lg mx-auto p-6 bg-white rounded-xl shadow-md text-center space-y-4">
    <h2 class="text-2xl font-semibold mb-2">Payment for Booking #{{ $booking->id }}</h2>

    <div class="text-left space-y-1">
        <p><strong>Name:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Address:</strong> {{ $booking->address }}</p>
        <p><strong>Type of Cleaning:</strong> {{ ucfirst($booking->type_of_cleaning) }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->date)->format('F j, Y') }}</p>
        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($booking->time)->format('g:i A') }}</p>
        <p><strong>Payment Method</strong> {{ ucfirst($booking->payment_method) }}</p>
        <p class="text-lg mt-4"><strong>Total Amount:</strong> $100.00</p>
    </div>

    <button wire:click="payNow" class="mt-4 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
        Confirm & Pay
    </button>
</div>
