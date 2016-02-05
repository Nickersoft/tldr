@extends('layouts.browser')

@section('content')
<p> {{ $errors->first('email') }} </p>
<div class="ui middle aligned center aligned grid">
    <div class="column" style="max-width:450px;">
        <div id="submit">
            <div class="ui stacked segment">
                <form role="form" method="POST" id="submitForm" action='/auth/register' class="ui large form">
                    {!! csrf_field() !!}
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="Username" name="username" value="{{ old('username') }}">
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                            <i class="mail icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="password" name="password" placeholder="Password">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="password" name="password_confirmation" placeholder="Retype password">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <button type="submit" id="registerBtn" class="ui fluid primary button">Register</div>
                </form>
            </div>
            <div class="ui segment">
                <p>Already have an account? Click <a href="/auth/login">here</a> to login!</p>
            </div>
        </div>
    </div>
</div>

@stop
