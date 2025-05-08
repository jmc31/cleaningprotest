<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function downloadReport()
    {
        $bookings = Booking::all();
        $filename = "booking_report_" . now()->format('Y_m_d_His') . ".csv";

        // Set the headers for the response
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ];

        // Open the file in memory
        $handle = fopen('php://output', 'w');

        // Add the CSV headers
        fputcsv($handle, ['Name', 'Address', 'Email', 'Type of Cleaning', 'Book Date', 'Book Time', 'Payment Method', 'Status']);

        // Add the data rows
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

        // Close the handle
        fclose($handle);

        // Return the CSV file as a download response
        return Response::stream(
            function () use ($handle) {
                flush();
            },
            200,
            $headers
        );
    }
}
