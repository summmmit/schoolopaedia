@extends('layouts.main-layout')

@section('page_header')
<h1><i class="fa fa-pencil-square"></i> Your Details<small>These are the details of you as per our database.</small></h1>
<?php
$now = \Carbon\Carbon::createFromDate();
?>
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
    <div class="col-md-12"><!-- Some Message to be Displayed start-->
        @if(Session::has('details-changed'))
        <div class="errorHandler alert alert-success">
            <i class="fa fa-remove-sign"></i>{{ Session::get('details-changed') }}
        </div>
        @elseif(Session::has('details-not-changed'))
        <div class="errorHandler alert alert-danger">
            <i class="fa fa-remove-sign"></i>{{ Session::get('details-not-changed') }}
        </div>
        @endif 
        @if ($errors->has())
        <div class="errorHandler alert alert-danger">
            @foreach ($errors->all() as $error)
            {{ $error }}<br>        
            @endforeach
        </div>
        @endif
    </div>
    <div class="col-md-12">
        <div class="tabbable">
            <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                <li class="active">
                    <a data-toggle="tab" href="#panel_overview">
                        Overview                         
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#panel_edit_account">
                        Edit Account
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#panel_login_details">
                        Login Details
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="panel_overview" class="tab-pane fade in active">
                    <div class="row">
                        <div class="col-sm-5 col-md-4">
                            <div class="user-left">
                                <h2><i class="fa fa-users"></i> Overview</h2>
                                <hr>
                                <div class="center">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="user-image">
                                            <div class="fileupload-new thumbnail"><img src="{{ URL::asset('assets/projects/images/profilepics/'.$user->pic) }}" alt="">
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
                                            <td> {{ ucfirst($user->first_name) }} {{ ucfirst($user->middle_name) }} {{ ucfirst($user->last_name) }} </td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i
                                                        class="fa fa-pencil edit-user-info"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if($user->relation_with_person == 0)
                                            <td>Father's Name</td>
                                            @elseif($user->relation_with_person == 1)                                        
                                            <td>Husband's Name</td>
                                            @endif
                                            <td>{{ $user->relative_id }}</td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i
                                                        class="fa fa-pencil edit-user-info"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Voter ID</td>
                                            <td><span class="label label-green label-info">{{ $user->voter_id }}</span></td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i
                                                        class="fa fa-pencil edit-user-info"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>{{ $user->dob }}</td>
                                            <td><a href="#panel_edit_account" class="show-tab"><i
                                                        class="fa fa-pencil edit-user-info"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            @if($user->sex == 0)
                                            <td>Female</td>
                                            @elseif($user->sex == 1)                                        
                                            <td>Male</td>
                                            @endif
                                            <td><a href="#panel_edit_account" class="show-tab"><i
                                                        class="fa fa-pencil edit-user-info"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Marriage Status</td>
                                            @if($user->marriage_status == 0)
                                            <td><span class="label label-sm label-info">Unmarried</span></td>
                                            @elseif($user->marriage_status == 1)      
                                            <td><span class="label label-sm label-info">Married</span></td>
                                            @endif
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
                                            <td>{{ $user->email }}</td>
                                            <td><small>(updated on 12/22/2015) </small><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Mobile Number:</td>
                                            <td>{{ $user->mobile_number }}</td>
                                            <td><small>(updated on {{ $user->mobile_updated_at }}) </small><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
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
                                        <h4>Home Address :</h4><small>(Last updated on {{ $user->address_updated_at }})</small>
                                        <address class="text-right">
                                            <strong>{{ ucwords($user->add_1) }},</strong>
                                            <br>
                                            {{ ucwords($user->add_2) }},
                                            <br>
                                            {{ ucwords($user->city) }},
                                            <br>
                                            {{ ucwords($user->state) }}, {{ ucwords($user->country) }}
                                            <br>
                                            <strong>
                                                <abbr title="zipcode">Pin Code:</abbr> ({{ $user->pin_code }})
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
                <div id="panel_edit_account" class="tab-pane fade">
                    <form action="{{ URL::route('user-edit-post'); }}" role="form" id="form" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="user-left">
                                <div class="col-md-6">
                                    <h2><i class="fa fa-users"></i> Overview</h2>
                                    <hr>
                                    <div class="form-group center">
                                        <label>
                                            Update Image
                                        </label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail"><img src="{{ URL::asset('assets/projects/images/profilepics/'.$user->pic) }}" alt="">
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"></div> <br>
                                            <div class="user-edit-image-buttons">
                                                <span class="btn btn-azure btn-file "><span class="fileupload-new"><i class="fa fa-picture"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                                    <input type="file" name="pic">
                                                </span>
                                                <a href="#" class="btn fileupload-exists btn-red" data-dismiss="fileupload">
                                                    <i class="fa fa-times"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3>Account Info</h3>
                                    <div class="row">
                                        <div class="col-md-4">                                            
                                            <div class="form-group">
                                                <label class="control-label">
                                                    First Name
                                                </label>
                                                <input type="text" value="{{ $user->first_name or '' }}" class="form-control" id="first_name" name="first_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Middle Name <span class="symbol"></span>
                                                </label>
                                                <input type="text" value="{{ $user->middle_name or '' }}" class="form-control" id="middle_name" name="middle_name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Last Name <span class="symbol required"></span>
                                                </label>
                                                <input type="text" value="{{ $user->last_name or '' }}" class="form-control" id="last_name" name="last_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    @if($user->relation_with_person == '0')
                                                    Father's Name
                                                    @elseif($user->relation_with_person == '1')
                                                    Husband's Name
                                                    @endif
                                                    <span class="symbol required"></span>
                                                </label>
                                                <input type="text" value="{{ $user->relative_id or '' }}" class="form-control" id="relative_id" name="relative_id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group connected-group">
                                                <label class="control-label">
                                                    Date of Birth <span class="symbol required"></span>
                                                </label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <select name="dd" id="dd" class="form-control">
                                                            <option value="">DD</option>  <!-- Bug here ...........this need to be in blade form -->
                                                            <?php for ($i = 01; $i <= 31; $i++) { ?>                                                    
                                                                <option value="<?php echo $i; ?>" <?php if (date('d', strtotime($user->dob)) == $i) echo"selected"; ?>><?php echo $i; ?></option>
                                                            <?php } ?>                    
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <select name="mm" id="mm" class="form-control">
                                                            <option value="">MM</option>  <!-- Bug here ...........this need to be in blade form -->
                                                            <?php for ($i = 01; $i <= 12; $i++) { ?>                                                    
                                                                <option value="<?php echo $i; ?>" <?php if (date('m', strtotime($user->dob)) == $i) echo"selected"; ?>><?php echo $i; ?></option>
                                                            <?php } ?>                                                
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" value="{{ (strtotime($user->dob) == '') ? '' : date('Y', strtotime($user->dob)) }}" id="yyyy" name="yyyy" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Gender <span class="symbol required"></span>
                                                </label>
                                                <div>
                                                    <label class="radio-inline">
                                                        <input type="radio" class="grey" value="0" name="sex" id="sex_female" {{ (($user->sex) == '0') ? 'checked' : '' }}>  <!-- Bug here -->
                                                        Female
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" class="grey" value="1" name="sex"  id="sex_male" {{ (($user->sex) == '1') ? 'checked' : '' }}>  <!-- Bug here -->
                                                        Male
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">
                                                    Marriage Status <span class="symbol required"></span>
                                                </label>
                                                <div>
                                                    <label class="radio-inline">
                                                        <input type="radio" class="grey" value="0" name="marriage_status" id="unmarried" {{ (($user->marriage_status) == '0') ? 'checked' : '' }}>  <!-- Bug here -->
                                                        UnMarried
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" class="grey" value="1" name="marriage_status"  id="married" {{ (($user->marriage_status) == '1') ? 'checked' : '' }}>  <!-- Bug here -->
                                                        Married
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h3>Contact Details</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Mobile Number <span class="symbol required"></span>
                                            </label>
                                            <input type="number" value="{{ $user->mobile_number or '' }}" class="form-control" id="mobile_number" name="mobile_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Home Phone Number
                                            </label>
                                            <input type="number" value="{{ $user->home_number or '' }}" class="form-control" id="home_number" name="home_number">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Address 1 <span class="symbol required"></span>
                                    </label>
                                    <input class="form-control" type="text" name="add_1" value="{{ $user->add_1 or '' }}" id="add_1">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Address 2 <span class="symbol required"></span>
                                    </label>
                                    <input class="form-control" type="text" name="add_2" value="{{ $user->add_2 or '' }}" id="add_2">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        City
                                    </label>
                                    <input class="form-control tooltips" value="{{ $user->city or '' }}" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city" id="city">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">
                                                State <span class="symbol required"></span>
                                            </label>
                                            <select class="form-control" id="state" name="state">
                                                <option value="">Select...</option>
                                                <option value="up">Uttar Pradesh</option>
                                                <option value="dl">Delhi</option>
                                                <option value="mp">Madhya Pradesh</option>
                                                <option value="raj">Rajasthan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Pin Code <span class="symbol required"></span>
                                            </label>
                                            <input class="form-control" type="text" name="pin_code" id="pin_code" value="{{ $user->pin_code or '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Country <span class="symbol required"></span>
                                    </label>
                                    <select class="form-control" id="country" name="country">
                                        <option value="">Select...</option>
                                        <option value="IND" selected>India / भारत</option>
                                        <option value="dl">Delhi</option>
                                        <option value="mp">Madhya Pradesh</option>
                                        <option value="raj">Rajasthan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    Required Fields
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <p>
                                    Click the Update Button to Update your Details.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-green btn-block" type="submit">
                                    Update <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                        {{ Form::token() }}
                    </form>
                </div>                
                <div id="panel_login_details" class="tab-pane fade">
                    <div class="row">
                        <div class="user-left">
                            <div class="col-md-6">
                                <table class="table table-condensed table-hover">
                                    <thead>
                                        <tr>
                                            <th colspan="3"><h3>Login Details</h3></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ URL::route('user-login-details-post'); }}" role="form" id="form" method="post">
                                <h3>Update Details</h3>
                                <div class="form-group">
                                    <label class="control-label">
                                        Email Address
                                    </label>
                                    <input type="email" value="{{ $user->email or '' }}" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Current Password
                                    </label>
                                    <input type="password" placeholder="Old Password" class="form-control" name="old_password" id="old_password" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        New Password
                                    </label>
                                    <input type="password" placeholder="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Confirm Password
                                    </label>
                                    <input type="password"  placeholder="Confirm Password" class="form-control" id="password_again" name="password_again">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p>
                                            Click the Update Button to Update your Details.
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-blue btn-block" type="submit">
                                            Update <i class="fa fa-arrow-circle-right"></i>
                                        </button>
                                    </div>
                                </div>
                                {{ Form::token() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop

    @section('scripts')

    <!-- Scripts for This page only -->
    <script src="{{ URL::asset('assets/plugins/jquery.pulsate/jquery.pulsate.min.js'); }}"></script>
    <script src="{{ URL::asset('assets/js/pages-user-profile.js'); }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js'); }}"></script>
    <script>

jQuery(document).ready(function() {    
    
    if (location.hash) {
        $('a[href=' + location.hash + ']').tab('show');
    }
    $(document.body).on("click", "a[data-toggle]", function(event) {
        location.hash = this.getAttribute("href");
    });
    
    Main.init();
    SVExamples.init();
    PagesUserProfile.init();
    FormElements.init();

});
        
$(window).on('popstate', function() {
    var anchor = location.hash || $("a[data-toggle=tab]").first().attr("href");
    $('a[href=' + anchor + ']').tab('show');
});
    </script>

    @stop