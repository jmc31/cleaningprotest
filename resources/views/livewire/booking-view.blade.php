<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">My Bookings</h2>
        <a href="{{ route('generate.report') }}" class="bg-blue-500 text- px-6 py-2 rounded-lg shadow hover:bg-blue-600">
            View Full Report
        </a>
    </div>

    <table class="w-full table-auto border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
            <tr>
                <th class="border p-2">Name</th>
                <th class="border p-2">Address</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Type of Cleaning</th>
                <th class="border p-2">Book Date</th>
                <th class="border p-2">Book Time</th>
                <th class="border p-2">Payment Method</th>
                <th class="border p-2">Status</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr class="hover:bg-gray-50">
                <td class="border p-2">{{ $booking->name }}</td>
                <td class="border p-2">{{ $booking->address }}</td>
                <td class="border p-2">{{ $booking->email }}</td>
                <td class="border p-2">{{ $booking->type_of_cleaning }}</td>
                <td class="border p-2">{{ $booking->date }}</td>
                <td class="border p-2">{{ $booking->time }}</td>
                <td class="border p-2">{{ $booking->payment_method }}</td>
                <td class="border p-2">
                    <span class="{{ $booking->status == 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </td>
                <td class="border p-2 space-x-2">
                    @if($booking->status != 'paid')
                        <a href="{{ route('booking.edit', $booking->id) }}" class="text-blue-500 hover:underline">Edit</a>
                    @endif
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
