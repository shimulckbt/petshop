<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Time;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myappointments = Appointment::with(['user', 'times'])->where('user_id', auth()->user()->id)->orderBy('date', 'DESC')->get();
        return view('panel.seller.appointment.index', compact('myappointments'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.seller.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'unique:appointments,date,NULL,id,user_id,' . \Auth::id(),
            'from_date' => 'required|date|after_or_equal:today|unique:appointments,date,NULL,id,user_id,' . \Auth::id(),
            'to_date' => 'required|date|after_or_equal:today|unique:appointments,date,NULL,id,user_id,' . \Auth::id(),
            'times' => 'required'
        ]);
        // dd($request->all());
        $startDate = Carbon::createFromFormat('Y-m-d', $request->from_date);
        $endDate = Carbon::createFromFormat('Y-m-d', $request->to_date);
        $period = CarbonPeriod::create($startDate, $endDate);

        // Iterate over the period
        // foreach ($period as $date) {
        //     $date->format('Y-m-d');
        // }

        // Convert the period to an array of dates
        $dates = $period->toArray();
        // dd($dates);

        $size = sizeof($dates);
        // dd($size);

        for ($i = 0; $i < $size; $i++) {
            $appointment = Appointment::create([
                'user_id' => auth()->user()->id,
                'date' => $dates[$i]
            ]);
            // dd($appointment);
            foreach ($request->times as $time) {
                Time::create([
                    'appointment_id' => $appointment->id,
                    'time' => $time,
                    // 'stauts'=>0
                ]);
            }
        }

        return back()->with('success', 'Appointment created for' . ' ' . 'From' . ' ' . $request->from_date . ' ' . 'to' . ' ' . $request->from_date);

        // $this->validate($request, [
        //     'date' => 'required|unique:appointments,date,NULL,id,user_id,' . \Auth::id(),
        //     'times' => 'required'
        // ]);
        // // dd($request->all());
        // $appointment = Appointment::create([
        //     'user_id' => auth()->user()->id,
        //     'date' => $request->date
        // ]);
        // foreach ($request->times as $time) {
        //     Time::create([
        //         'appointment_id' => $appointment->id,
        //         'time' => $time,
        //         // 'stauts'=>0
        //     ]);
        // }
        // return back()->with('success', 'Appointment created for' . ' ' . $request->date);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function check(Request $request)
    {
        // dd('check method');
        $date = $request->date;
        $appointment = Appointment::where('date', $date)->where('user_id', auth()->user()->id)->latest()->first();
        // dd($appointment);
        if (!$appointment) {
            return redirect()->to('/appointments')->with('error', 'Appointment time not available for this date');
        }
        $appointmentId = $appointment->id;
        $times = Time::where('appointment_id', $appointmentId)->get();

        return view('panel.seller.appointment.index', compact('times', 'appointmentId', 'date'));
    }

    public function updateTime(Request $request)
    {
        // dd('update time');
        $appointmentId = $request->appoinmentId;
        $appointment = Time::where('appointment_id', $appointmentId)->delete();
        if (!isset($request->times)) {
            return redirect()->route('appointments.index')->with('success', 'Appointment time cancelled!!');
        }
        foreach ($request->times as $time) {
            Time::create([
                'appointment_id' => $appointmentId,
                'time' => $time,
                'status' => 0
            ]);
        }
        return redirect()->route('appointments.index')->with('success', 'Appointment time updated!!');
    }
}
