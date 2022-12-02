<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Time;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        if (request('date')) {
            $sellers = $this->findServiceSellersBasedOnDate(request('date'));
            return view('guest.services.index', compact('sellers'));
        }

        $sellers = Appointment::where('date', '>=', date('Y-m-d'))
            ->when($request->input('user_id') != NULL, function ($q) use ($request) {
                $q->where('user_id', $request->input('user_id'));
            })
            ->with('user')
            ->orderBy('date')->get();

        return view('guest.services.index', compact('sellers'));
    }

    public function show($sellerId, $date)
    {
        $appointment = Appointment::where('user_id', $sellerId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::where('id', $sellerId)->with('sellerDetail')->first();
        $seller_id = $sellerId;

        return view('guest.services.appointment', compact('times', 'date', 'user', 'seller_id'));
    }

    public function findServiceSellersBasedOnDate($date)
    {
        $sellers = Appointment::where('date', $date)->get();
        return $sellers;
    }

    public function checkBookingTimeInterval()
    {
        return Booking::orderby('id', 'desc')
            ->where('customer_id', auth()->user()->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->exists();
    }

    public function store(Request $request)
    {
        $request->validate(['time' => 'required']);
        $check = $this->checkBookingTimeInterval();
        if ($check) {
            return redirect()->back()->with('errmessage', 'You have already booked an appointment. Please wait to make next appointment');
        }

        Booking::create([
            'customer_id' => auth()->user()->id,
            'seller_id' => $request->sellerId,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0
        ]);

        Time::where('appointment_id', $request->appointmentId)
            ->where('time', $request->time)
            ->update(['status' => 1]);

        return redirect()->back()->with('message', 'Your appointment has been booked');
    }


    public function myAppointments()
    {
        $appointments = Booking::latest()->with('seller', 'customer')->where('customer_id', auth()->user()->id)->get();
        return view('panel.appointments.my-appointments', compact('appointments'));
    }

    public function sellerToday(Request $request)
    {
        $sellers = Appointment::with('seller')->whereDate('date', date('Y-m-d'))->get();
        return $sellers;
    }

    public function findsellers(Request $request)
    {
        $sellers = Appointment::with('seller')->whereDate('date', $request->date)->get();
        return $sellers;
    }
}
