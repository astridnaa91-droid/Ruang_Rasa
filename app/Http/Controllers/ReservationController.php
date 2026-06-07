<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of available tables.
     */
    public function index()
    {
        $tables = Table::orderBy('table_number')->get();
        return view('reservations.index', compact('tables'));
    }

    /**
     * Show the form for creating a new reservation.
     */
    public function create(Table $table)
    {
        // Check if the table is available
        if ($table->status !== 'available') {
            return redirect()->route('tables.index')
                ->with('error', 'Meja ini sedang tidak tersedia untuk reservasi baru.');
        }

        return view('reservations.create', compact('table'));
    }

    /**
     * Store a newly created reservation in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        // Check once more if the table is available
        $table = Table::findOrFail($request->table_id);
        if ($table->status !== 'available') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Meja yang Anda pilih sudah terbooking atau tidak tersedia.');
        }

        // Create the reservation
        Reservation::create([
            'user_id' => auth()->id(),
            'table_id' => $request->table_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'guest_count' => $request->guest_count,
            'status' => 'pending',
        ]);

        return redirect()->route('reservations.history')
            ->with('success', 'Reservasi berhasil dikirim! Menunggu konfirmasi admin.');
    }

    /**
     * Display the authenticated user's reservation history.
     */
    public function history()
    {
        $reservations = auth()->user()->reservations()
            ->with('table')
            ->latest()
            ->get();

        return view('reservations.history', compact('reservations'));
    }
}
