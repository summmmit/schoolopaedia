@extends('layouts.login.registration')
@section('content')
<!-- start: REGISTER BOX -->
<div class="box-register">
    <h3>Sign Up</h3>
    <p>
        Enter your personal details below:
    </p>
    <form class="form-register" action="{{ URL::route('admin-account-create-post'); }}" method="post">
        <div class="errorHandler alert alert-danger no-display">
            <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
        </div>
        @if(Session::has('global'))
        <div class="alert alert-info global-error">
            <button data-dismiss="alert" class="close">
                &times;
            </button>
            <strong>{{ Session::get('global') }}</strong>
        </div>
        @endif
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" {{ (Input::old('first_name')) ? 'value = "' .e(Input::old('first_name')). '" ':'' }}>
                           @if ($errors->has('first_name')) <p class="help-block alert-danger">{{ $errors->first('first_name') }}</p> @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" {{ (Input::old('last_name')) ? 'value = "' .e(Input::old('last_name')). '" ':'' }}>
                           @if ($errors->has('last_name')) <p class="help-block alert-danger">{{ $errors->first('last_name') }}</p> @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City" {{ (Input::old('city')) ? 'value = "' .e(Input::old('city')). '" ':'' }}>
                           @if ($errors->has('city')) <p class="help-block alert-danger">{{ $errors->first('city') }}</p> @endif
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="state" placeholder="state" {{ (Input::old('state')) ? 'value = "' .e(Input::old('state')). '" ':'' }}>
                           @if ($errors->has('state')) <p class="help-block alert-danger">{{ $errors->first('state') }}</p> @endif
            </div>
            <div class="form-group">
                <div>
                    <label class="radio-inline">
                        <input type="radio" class="grey" value="0" name="sex">
                        Female
                    </label>
                    <label class="radio-inline">
                        <input type="radio" class="grey" value="1" name="sex">
                        Male
                    </label>
                </div>
            </div>
            <p>
                Enter your School details below:
            </p>
            <div class="form-group">
                <span class="input-icon">
                    <input type="text" class="form-control" name="school_registration_code" placeholder="School Code" value="{{ Input::old('school_registration_code') or '' }}">
                    @if ($errors->has('school_registration_code')) <p class="help-block alert-danger">{{ $errors->first('school_registration_code') }}</p> @endif
                    <i class="fa fa-envelope"></i> </span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="text" class="form-control" name="admin_registration_code" placeholder="Admin Code" value="{{ Input::old('admin_registration_code') or '' }}">
                    @if ($errors->has('admin_registration_code')) <p class="help-block alert-danger">{{ $errors->first('admin_registration_code') }}</p> @endif
                    <i class="fa fa-envelope"></i> </span>
            </div>
            <p>
                Enter your account details below:
            </p>
            <div class="form-group">
                <span class="input-icon">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ Input::old('email') or '' }}">
                           @if ($errors->has('email')) <p class="help-block alert-danger">{{ $errors->first('email') }}</p> @endif
                    <i class="fa fa-envelope"></i> </span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                           @if ($errors->has('password')) <p class="help-block alert-danger">{{ $errors->first('password') }}</p> @endif
                    <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="password" class="form-control" name="password_again" placeholder="Password Again">
                           @if ($errors->has('password_again')) <p class="help-block alert-danger">{{ $errors->first('password_again') }}</p> @endif
                    <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
                <div>
                    <label for="agree" class="checkbox-inline">
                        <input type="checkbox" class="grey agree" id="agree" name="agree">
                        I agree to the Terms of Service and Privacy Policy
                    </label>
                </div>
            </div>
            <div class="form-actions">
                Already have an account?
                <a href="{{ URL::route('admin-sign-in') }}">
                    Log-in
                </a>
                <button type="submit" class="btn btn-green pull-right">
                    Submit <i class="fa fa-arrow-circle-right"></i>
                </button>
            </div>
        </fieldset>
        {{ Form::token() }}
    </form>
    <!-- start: COPYRIGHT -->
    <div class="copyright">
        2014 &copy; Rapido by Sumit Singh.
    </div>
    <!-- end: COPYRIGHT -->
</div>
<!-- end: REGISTER BOX -->
@stop
@section('scripts')
<script>
    jQuery(document).ready(function() {
        Main.init();
        Login.init();
    });
</script>

@stop