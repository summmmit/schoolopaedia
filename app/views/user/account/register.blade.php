@extends('user.layout.registration')
@section('content')
<!-- start: REGISTER BOX -->
<div class="box-register">
    <h3>Sign Up</h3>
    <p>
        Enter your personal details below:
    </p>
    <form class="form-register" action="{{ URL::route('user-account-create-post'); }}" method="post">
        <div class="errorHandler alert alert-danger no-display">
            <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
            <?php
            if (count($errors)) {

                echo "<pre>";
                print_r($errors);
            }
            ?>
        </div>
        <fieldset>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" {{ (Input::old('first_name')) ? 'value = "' .e(Input::old('first_name')). '" ':'' }}>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" {{ (Input::old('last_name')) ? 'value = "' .e(Input::old('last_name')). '" ':'' }}>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City" {{ (Input::old('city')) ? 'value = "' .e(Input::old('city')). '" ':'' }}>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="state" placeholder="state" {{ (Input::old('state')) ? 'value = "' .e(Input::old('state')). '" ':'' }}>
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
                Enter your account details below:
            </p>
            <div class="form-group">
                <span class="input-icon">
                    <input type="email" class="form-control" name="email" placeholder="Email" {{ (Input::old('email')) ? 'value = "' .e(Input::old('email')). '" ':'' }}>
                    <i class="fa fa-envelope"></i> </span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <i class="fa fa-lock"></i> </span>
            </div>
            <div class="form-group">
                <span class="input-icon">
                    <input type="password" class="form-control" name="password_again" placeholder="Password Again">
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
                <a href="{{ URL::route('user-sign-in') }}">
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
        2014 &copy; Rapido by cliptheme.
    </div>
    <!-- end: COPYRIGHT -->
</div>
<!-- end: REGISTER BOX -->
@stop