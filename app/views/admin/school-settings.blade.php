@extends('layouts.main-layout')

@section('stylesheets')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/select2/select2.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-datetimepicker/css/datetimepicker.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/x-editable/css/bootstrap-editable.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/typeaheadjs/lib/typeahead.js-bootstrap.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/jquery-address/address.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5-0.0.2.css'); }}">
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/wysiwyg-color.css'); }}">
@stop

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> School </h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        school settings
    </li>
</ol>
@stop

@section('content')
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">Inline <span class="text-bold">Tabs</span></h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="tabbable">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active">
                                    <a href="#school-details" data-toggle="tab">
                                        <i class="green fa fa-home"></i> School Details
                                    </a>
                                </li>
                                <li>
                                    <a href="#school-session-details" data-toggle="tab">
                                        <i class="green fa fa-home"></i> School Session Schedule ( {{ date_format(date_create($session->session_start), "Y") }} - {{ date_format(date_create($session->session_end), "Y") }} )
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="school-details">
                                    <table id="user" class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td>School Name</td>
                                                <td>Aum Sun Public School</td>
                                            </tr>
                                            <tr>
                                                <td>School Logo</td>
                                                <td>
                                                    <img class="thumbnail" src="{{ URL::asset('assets/projects/images/rotating_card_profile2.png'); }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>School Manager</td>
                                                <td>Sumit Prasad</td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number</td>
                                                <td>05168-222541</td>
                                            </tr>
                                            <tr>
                                                <td>Registered Email Address</td>
                                                <td>summmmit44@gmail.com</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>
                                                    <address>
                                                        239/9, New Defence Colony <br>
                                                        Muradnagar, Ghaziabad <br>
                                                        Uttar Pradesh<br>
                                                        India (201206)
                                                    </address>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Registration Code</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Registration Code for Admin</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Registration Code for Moderators</td>
                                                <td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Registration Code for Teachers</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Registration Code for Parents</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Registration Code for Students</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Registered Since</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="school-session-details">
                                    <table id="user" class="table table-bordered table-striped">
                                        <tbody>
                                            @foreach($schedules as $schedule)
                                            <tr>
                                                <td colspan="2" class="text-center" style="background-color: skyblue">{{ date_format(date_create($schedule->start_from), "F") }} - {{ date_format(date_create($schedule->close_untill), "F") }}</td>
                                            </tr>
                                            <tr>
                                                <td class="column-left">School Opening Time</td>
                                                <td class="column-right">
                                                    <a href="#" class="opening-time" data-type="combodate" data-template="HH:mm A" data-format="HH:mm A" data-viewformat="HH:mm A" data-pk="{{ $schedule->id }}">
                                                        {{ date_format(date_create($schedule->opening_time), "h:i A") }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="column-left">Lunch Time</td>
                                                <td class="column-right">
                                                    <a href="#" class="lunch-time" data-type="combodate" data-template="HH:mm A" data-format="HH:mm A" data-viewformat="HH:mm A" data-pk="{{ $schedule->id }}">
                                                        {{ date_format(date_create($schedule->lunch_time), "h:i A") }}
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="column-left">School Closing Time</td>
                                                <td class="column-right">
                                                    <a href="#" class="closing-time" data-type="combodate" data-template="HH:mm" data-format="HH:mm A" data-viewformat="HH:mm A" data-pk="{{ $schedule->id }}">
                                                        {{ date_format(date_create($schedule->closing_time), "h:i A") }}
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-offset-10 col-md-2 text-right">
                                            <button class="btn btn-block btn-blue">
                                                New Schedule <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end: PAGE CONTENT-->
@stop

@section('scripts')

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{ URL::asset('assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/x-editable/js/bootstrap-editable.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/typeaheadjs/typeaheadjs.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/typeaheadjs/lib/typeahead.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-address/address.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/wysihtml5/wysihtml5.js'); }}"></script>
<script src="{{ URL::asset('assets/js/modifiedJs/admin/school-settings/school-settings-xeditable.js'); }}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
});
</script>

@stop
