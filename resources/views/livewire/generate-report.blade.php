<div class="max-w-6xl mx-auto p-8 bg-white rounded-xl shadow-lg">
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-gray-800">CleaningPro Booking Report</h1>
        <p class="text-gray-600 text-sm mt-2">Generated on {{ \Carbon\Carbon::now()->format('F d, Y') }}</p>
    </div>

    <div class="overflow-x-auto flex justify-center">
        <table class="min-w-full text-sm border border-gray-300">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="border p-2">Last Action</th>
                    <th class="border px-4 py-2 text-left">Name</th>
                    <th class="border px-4 py-2 text-left">Address</th>
                    <th class="border px-4 py-2 text-left">Email</th>
                    <th class="border px-4 py-2 text-left">Type of Cleaning</th>
                    <th class="border px-4 py-2 text-left">Price</th> <!-- New column for price -->
                    <th class="border px-4 py-2 text-left">Book Date</th>
                    <th class="border px-4 py-2 text-left">Time</th>
                    <th class="border px-4 py-2 text-left">Payment Method</th>
                    <th class="border px-4 py-2 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
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

                        // Get last audit action
                        $lastAudit = $booking->audits->last();
                        $action = $lastAudit ? ucfirst($lastAudit->event) : 'No activity recorded';
                        $timestamp = $lastAudit ? \Carbon\Carbon::parse($lastAudit->created_at)->format('M d, Y h:i A') : '';
                    @endphp
                    <tr class="hover:bg-gray-50">
                        <td class="border px-4 py-2">
                            {{ $action }} @if($timestamp) on {{ $timestamp }} @endif
                        </td>
                        <td class="border px-4 py-2">{{ $booking->name }}</td>
                        <td class="border px-4 py-2">{{ $booking->address }}</td>
                        <td class="border px-4 py-2">{{ $booking->email }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($booking->type_of_cleaning) }}</td>
                        <td class="border px-4 py-2">₱{{ number_format($price, 2) }}</td> <!-- Display price -->
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($booking->date)->format('M d, Y') }}</td>
                        <td class="border px-4 py-2">{{ \Carbon\Carbon::parse($booking->time)->format('h:i A') }}</td>
                        <td class="border px-4 py-2">{{ $booking->payment_method }}</td>
                        <td class="border px-4 py-2">
                            <span class="font-semibold {{ $booking->status == 'paid' ? 'text-green-600' : 'text-yellow-600' }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="border px-4 py-4 text-center text-gray-500">
                            No records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('download.report') }}" class="bg-blue-500 text-black px-6 py-2 rounded-lg shadow hover:bg-blue-600">
        Download Report
    </a>

    <div class="mt-6 text-sm text-right text-black-500">
        Total Records: {{ $bookings->count() }}
    </div>
</div>
