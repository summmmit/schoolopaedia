@extends('layouts.user-main-layout')

@section('page_header')
<h1><i class="fa fa-pencil-square"></i>Home</h1>
@stop

@section('page_breadcrumb')
<ol class="breadcrumb">
    <li>
        <a href="#">
            Dashboard
        </a>
    </li>
    <li class="active">
        Home
    </li>
</ol>
@stop

@section('content')
<!-- start: PAGE CONTENT -->
<div class="row">
    <div class="col-sm-12">
        <!-- start: FORM WIZARD PANEL -->
        <div class="panel panel-white">
            <div class="panel-heading">
                <h4 class="panel-title">WelCome <span class="text-bold">Wizard</span></h4>
            </div>
            <div class="panel-body">
                <form action="#" role="form" class="smart-wizard form-horizontal" id="form">
                    <div id="wizard" class="swMain">
                        <ul>
                            <li>
                                <a href="#step-1">
                                    <div class="stepNumber">
                                        1
                                    </div>
                                    <span class="stepDesc"> Step 1
                                        <br />
                                        <small>Register Your School</small> </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <div class="stepNumber">
                                        2
                                    </div>
                                    <span class="stepDesc"> Step 2
                                        <br />
                                        <small>Step 2 description</small> </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-3">
                                    <div class="stepNumber">
                                        3
                                    </div>
                                    <span class="stepDesc"> Step 3
                                        <br />
                                        <small>Step 3 description</small> </span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-4">
                                    <div class="stepNumber">
                                        4
                                    </div>
                                    <span class="stepDesc"> Step 4
                                        <br />
                                        <small>Step 4 description</small> </span>
                                </a>
                            </li>
                        </ul>
                        <div class="progress progress-xs transparent-black no-radius active">
                            <div aria-valuemax="100" aria-valuemin="0" role="progressbar" class="progress-bar partition-green step-bar">
                                <span class="sr-only"> 0% Complete (success)</span>
                            </div>
                        </div>
                        <div id="step-1" class="step-1">
                            <h2 class="StepTitle">Register Your School</h2>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    School Code <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="registration-code" name="registration_code" placeholder="School Code Here">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Student Code <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="code-for-students" name="code_for_students" placeholder="Student Code Here">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-8">
                                    <button class="btn btn-blue next-step btn-block">
                                        Next <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-2">
                            <h2 class="StepTitle">Step 2 Content</h2>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    full_name <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Phone Number <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Gender <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <label class="radio-inline">
                                        <input type="radio" class="grey" value="f" name="gender" id="gender_female" >
                                        Female
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="grey" value="m" name="gender"  id="gender_male">
                                        Male
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Address <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Country <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <select class="form-control" id="country" name="country">
                                        <option value="">&nbsp;</option>
                                        <option value="Country 1">Country 1</option>
                                        <option value="Country 2">Country 2</option>
                                        <option value="Country 3">Country 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    City <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="city" name="city" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-3">
                                    <button class="btn btn-light-grey back-step btn-block">
                                        <i class="fa fa-circle-arrow-left"></i> Back
                                    </button>
                                </div>
                                <div class="col-sm-2 col-sm-offset-3">
                                    <button class="btn btn-blue next-step btn-block">
                                        Next <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-3">
                            <h2 class="StepTitle">Step 3 Title</h2>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Card Holder Name <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="card_name" name="card_name" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Card Number <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    CVC <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="card_cvc" name="card_cvc" placeholder="Text Field">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Expiration(MM/YYYY) <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <select class="form-control" id="card_expiry_mm" name="card_expiry_mm">
                                                <option value="">MM</option>
                                                <option value="01">1</option>
                                                <option value="02">2</option>
                                                <option value="03">3</option>
                                                <option value="04">4</option>
                                                <option value="05">5</option>
                                                <option value="06">6</option>
                                                <option value="07">7</option>
                                                <option value="08">8</option>
                                                <option value="09">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="card_expiry_yyyy" id="card_expiry_yyyy" placeholder="YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Payment Options <span class="symbol required"></span>
                                </label>
                                <div class="col-sm-7">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="grey" value="" name="payment" id="payment1">
                                            Auto-Pay with this Credit Card
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="grey" value="" name="payment"  id="payment2">
                                            Email me monthly billing
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-3">
                                    <button class="btn btn-light-grey back-step btn-block">
                                        <i class="fa fa-circle-arrow-left"></i> Back
                                    </button>
                                </div>
                                <div class="col-sm-2 col-sm-offset-3">
                                    <button class="btn btn-blue next-step btn-block">
                                        Next <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-4">
                            <h2 class="StepTitle">Step 4 Title</h2>
                            <h3>Account</h3>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Username:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="username"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Email:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="email"></p>
                                </div>
                            </div>
                            <h3>Profile</h3>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Fullname:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="full_name"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Gender:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="gender"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Phone:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="phone"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Address:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="address"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    City:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="city"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Country:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="country"></p>
                                </div>
                            </div>
                            <h3>Billing</h3>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Card Name:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="card_name"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Card Number:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="card_number"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    CVC:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="card_cvc"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Expiration:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="card_expiry"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">
                                    Payment Options:
                                </label>
                                <div class="col-sm-7">
                                    <p class="form-control-static display-value" data-display="payment"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-sm-offset-8">
                                    <button class="btn btn-success finish-step btn-block">
                                        Finish <i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- end: FORM WIZARD PANEL -->
    </div>
</div>
<!-- end: PAGE CONTENT-->
@stop

@section('scripts')

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script src="{{ URL::asset('assets/plugins/jQuery-Smart-Wizard/js/jquery.smartWizard.js'); }}"></script>
<script src="{{ URL::asset('assets/js/modifiedJs/user/welcome-settings-wizard.js'); }}"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    jQuery(document).ready(function() {
        Main.init();
        SVExamples.init();
        WelcomeSettingsWizard.init();
    });
</script>

@stop
