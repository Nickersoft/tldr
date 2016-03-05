@extends('layouts.default')

@section('content')
    <div class="ui home middle aligned center aligned grid">
        <div class="column">
            <form class="ui large form" action="/search" method="POST">
                <div class="field">
                    <img class="ui medium centered image" src="/images/logo.png">
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="search icon"></i>
                        <input type="text" name="search" placeholder="Search class notes, reading notes, and more">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </div>
                <div class="ui buttons">
                  <button class="ui large primary button">Search</button>
                  <div class="or"></div>
                  <a href="/submit" class="ui large button">Submit</a>
                </div>
            </form>
        </div>
    </div>
@stop
