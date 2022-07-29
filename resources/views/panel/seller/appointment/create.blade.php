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

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ $error }}</strong>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endforeach

        <form action="{{ route('appointments.store') }}" method="post">
            @csrf
            <div class="card">
                <div class="card-header">
                    Choose date
                </div>
                <div class="row card-body">
                    {{-- <input class="col-md-4" type="text" name="date"
                        style="cursor:pointer; color: rgb(47, 42, 42) !important;" readonly
                        class="form-control datetimepicker-input" id="datepicker" placeholder="Enter {{ date('Y-m-d') }}"
                        data-toggle="datetimepicker" data-target="#datepicker"> --}}

                    From <input class="col-md-4 mx-2 bg-gray-200 border-0" type="text" name="from_date"
                        style="cursor:pointer; color: rgb(47, 42, 42) !important;" readonly
                        class="form-control datetimepicker-input" id="fromdatepicker"
                        placeholder="Enter {{ date('Y-m-d') }}" data-toggle="datetimepicker" data-target="#datepicker">

                    To <input class="col-md-4 mx-2 bg-gray-200 border-0" type="text" name="to_date"
                        style="cursor:pointer; color: rgb(47, 42, 42) !important;" readonly
                        class="form-control datetimepicker-input" id="todatepicker"
                        placeholder="Enter {{ date('Y-m-d') }}" data-toggle="datetimepicker" data-target="#datepicker">
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Choose AM Time
                    <span class="float-right">Check/Uncheck All
                        <input type="checkbox"
                            onclick=" for(c in document.getElementsByName('times[]')) document.getElementsByName('times[]').item(c).checked=this.checked">
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="color: rgb(47, 42, 42)">
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="checkbox" name="times[]" value="12:00am">12:00am</td>
                                <td><input type="checkbox" name="times[]" value="12:30am">12:30am</td>
                                <td><input type="checkbox" name="times[]" value="1:00am">1:00am</td>
                                <td><input type="checkbox" name="times[]" value="1:30am">1:30am</td>
                                <td><input type="checkbox" name="times[]" value="2:00am">2:00am</td>
                                <td><input type="checkbox" name="times[]" value="2:30am">2:30am</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><input type="checkbox" name="times[]" value="3:00am">3:00am</td>
                                <td><input type="checkbox" name="times[]" value="3:30am">3:30am</td>
                                <td><input type="checkbox" name="times[]" value="4:00am">4:00am</td>
                                <td><input type="checkbox" name="times[]" value="4:30am">4:30am</td>
                                <td><input type="checkbox" name="times[]" value="5:00am">5:00am</td>
                                <td><input type="checkbox" name="times[]" value="5:30am">5:30am</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><input type="checkbox" name="times[]" value="6:00am">6:00am</td>
                                <td><input type="checkbox" name="times[]" value="6:30am">6:30am</td>
                                <td><input type="checkbox" name="times[]" value="7:00am">7:00am</td>
                                <td><input type="checkbox" name="times[]" value="7:30am">7:30am</td>
                                <td><input type="checkbox" name="times[]" value="8:00am">8:00am</td>
                                <td><input type="checkbox" name="times[]" value="8:30am">8:30am</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><input type="checkbox" name="times[]" value="9:00am">9:00am</td>
                                <td><input type="checkbox" name="times[]" value="9:30am">9:30am</td>
                                <td><input type="checkbox" name="times[]" value="10:00am">10:00am</td>
                                <td><input type="checkbox" name="times[]" value="10:30am">10:30am</td>
                                <td><input type="checkbox" name="times[]" value="11:00am">11:00am</td>
                                <td><input type="checkbox" name="times[]" value="11:30am">11:30am</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Choose PM Time
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="color: rgb(47, 42, 42)">
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="checkbox" name="times[]" value="12:00pm">12:00pm</td>
                                <td><input type="checkbox" name="times[]" value="12:30pm">12:30pm</td>
                                <td><input type="checkbox" name="times[]" value="1:00pm">1:00pm</td>
                                <td><input type="checkbox" name="times[]" value="1:30pm">1:30pm</td>
                                <td><input type="checkbox" name="times[]" value="2:00pm">2:00pm</td>
                                <td><input type="checkbox" name="times[]" value="2:30pm">2:30pm</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><input type="checkbox" name="times[]" value="3:00pm">3:00pm</td>
                                <td><input type="checkbox" name="times[]" value="3:30pm">3:30pm</td>
                                <td><input type="checkbox" name="times[]" value="4:00pm">4:00pm</td>
                                <td><input type="checkbox" name="times[]" value="4:30pm">4:30pm</td>
                                <td><input type="checkbox" name="times[]" value="5:00pm">5:00pm</td>
                                <td><input type="checkbox" name="times[]" value="5:30pm">5:30pm</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><input type="checkbox" name="times[]" value="6:00pm">6:00pm</td>
                                <td><input type="checkbox" name="times[]" value="6:30pm">6:30pm</td>
                                <td><input type="checkbox" name="times[]" value="7:00pm">7:00pm</td>
                                <td><input type="checkbox" name="times[]" value="7:30pm">7:30pm</td>
                                <td><input type="checkbox" name="times[]" value="8:00pm">8:00pm</td>
                                <td><input type="checkbox" name="times[]" value="8:30pm">8:30pm</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><input type="checkbox" name="times[]" value="9:00pm">9:00pm</td>
                                <td><input type="checkbox" name="times[]" value="9:30pm">9:30pm</td>
                                <td><input type="checkbox" name="times[]" value="10:00pm">10:00pm</td>
                                <td><input type="checkbox" name="times[]" value="10:30pm">10:30pm</td>
                                <td><input type="checkbox" name="times[]" value="11:00pm">11:00pm</td>
                                <td><input type="checkbox" name="times[]" value="11:30pm">11:30pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <style type="text/css">
        input[type="checkbox"] {
            zoom: 1.2;
        }

        body {
            font-size: 1.2rem;
            color: black;
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            $("#fromdatepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            $("#todatepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        })
    </script>
@endsection
