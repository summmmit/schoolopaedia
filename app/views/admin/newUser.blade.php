@extends('layouts.adminLayout')
@section('page_header')
    <h1><i class="fa fa-pencil-square"></i> Register Your Details<small>These are the details of you to be included in our database.</small></h1>
@stop

@section('page_breadcrumb')
    <ol class="breadcrumb">
        <li>
            <a href="#">
                Dashboard
            </a>
        </li>
        <li class="active">
            Register
        </li>
    </ol>
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- start: FORM VALIDATION 1 PANEL -->
            <div class="panel panel-white">
                <div class="panel-body">
                    <form action="{{ URL::route('account-create-post') }}" role="form" id="form" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="errorHandler alert alert-danger no-display">
                                    <i class="fa fa-times-sign"></i> You have some form errors. Please check below.
                                </div>
                                <?php
                                if(count($errors)){

                                    echo "<pre>";
                                    print_r($errors);

                                }
                                    ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        First Name <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Insert your First Name" class="form-control" id="first_name" name="first_name" {{ (Input::old('first_name')) ? 'value = "' .e(Input::old('first_name')). '" ':'' }}>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Middle Name <span class="symbol"></span>
                                    </label>
                                    <input type="text" placeholder="Insert your Middle Name" class="form-control" id="middle_name" name="middle_name" {{ (Input::old('middle_name')) ? 'value = "' .e(Input::old('middle_name')). '" ':'' }}>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Last Name <span class="symbol required"></span>
                                    </label>
                                    <input type="text" placeholder="Insert your Last Name" class="form-control" id="last_name" name="last_name" {{ (Input::old('last_name')) ? 'value = "' .e(Input::old('last_name')). '" ':'' }}>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Email Address
                                    </label>
                                    <input type="email" placeholder="Email Address" class="form-control" id="email" name="email" {{ (Input::old('email')) ? 'value = "' .e(Input::old('email')). '" ':'' }}>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Mobile Number <span class="symbol required"></span>
                                    </label>
                                    <input type="number" placeholder="Mobile Number" class="form-control" id="mobile_number" name="mobile_number" {{ (Input::old('mobile_number')) ? 'value = "' .e(Input::old('mobile_number')). '" ':'' }}>
                                </div>
                                <div class="form-group connected-group">
                                    <label class="control-label">
                                        Date of Birth <span class="symbol required"></span>
                                    </label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select name="dd" id="dd" class="form-control"  {{ (Input::old('dd')) ? 'value = "' .e(Input::old('dd')). '" ':'' }}>
                                                <option value="">DD</option>
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
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="mm" id="mm" class="form-control" {{ (Input::old('mm')) ? 'value = "' .e(Input::old('mm')). '" ':'' }}>
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
                                        <div class="col-md-3">
                                            <input type="text" placeholder="YYYY" id="yyyy" name="yyyy" class="form-control" {{ (Input::old('yyyy')) ? 'value = "' .e(Input::old('yyyy')). '" ':'' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Gender <span class="symbol required"></span>
                                    </label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="1" name="sex" id="sex_female">
                                            Female
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="2" name="sex"  id="sex_male">
                                            Male
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Marriage Status <span class="symbol required"></span>
                                    </label>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="0" name="marriage_status" id="unmarried">
                                            Unmarried
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="1" name="marriage_status"  id="married">
                                            Married
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Voter Id of Father / Husband <span class="symbol required"></span>
                                            </label>
                                            <input type="text" placeholder="Voter Id of Father / Husband" class="form-control" id="relative_id" name="relative_id" {{ (Input::old('relative_id')) ? 'value = "' .e(Input::old('relative_id')). '" ':'' }}>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">
                                                Relation With Person <span class="symbol required"></span>
                                            </label>
                                            <div>
                                                <label class="radio-inline">
                                                    <input type="radio" class="grey" value="1" name="relation_with_person" id="father">
                                                    Father
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" class="grey" value="2" name="relation_with_person"  id="husband">
                                                    Husband
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">
                                        Address 1 <span class="symbol required"></span>
                                    </label>
                                    <input class="form-control" type="text" name="add_1" id="add_1" {{ (Input::old('add_1')) ? 'value = "' .e(Input::old('add_1')). '" ':'' }}>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Address 2 <span class="symbol"></span>
                                    </label>
                                    <input class="form-control" type="text" name="add_2" id="add_2" {{ (Input::old('add_2')) ? 'value = "' .e(Input::old('add_2')). '" ':'' }}>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        City <span class="symbol required"></span>
                                    </label>
                                    <input class="form-control" type="text" name="city" id="city" {{ (Input::old('city')) ? 'value = "' .e(Input::old('city')). '" ':'' }}>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="control-label">
                                                State <span class="symbol required"></span>
                                            </label>
                                            <select class="form-control" id="state" name="state" {{ (Input::old('state')) ? 'value = "' .e(Input::old('state')). '" ':'' }}>
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
                                            <input class="form-control" type="text" name="pin_code" id="pin_code" {{ (Input::old('pin_code')) ? 'value = "' .e(Input::old('pin_code')). '" ':'' }}>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">
                                        Country <span class="symbol required"></span>
                                    </label>
                                    <select class="form-control" id="country" name="country" {{ (Input::old('country')) ? 'value = "' .e(Input::old('country')). '" ':'' }}>
                                        <option value="">Select...</option>
                                        <option value="up" selected>India / भारत</option>
                                        <option value="dl">Delhi</option>
                                        <option value="mp">Madhya Pradesh</option>
                                        <option value="raj">Rajasthan</option>
                                    </select>
                                </div>
                                <div class="form-group center">
                                    <div class="col-sm-12">
                                        <label>
                                            Your Picture
                                        </label>
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA?text=no+image" alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"></div>
                                            <div>
                                            <span class="btn btn-light-grey btn-file"><span class="fileupload-new"><i class="fa fa-picture-o"></i> Select image</span><span class="fileupload-exists"><i class="fa fa-picture-o"></i> Change</span>
                                                <input type="file" name="pic">
                                            </span>
                                                <a href="#" class="btn fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                    <i class="fa fa-times"></i> Remove
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <hr>
                                    <label class="control-label">
                                        <strong>Signup for Rapido Emails</strong> <span class="symbol required"></span>
                                    </label>
                                    <p>
                                        Would you like to review Rapido emails?
                                    </p>
                                    <div>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="0" name="newsletter" >
                                            No
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" class="grey" value="1" name="newsletter">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <span class="symbol required"></span>Required Fields
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <p>
                                    By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-yellow btn-block" type="submit">
                                    Register <i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </div>
                        {{ Form::token() }}
                    </form>
                </div>
            </div>
            <!-- end: FORM VALIDATION 1 PANEL -->
        </div>
    </div>
@stop

@section('scripts')
    <!-- Scripts for This page only -->
    <script src="{{ URL::asset('/assets/js/modifiedJs/form-validation.js'); }}"></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js'); }}"></script>

    <script>
        jQuery(document).ready(function() {
            Main.init();
            SVExamples.init();
            FormValidator.init();
            FormElements.init();
        });
    </script>
@stop