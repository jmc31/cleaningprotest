<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <h2 class="text-2xl font-semibold mb-4">My Bookings</h2>
    <table class="w-full table-auto border">
        <thead>
            <tr>
                <th class="border p-2">Name</th>
                <th class="border p-2">Date</th>
                <th class="border p-2">Time</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td class="border p-2">{{ $booking->name }}</td>
                <td class="border p-2">{{ $booking->date }}</td>
                <td class="border p-2">{{ $booking->time }}</td>
                <td class="border p-2">
                    <span class="{{ $booking->status == 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td class="border p-2 space-x-2">
                    <a href="{{ route('booking.edit', $booking->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    <button wire:click="cancel({{ $booking->id }})" class="text-red-500 hover:underline">Cancel</button>
                    @if($booking->status == 'pending')
                    <a href="{{ route('booking.payment', $booking->id) }}" class="text-green-600 hover:underline">Pay</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
