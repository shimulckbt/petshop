@extends('panel.layouts.app')
@section('content')
    <div class="container-fluid">
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

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Seller's Appointment Time</h1>
            </div>

            <div class="card">
                <div class="card-header">
                    Choose date
                </div>
                <div class="card-body">
                    <input type="text" name="date" style="cursor:pointer; color: rgb(47, 42, 42) !important;" readonly
                        class="form-control datetimepicker-input" id="datepicker" placeholder="2022-06-20"
                        data-toggle="datetimepicker" data-target="#datepicker" name="date">
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Choose AM Time
                    <span style="margin-left: 700px">Check/Uncheck
                        <input type="checkbox"
                            onclick=" for(c in document.getElementsByName('times[]')) document.getElementsByName('times[]').item(c).checked=this.checked">
                    </span>
                </div>
                <div class="card-body">
                    <table class="table table-striped" style="color: rgb(47, 42, 42)">
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><input type="checkbox" name="times[]" value="12am">12am</td>
                                <td><input type="checkbox" name="times[]" value="12.30am">12.30am</td>
                                <td><input type="checkbox" name="times[]" value="1am">1am</td>
                                <td><input type="checkbox" name="times[]" value="1.30am">1.30am</td>
                                <td><input type="checkbox" name="times[]" value="2am">2am</td>
                                <td><input type="checkbox" name="times[]" value="2.30am">2.30am</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><input type="checkbox" name="times[]" value="3am">3am</td>
                                <td><input type="checkbox" name="times[]" value="3.30am">3.30am</td>
                                <td><input type="checkbox" name="times[]" value="4am">4am</td>
                                <td><input type="checkbox" name="times[]" value="4.30am">4.30am</td>
                                <td><input type="checkbox" name="times[]" value="5am">5am</td>
                                <td><input type="checkbox" name="times[]" value="5.30am">5.30am</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><input type="checkbox" name="times[]" value="6am">6am</td>
                                <td><input type="checkbox" name="times[]" value="6.30am">6.30am</td>
                                <td><input type="checkbox" name="times[]" value="7am">7am</td>
                                <td><input type="checkbox" name="times[]" value="7.30am">7.30am</td>
                                <td><input type="checkbox" name="times[]" value="8am">8am</td>
                                <td><input type="checkbox" name="times[]" value="8.30am">8.30am</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><input type="checkbox" name="times[]" value="9am">9am</td>
                                <td><input type="checkbox" name="times[]" value="9.30am">9.30am</td>
                                <td><input type="checkbox" name="times[]" value="10am">10am</td>
                                <td><input type="checkbox" name="times[]" value="10.30am">10.30am</td>
                                <td><input type="checkbox" name="times[]" value="11am">11am</td>
                                <td><input type="checkbox" name="times[]" value="11.30am">11.30am</td>
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
                                <td><input type="checkbox" name="times[]" value="12pm">12pm</td>
                                <td><input type="checkbox" name="times[]" value="12.30pm">12.30pm</td>
                                <td><input type="checkbox" name="times[]" value="1pm">1pm</td>
                                <td><input type="checkbox" name="times[]" value="1.30pm">1.30pm</td>
                                <td><input type="checkbox" name="times[]" value="2pm">2pm</td>
                                <td><input type="checkbox" name="times[]" value="2.30pm">2.30pm</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><input type="checkbox" name="times[]" value="3pm">3pm</td>
                                <td><input type="checkbox" name="times[]" value="3.30pm">3.30pm</td>
                                <td><input type="checkbox" name="times[]" value="4pm">4pm</td>
                                <td><input type="checkbox" name="times[]" value="4.30pm">4.30pm</td>
                                <td><input type="checkbox" name="times[]" value="5pm">5pm</td>
                                <td><input type="checkbox" name="times[]" value="5.30pm">5.30pm</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><input type="checkbox" name="times[]" value="6pm">6pm</td>
                                <td><input type="checkbox" name="times[]" value="6.30pm">6.30pm</td>
                                <td><input type="checkbox" name="times[]" value="7pm">7pm</td>
                                <td><input type="checkbox" name="times[]" value="7.30pm">7.30pm</td>
                                <td><input type="checkbox" name="times[]" value="8pm">8pm</td>
                                <td><input type="checkbox" name="times[]" value="8.30pm">8.30pm</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><input type="checkbox" name="times[]" value="9pm">9pm</td>
                                <td><input type="checkbox" name="times[]" value="9.30pm">9.30pm</td>
                                <td><input type="checkbox" name="times[]" value="10pm">10pm</td>
                                <td><input type="checkbox" name="times[]" value="10.30pm">10.30pm</td>
                                <td><input type="checkbox" name="times[]" value="11pm">11pm</td>
                                <td><input type="checkbox" name="times[]" value="11.30pm">11.30pm</td>
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
            })
        })
    </script>

    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');
    </script>
@endsection
