<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-lg">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-3xl font-bold text-gray-800">Transactions</h2> <!-- Increased font size -->
        <span class="text-sm text-gray-500">Updated: {{ now()->format('F d, Y h:i A') }}</span> <!-- Increased font size -->
    </div>

    <div class="overflow-x-auto flex justify-center">
        <table class="w-full max-w-3xl text-sm border border-gray-300 rounded-lg shadow-sm"> <!-- Increased font size -->
            <thead class="bg-gray-100 text-gray-700 uppercase tracking-wider">
                <tr>
                    <th class="border px-4 py-3 text-left">Customer</th> <!-- Increased padding and font size -->
                    <th class="border px-4 py-3 text-left">Address</th>
                    <th class="border px-4 py-3 text-left">Email</th>
                    <th class="border px-4 py-3 text-left">Cleaning</th>
                    <th class="border px-4 py-3 text-left">Payment</th>
                    <th class="border px-4 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                @forelse($bookings as $booking)
                    @php
                        // Normalize the cleaning type and define prices
                        $type = strtolower(trim($booking->type_of_cleaning));
                        $prices = [
                            'standard' => 800,
                            'deep cleaning' => 1500,
                            'move-in/move-out' => 2500,
                        ];
                        // Get the price or default to 0
                        $price = $prices[$type] ?? 0;
                    @endphp
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $booking->name }}</td> <!-- Increased padding -->
                        <td class="px-4 py-2">{{ $booking->address }}</td>
                        <td class="px-4 py-2">{{ $booking->email }}</td>
                        <td class="px-4 py-2">{{ ucfirst($booking->type_of_cleaning) }}</td>
                        <td class="px-4 py-2">₱{{ number_format($price, 2) }}</td>
                        <td class="px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $booking->status == 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-gray-500">No transactions found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-sm text-right text-gray-500"> <!-- Increased font size -->
        Total Transactions: {{ $bookings->count() }}
    </div>
</div>
