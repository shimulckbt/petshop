<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // date_default_timezone_set('Asia/Dhaka');
        if (request('date')) {
            $sellers = $this->findServiceSellersBasedOnDate(request('date'));
            return view('guest.services.index', compact('sellers'));
        }
        $sellers = Appointment::with('user')->where('date', date('Y-m-d'))->get();
        // dd($sellers);

        return view('guest.services.index', compact('sellers'));
    }

    public function show($sellerId, $date)
    {
        $appointment = Appointment::where('user_id', $sellerId)->where('date', $date)->first();
        $times = Time::where('appointment_id', $appointment->id)->where('status', 0)->get();
        $user = User::where('id', $sellerId)->first();
        $seller_id = $sellerId;

        return view('appointment', compact('times', 'date', 'user', 'seller_id'));
    }

    public function findServiceSellersBasedOnDate($date)
    {
        $sellers = Appointment::where('date', $date)->get();
        return $sellers;
    }
}
