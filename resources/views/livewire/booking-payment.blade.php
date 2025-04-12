<div class="max-w-lg mx-auto p-6 bg-white rounded-xl shadow-md text-center space-y-4">
    <h2 class="text-2xl font-semibold mb-2">Payment for Booking #{{ $booking->id }}</h2>

    <div class="text-left space-y-1">
        <p><strong>Name:</strong> {{ $booking->name }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Address:</strong> {{ $booking->address }}</p>
        <p><strong>Type of Cleaning:</strong> {{ ucfirst($booking->type_of_cleaning) }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($booking->date)->format('F j, Y') }}</p>
        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($booking->time)->format('g:i A') }}</p>
        <p class="text-lg mt-4"><strong>Total Amount:</strong> $100.00</p>
    </div>

    <div class="text-left">
        <label for="payment_method" class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
        <select id="payment_method" wire:model="payment_method" class="w-full border rounded p-2 mb-4">
            <option value="">-- Select Payment Method --</option>
            <option value="card">Card</option>
            <option value="gcash">GCash</option>
            <option value="paypal">PayPal</option>
        </select>
    </div>

    <button wire:click="payNow" class="mt-4 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
        Confirm & Pay
    </button>
</div>
