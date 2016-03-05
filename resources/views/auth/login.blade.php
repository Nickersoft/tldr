@extends('layouts.browser')

@section('content')

<div class="ui middle aligned center aligned grid">
    <div class="column" style="max-width:450px;">
        <div id="submit">
            <div class="ui stacked segment">
                <form role="form" method="POST" id="submitForm" action='/auth/login' class="ui large form" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="field">
                        <div class="ui left icon input">
                            <input name="email" type="text" placeholder="Email" value="{{ old('email') }}">
                            <i class="mail icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input name="password" type="password" placeholder="Password">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui checkbox">
                            <input type="checkbox" name="remember">
                            <label>Remember Me</label>
                        </div>
                    </div>
                    <button type="submit" id="loginBtn" class="ui fluid primary button">Login</button>
                </form>
            </div>
            <div class="ui segment">
                <p>No account? Click <a href="/auth/register">here</a> to sign up for free!</p>
            </div>
        </div>
    </div>
</div>

@stop
