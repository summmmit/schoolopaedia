@extends('layouts.login.registration')
@section('stylesheets')
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/bootstrap-social-buttons/bootstrap-social.css'); }}">
<style>
    .btn-social{
        text-align: center;
    }
</style>
@stop
@section('content')
<!-- start: LOGIN BOX -->
<div class="box-login">
    <h3>Sign in to your account</h3>
    <p>
        Please enter your name and password to log in.
    </p>
    <form class="form-login" action="#" method="post">
        <!-- Some Message to be Displayed start-->
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
            <div class="form-group">
                <span class="input-icon">
                    <input type="text" class="form-control" name="identity" placeholder="Email Address / Username" value="{{ Input::old('identity') or '' }}">
                    <i class="fa fa-user"></i> </span>
            </div>
            <div class="form-group form-actions">
                <span class="input-icon">
                    <input type="password" class="form-control password" name="password" placeholder="Password">
                    <i class="fa fa-lock"></i>
                    <a class="forgot" href="{{ URL::route('user-forgot-password'); }}">
                        I forgot my password
                    </a> </span>
            </div>
            <div class="form-actions">
                <label for="remember" class="checkbox-inline">
                    <input type="checkbox" class="grey remember" id="remember" name="remember">
                    Keep me signed in
                </label>
                <button type="submit" id="submit_login" class="btn btn-green pull-right">
                    Login <i class="fa fa-arrow-circle-right"></i>
                </button>
            </div>
            <div class="new-account">
                Don't have an account yet?
                <a href="{{ URL::route('user-account-create'); }}">
                    Create an account
                </a>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ URL::route('user-google-auth'); }}" class="btn margin-bottom-10 btn-block btn-social btn-google-plus"><i class="fa fa-google-plus"></i> Sign in with Google</a>
                </div>
                <div class="col-md-6">
                    <a href="{{ URL::route('user-facebook-auth'); }}" class="btn btn-social btn-facebook btn-block"><i class="fa fa-facebook"></i> Sign in with Facebook</a>
                </div>
            </div>
        </fieldset>
        {{ Form::token() }}
    </form>
    <!-- start: COPYRIGHT -->
    <div class="copyright">
        2015 &copy; Sumit Prasad.
    </div>
    <!-- end: COPYRIGHT -->
</div>
<!-- end: LOGIN BOX -->
@stop
@section('scripts')
<script>
    jQuery(document).ready(function() {
        Main.init();
        Login.init();

        function url(url){
            window.location = url;
        }

        $('#submit_login').on('click', function(e){
            e.preventDefault();

            var data = {
                identity : $('input[name="identity"]').val(),
                password : $('input[name="password"]').val()
            }

            $.ajax({
                data: data,
                url: 'http://localhost/projects/schoolopaedia/public/mobile/user/sign/in/post',
                dataType: 'json',
                method : 'POST',
                success: function(result) {
                    console.log(result);
                    if(result.status == "success"){
                        alert('dasgda');
                        if(result.result.login_flag == 2){
                            url('/user/home');
                            alert('dasgda');
                        }
                    }
                }
            });
        });

    });
</script>

@stop