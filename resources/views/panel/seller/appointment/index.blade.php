@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Seller's Appointment Time</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endforeach

        <form action="{{ route('appointments.check') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header text-success">
                    @if (isset($date))
                        Your Appointments For:
                        {{ $date }}
                    @endif
                </div>
                <div class="card-body">
                    Choose date
                    <br>
                    <input type="text" name="date" style="cursor:pointer; color: rgb(47, 42, 42) !important;" readonly
                        class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker"
                        data-target="#datepicker" name="date" placeholder="Enter {{ date('Y-m-d') }}">
                    <br>
                    <button class="btn btn-primary">Check</button>
                </div>
            </div>
        </form>
        @if (Route::is('appointments.check'))
            <form action="{{ route('update.time') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Choose AM time
                        <span style="margin-left: 700px">Check/Uncheck All
                            <input type="checkbox"
                                onclick=" for(c in document.getElementsByName('times[]')) document.getElementsByName('times[]').item(c).checked=this.checked">
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <input type="hidden" name="appoinmentId" value="{{ $appointmentId }}">
                                <tr>
                                    <th scope="row">1</th>
                                    <td><input type="checkbox" name="times[]" value="12:00am"
                                            @if (isset($times)) {{ $times->contains('time', '12:00am') ? 'checked' : '' }} @endif>12:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="12:30am"@if (isset($times)) {{ $times->contains('time', '12:30am') ? 'checked' : '' }} @endif>12:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="1:00am"@if (isset($times)) {{ $times->contains('time', '1:00am') ? 'checked' : '' }} @endif>1:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="1:30am"@if (isset($times)) {{ $times->contains('time', '1:30am') ? 'checked' : '' }} @endif>1:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="2:00am"@if (isset($times)) {{ $times->contains('time', '2:00am') ? 'checked' : '' }} @endif>2:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="2:30am"@if (isset($times)) {{ $times->contains('time', '2:30am') ? 'checked' : '' }} @endif>2:30am
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="3:00am"@if (isset($times)) {{ $times->contains('time', '3:00am') ? 'checked' : '' }} @endif>3:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="3:30am"@if (isset($times)) {{ $times->contains('time', '3:30am') ? 'checked' : '' }} @endif>3:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="4:00am"@if (isset($times)) {{ $times->contains('time', '4:00am') ? 'checked' : '' }} @endif>4:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="4:30am"@if (isset($times)) {{ $times->contains('time', '4:30am') ? 'checked' : '' }} @endif>4:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="5:00am"@if (isset($times)) {{ $times->contains('time', '5:00am') ? 'checked' : '' }} @endif>5:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="5:30am"@if (isset($times)) {{ $times->contains('time', '5:30am') ? 'checked' : '' }} @endif>5:30am
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">3</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="6:00am"@if (isset($times)) {{ $times->contains('time', '6:00am') ? 'checked' : '' }} @endif>6:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="6:30am"@if (isset($times)) {{ $times->contains('time', '6:30am') ? 'checked' : '' }} @endif>6:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="7:00am"@if (isset($times)) {{ $times->contains('time', '7:00am') ? 'checked' : '' }} @endif>7:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="7:30am"@if (isset($times)) {{ $times->contains('time', '7:30am') ? 'checked' : '' }} @endif>7:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="8:00am"@if (isset($times)) {{ $times->contains('time', '8:00am') ? 'checked' : '' }} @endif>8:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="8:30am"@if (isset($times)) {{ $times->contains('time', '8:30am') ? 'checked' : '' }} @endif>8:30am
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">4</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="9am"@if (isset($times)) {{ $times->contains('time', '9am') ? 'checked' : '' }} @endif>9am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="9.30am"@if (isset($times)) {{ $times->contains('time', '9.30am') ? 'checked' : '' }} @endif>9.30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="10:00am"@if (isset($times)) {{ $times->contains('time', '10:00am') ? 'checked' : '' }} @endif>10:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="10:30am"@if (isset($times)) {{ $times->contains('time', '10:30am') ? 'checked' : '' }} @endif>10:30am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="11:00am"@if (isset($times)) {{ $times->contains('time', '11:00am') ? 'checked' : '' }} @endif>11:00am
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="11:30am"@if (isset($times)) {{ $times->contains('time', '11:30am') ? 'checked' : '' }} @endif>11:30am
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Choose PM time
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th scope="row">5</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="12:00pm"@if (isset($times)) {{ $times->contains('time', '12:00pm') ? 'checked' : '' }} @endif>12:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="12:30pm"@if (isset($times)) {{ $times->contains('time', '12:30pm') ? 'checked' : '' }} @endif>12:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="1:00pm"@if (isset($times)) {{ $times->contains('time', '1:00pm') ? 'checked' : '' }} @endif>1:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="1:30pm"@if (isset($times)) {{ $times->contains('time', '1:30pm') ? 'checked' : '' }} @endif>1:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="2:00pm"@if (isset($times)) {{ $times->contains('time', '2:00pm') ? 'checked' : '' }} @endif>2:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="2:30pm"@if (isset($times)) {{ $times->contains('time', '2:30pm') ? 'checked' : '' }} @endif>2:30pm
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">6</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="3:00pm"@if (isset($times)) {{ $times->contains('time', '3:00pm') ? 'checked' : '' }} @endif>3:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="3:30pm"@if (isset($times)) {{ $times->contains('time', '3:30pm') ? 'checked' : '' }} @endif>3:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="4:00pm"@if (isset($times)) {{ $times->contains('time', '4:00pm') ? 'checked' : '' }} @endif>4:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="4:30pm"@if (isset($times)) {{ $times->contains('time', '4:30pm') ? 'checked' : '' }} @endif>4:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="5:00pm"@if (isset($times)) {{ $times->contains('time', '5:00pm') ? 'checked' : '' }} @endif>5:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="5:30pm"@if (isset($times)) {{ $times->contains('time', '5:30pm') ? 'checked' : '' }} @endif>5:30pm
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="6:00pm"@if (isset($times)) {{ $times->contains('time', '6:00pm') ? 'checked' : '' }} @endif>6:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="6:30pm"@if (isset($times)) {{ $times->contains('time', '6:30pm') ? 'checked' : '' }} @endif>6:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="7:00pm"@if (isset($times)) {{ $times->contains('time', '7:00pm') ? 'checked' : '' }} @endif>7:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="7:30pm"@if (isset($times)) {{ $times->contains('time', '7:30pm') ? 'checked' : '' }} @endif>7:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="8:00pm"@if (isset($times)) {{ $times->contains('time', '8:00pm') ? 'checked' : '' }} @endif>8:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="9:00pm"@if (isset($times)) {{ $times->contains('time', '9:00pm') ? 'checked' : '' }} @endif>9:00pm
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td><input type="checkbox" name="times[]"
                                            value="9:00pm"@if (isset($times)) {{ $times->contains('time', '9:00pm') ? 'checked' : '' }} @endif>9:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="9:30pm"@if (isset($times)) {{ $times->contains('time', '9:30pm') ? 'checked' : '' }} @endif>9:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="10:00pm"@if (isset($times)) {{ $times->contains('time', '10:00pm') ? 'checked' : '' }} @endif>10:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="10:30pm"@if (isset($times)) {{ $times->contains('time', '10:30pm') ? 'checked' : '' }} @endif>10:30pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="11:00pm"@if (isset($times)) {{ $times->contains('time', '11:00pm') ? 'checked' : '' }} @endif>11:00pm
                                    </td>
                                    <td><input type="checkbox" name="times[]"
                                            value="11:30pm"@if (isset($times)) {{ $times->contains('time', '11:30pm') ? 'checked' : '' }} @endif>11:30pm
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        @else
            <h3>Your appoinment time list: <b class="text-info">{{ $myappointments->count() }}</b>
            </h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Creator</th>
                        <th scope="col">Date</th>
                        <th scope="col">View/Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myappointments as $appoinment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $appoinment->user->first_name }} {{ $appoinment->user->last_name }}</td>
                            <td>{{ $appoinment->date }}</td>
                            <td>
                                <form action="{{ route('appointments.check') }}" method="post">@csrf
                                    <input type="hidden" name="date" value="{{ $appoinment->date }}">
                                    <button type="submit" class="btn btn-primary">View/Update</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>


    <style type="text/css">
        input[type="checkbox"] {
            zoom: 1.1;

        }

        body {
            font-size: 17px;
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            })
        })
    </script>
@endsection
