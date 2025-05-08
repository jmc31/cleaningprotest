<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Response;

class GenerateReport extends Component
{
    #[Layout('layouts.app')]
    public $bookings;

    public function mount()
    {
        $this->bookings = Booking::with('audits')->get();
    }

    public function downloadReport()
    {
        // Get all bookings
        $bookings = Booking::all();
        $filename = "booking_report_" . now()->format('Y_m_d_His') . ".csv";

        // Set the headers for the response to trigger a download
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        // Open a file handle in memory
        $handle = fopen('php://output', 'w');

        // Add the CSV headers
        fputcsv($handle, ['Name', 'Address', 'Email', 'Type of Cleaning', 'Book Date', 'Book Time', 'Payment Method', 'Status']);

        // Add data rows
        foreach ($bookings as $booking) {
            fputcsv($handle, [
                $booking->name,
                $booking->address,
                $booking->email,
                $booking->type_of_cleaning,
                $booking->date,
                $booking->time,
                $booking->payment_method,
                ucfirst($booking->status),
            ]);
        }

        // Close the file handle after the CSV data is generated
        fclose($handle);

        // Return the file content as a response to trigger the download
        return Response::stream(
            function () use ($handle) {
                // Output the CSV to the browser
                flush(); // Ensure the buffer is flushed and the CSV content is streamed
            },
            200,
            $headers
        );
    }

    public function render()
    {
        return view('livewire.generate-report', [
            'bookings' => $this->bookings,
        ]);
    }
}
