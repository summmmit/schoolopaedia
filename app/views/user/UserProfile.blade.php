@extends('layout.admin')

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Your Details<small>These are the details of you as per our database.</small></h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        User Profile
    </li>
</ol>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- start: FORM VALIDATION 1 PANEL -->
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-5 col-md-4">
                        <div class="user-left">
                            <h2><i class="fa fa-users"></i> Overview</h2>
                            <hr>
                            <div class="center">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="user-image">
                                        <div class="fileupload-new thumbnail"><img src="{{ URL::asset('assets/images/s--s.PNG') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3">General information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Full Name </td>
                                        <td> Sumit Prasad </td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                    class="fa fa-pencil edit-user-info"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Father's Name</td>
                                        <td>Suraj Prasad</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                    class="fa fa-pencil edit-user-info"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Voter ID</td>
                                        <td><span class="label label-green label-info">SWX105846</span></td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                    class="fa fa-pencil edit-user-info"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth</td>
                                        <td>25 May 1991</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                    class="fa fa-pencil edit-user-info"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>Male</td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                    class="fa fa-pencil edit-user-info"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Marriage Status</td>
                                        <td><span class="label label-sm label-info">Unmarried</span>
                                        </td>
                                        <td><a href="#panel_edit_account" class="show-tab"><i
                                                    class="fa fa-pencil edit-user-info"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3">Contact Information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Email:</td>
                                        <td> summmmit@gmail.com</td>
                                        <td><small>(updated on 12/22/2015) </small><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number:</td>
                                        <td>(80)-3467-4763</td>
                                        <td><small>(updated on 12/22/2015) </small><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th colspan="3">Additional information</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Last Logged In</td>
                                        <td></td>
                                        <td>(22/12/2015 22:15 PM)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                    <div class="col-sm-7">
                        <h3><i class="fa fa-paper-plane text-center"></i> Additional Information</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="user-left">                                    
                                    <h4>Home Address :</h4><small>(Last updated on 12/22/2015)</small>
                                    <address class="text-right">
                                        <strong>House Number: 256, Street Number: 9</strong>
                                        <br>
                                        New Defence Colony, Muradnagar
                                        <br>
                                        Ghaziabad
                                        <br>
                                        Uttar Pradesh, India
                                        <br>
                                        <strong>
                                            <abbr title="zipcode">Pin Code:</abbr> (201206)
                                        </strong>
                                    </address>  
                                </div>
                                <hr>                                      
                            </div>
                            <div class="col-md-6">
                                <h4>Work Address :</h4><small>(Last updated on 12/22/2015) </small>
                                <address class="text-right">
                                    <strong>House Number: 256, Street Number: 9</strong>
                                    <br>
                                    New Defence Colony, Muradnagar
                                    <br>
                                    Ghaziabad
                                    <br>
                                    Uttar Pradesh, India
                                    <br>
                                    <strong>
                                        <abbr title="zipcode">Pin Code:</abbr> (201206)
                                    </strong>
                                </address> 
                                <hr>                                       
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <!-- end: FORM VALIDATION 1 PANEL -->
        </div>
    </div>

    @stop

    @section('scripts')

    <!-- Scripts for This page only -->
    <script src="{{ URL::asset('assets/plugins/jquery.pulsate/jquery.pulsate.min.js'); }}"></script>
    <script src="{{ URL::asset('assets/js/pages-user-profile.js'); }}"></script>
    <script>
jQuery(document).ready(function() {
    Main.init();
    SVExamples.init();
    PagesUserProfile.init();
});
    </script>

    @stop