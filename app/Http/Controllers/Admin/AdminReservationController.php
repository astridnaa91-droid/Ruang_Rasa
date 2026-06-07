<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminReservationController extends Controller
{
    /**
     * Display a listing of all reservations.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'table'])
            ->latest()
            ->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    /**
     * Confirm the specified reservation.
     */
    public function confirm(Reservation $reservation)
    {
        // Update reservation status
        $reservation->update(['status' => 'confirmed']);

        // Update table status to booked
        $reservation->table->update(['status' => 'booked']);

        return redirect()->back()
            ->with('success', "Reservasi untuk meja {$reservation->table->table_number} berhasil dikonfirmasi.");
    }

    /**
     * Reject the specified reservation.
     */
    public function reject(Reservation $reservation)
    {
        // Update reservation status
        $reservation->update(['status' => 'rejected']);

        // If the table was previously booked by this reservation, restore it to available
        if ($reservation->table->status === 'booked') {
            $reservation->table->update(['status' => 'available']);
        }

        return redirect()->back()
            ->with('success', "Reservasi untuk meja {$reservation->table->table_number} telah ditolak.");
    }
}
