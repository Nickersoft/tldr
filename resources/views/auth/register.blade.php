@extends('layouts.browser')

@section('content')

<div class="ui middle aligned center aligned grid">
    <div class="column" style="max-width:450px;">
        <div id="submit">
            <div class="ui stacked segment">
                <form role="form" method="POST" id="submitForm" action='/submit/save' class="ui large form" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="Username" value="{{ old('username') }}">
                            <i class="user icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="text" placeholder="Email" value="{{ old('email') }}">
                            <i class="mail icon"></i>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <input type="password" placeholder="Password">
                            <i class="lock icon"></i>
                        </div>
                    </div>
                    <div id="loginBtn" class="ui fluid primary button">Register</div>
                </form>
            </div>
            <div class="ui segment">
                <p>Already have an account? Click <a href="/auth/login">here</a> to login!</p>
            </div>
        </div>
    </div>
</div>

@stop
