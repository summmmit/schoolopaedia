@extends('user.layout.UserLayout')

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
                                            <div class="fileupload-new thumbnail"><img src="{{ URL::asset('assets/images/ss.PNG') }}" alt="">
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
                                            <td>Suraj Prasad</td>
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
                    <form action="{{ URL::route('user-edit-post'); }}" role="form" id="form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Account Info</h3>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        First Name
                                    </label>
                                    <input type="text" placeholder="{{ $user->first_name }}" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Middle Name <span class="symbol"></span>
                                    </label>
                                    <input type="text" placeholder="{{ $user->middle_name }}" class="form-control" id="middle_name" name="middle_name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Last Name <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="{{ $user->last_name }}" class="form-control" id="last_name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Email Address
                                    </label>
                                    <input type="email" placeholder="{{ $user->email }}" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Mobile Number <span class="symbol required"></span>
                                    </label>
                                    <input type="number" placeholder="{{ $user->mobile_number }}" class="form-control" id="mobile_number" name="mobile_number">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Password
                                    </label>
                                    <input type="password" placeholder="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Confirm Password
                                    </label>
                                    <input type="password"  placeholder="password" class="form-control" id="password_again" name="password_again">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group connected-group">
                                    <label class="control-label">
                                        Date of Birth <span class="symbol required"></span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="dd" id="dd" class="form-control">
                                                <option value="">DD</option>  <!-- Bug here ...........this need to be in blade form -->
                                                <?php for ($i = 01; $i <= 31; $i++) { ?>                                                    
                                                    <option value="<?php echo $i; ?>" <?php if (date('d', strtotime($user->dob)) == $i) echo"selected"; ?>><?php echo $i; ?></option>
                                                <?php } ?>                    
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="mm" id="mm" class="form-control">
                                                <option value="">MM</option>  <!-- Bug here ...........this need to be in blade form -->
                                                <?php for ($i = 01; $i <= 12; $i++) { ?>                                                    
                                                    <option value="<?php echo $i; ?>" <?php if (date('m', strtotime($user->dob)) == $i) echo"selected"; ?>><?php echo $i; ?></option>
                                                <?php } ?>                                                
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" placeholder="{{ date('Y', strtotime($user->dob)) }}" id="yyyy" name="yyyy" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Gender <span class="symbol required"></span>
                                    </label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="1" name="sex" id="sex_female" {{ (($user->sex) == '0') ? 'checked' : '' }}>  <!-- Bug here -->
                                            Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="2" name="sex"  id="sex_male" {{ (($user->sex) == '1') ? 'checked' : '' }}>  <!-- Bug here -->
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Zip Code
                                            </label>
                                            <input class="form-control" placeholder="{{ $user->pin_code }}" type="text" name="zipcode" id="zipcode">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">
                                                City
                                            </label>
                                            <input class="form-control tooltips" placeholder="{{ $user->city }}" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city" id="city">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>
                                        Image Upload
                                    </label>
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail"><img src="assets/images/avatar-1-xl.jpg" alt="">
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"></div>
                                        <div class="user-edit-image-buttons">
                                            <span class="btn btn-azure btn-file"><span class="fileupload-new"><i class="fa fa-picture"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture"></i> Change</span>
                                                <input type="file" name="pic">
                                            </span>
                                            <a href="#" class="btn fileupload-exists btn-red" data-dismiss="fileupload">
                                                <i class="fa fa-times"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Additional Info</h3>
                                <hr>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Twitter
                                    </label>
                                    <span class="input-icon">
                                        <input class="form-control" type="text" placeholder="Text Field">
                                        <i class="fa fa-twitter"></i> </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Facebook
                                    </label>
                                    <span class="input-icon">
                                        <input class="form-control" type="text" placeholder="Text Field">
                                        <i class="fa fa-facebook"></i> </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Google Plus
                                    </label>
                                    <span class="input-icon">
                                        <input class="form-control" type="text" placeholder="Text Field">
                                        <i class="fa fa-google-plus"></i> </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Github
                                    </label>
                                    <span class="input-icon">
                                        <input class="form-control" type="text" placeholder="Text Field">
                                        <i class="fa fa-github"></i> </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Linkedin
                                    </label>
                                    <span class="input-icon">
                                        <input class="form-control" type="text" placeholder="Text Field">
                                        <i class="fa fa-linkedin"></i> </span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Skype
                                    </label>
                                    <span class="input-icon">
                                        <input class="form-control" type="text" placeholder="Text Field">
                                        <i class="fa fa-skype"></i> </span>
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
                                    By clicking UPDATE, you are agreeing to the Policy and Terms &amp; Conditions.
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
    Main.init();
    SVExamples.init();
    PagesUserProfile.init();
    FormElements.init();
});
    </script>

    @stop