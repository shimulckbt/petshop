<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AppointmentTakerController extends Controller
{
    public function index(Request $request)
    {
        // if ($request->date) {
        //     $appointments = Booking::latest()->where('date', $request->date)->get();
        //     return view('panel.appointments.appointments-takers', compact('appointments'));
        // }
        $appointments = Booking::latest()->get();
        return view('panel.appointments.appointments-takers', compact('appointments'));
    }

    public function toggleStatus($id)
    {
        $appointment  = Booking::find($id);
        $appointment->status = !$appointment->status;
        $appointment->save();
        return redirect()->back();
    }

    public function allTimeAppointment()
    {
        $appointments = Booking::latest()->paginate(20);
        return view('admin.patientlist.index', compact('appointments'));
    }

    public function sellersAllAppointments()
    {
        $appointments = Booking::latest()->where('seller_id', auth()->user()->id)->get();
        return view('panel.seller.appointment.appointments-takers', compact('appointments'));
    }
}
