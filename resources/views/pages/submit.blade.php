@extends('layouts.browser')

@section('content')

<div class="ui two column centered grid">
    <div class="column">
        <div id="submit">
            <div class="ui padded segment">
                <h1 class="ui header">
                    Submit Your Notes
                    @if ($submitted == true)
                    fi-unlock
                    @endif
                    <div class="sub header">Notes can be for readings or for lectures</div>
                </h1>
                <form role="form" method="POST" id="submitForm" action='/submit' class="ui form" enctype="multipart/form-data">
                    <div class="field">
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <div class="field">
                        <textarea rows="2" type="text" name="description" placeholder="Description"></textarea>
                    </div>
                    <h4 class="ui horizontal divider header">Additional Info</h4>
                    <div class="field">
                        <div class="field">
                            <select name="course" class="search" id="coursesDropdown" placeholder="Courses">
                            </select>
                        </div>
                        <div class="field">
                            <select name="professor" class="search" id="professorsDropdown" placeholder="Professor">
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="filename" value="" />
                    <div id="uploadArea" class="field">
                        <div id="uploadBtn" class="ui fluid button">Select File</div>
                        <input type="file" name="pdf" id="uploadInput" class="hidden" />
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
            <div class="ui center aligned container">
                <div id="continueBtn" class="ui right labeled icon primary large button">
                    Continue
                    <i class="caret right icon"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
