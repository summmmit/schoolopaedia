@extends('layouts.main-layout')

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
                                        <i class="green fa fa-home"></i> School Session Schedule ( 2014 - 2015 )
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
                                            <tr>
                                                <td colspan="2" class="text-center" style="background-color: skyblue">July - October</td>
                                            </tr>
                                            <tr>
                                                <td>School Opening Time</td>
                                                <td>09:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>Lunch Time</td>
                                                <td>12:00 PM</td>
                                            </tr>
                                            <tr>
                                                <td>School Closing Time</td>
                                                <td>02:00 PM</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="text-center" style="background-color: skyblue">November - March</td>
                                            </tr>
                                            <tr>
                                                <td>School Opening Time</td>
                                                <td>09:00 AM</td>
                                            </tr>
                                            <tr>
                                                <td>Lunch Time</td>
                                                <td>12:00 PM</td>
                                            </tr>
                                            <tr>
                                                <td>School Closing Time</td>
                                                <td>02:00 PM</td>
                                            </tr>
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
<script src="{{ URL::asset('assets/plugins/select2/select2.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/x-editable/js/bootstrap-editable.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/typeaheadjs/typeaheadjs.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/typeaheadjs/lib/typeahead.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-address/address.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/wysihtml5-0.3.0.min.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/wysihtml5/bootstrap-wysihtml5-0.0.2/bootstrap-wysihtml5.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/wysihtml5/wysihtml5.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/x-editable/demo-mock.js'); }}"></script>
<script src="{{ URL::asset('assets/plugins/x-editable/demo.js'); }}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
});
</script>

@stop
