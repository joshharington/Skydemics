@extends('index')

@section('site-title')
    Course Builder
@endsection

@section('page-title')
    Course Builder
@endsection

@section('custom-styles')
    <link rel="stylesheet" href="/assets/css/responsive-tabs.css"/>
    <style>
        .note-editor {
            min-height: 300px !important;
        }
    </style>
@endsection

@section('content')
    <!-- Tabbable Widget -->
    <div class="tabbable paper-shadow relative" data-z="0.5" id="tabs">

            <!-- Tabs -->
            <ul class="nav nav-tabs">
                <li class="active" data-item="course"><a href="#course"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Course</span></a></li>
                <li data-item="meta"><a href="#meta"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Meta</span></a></li>
            </ul>
            <!-- // END Tabs -->

            <!-- Panes -->
            <div class="tab-content">
                <form action="{{ route('courses.builder') }}" method="POST" id="builder-form">
                <div id="course" class="tab-pane active">

                        <div class="col-md-9">
                            <div class="form-group form-control-material">
                                <input type="text" name="title" id="title" placeholder="Course Title" class="form-control used" value="{{ old('title') }}" />
                                <label for="title">Title</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon text-primary" style="color: #797979;">{{ env('APP_URL') }}/courses/</span>
                                <input type="text" class="form-control" id="slug" aria-describedby="slug" name="slug" value="{{ old('slug') }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" class="summernote">{!! old('description') !!}</textarea>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                </div>

                <div id="meta" class="tab-pane">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="parent">Discipline</label>
                            <br />
                            <select name="discipline" class="selectpicker" data-style="btn-white" data-live-search="true" data-size="5">
                                @foreach($disciplines as $discipline_id => $dis)
                                    <option value="{{ $discipline_id }}" {{ ($discipline_id == old('discipline')) ? 'selected' : '' }}>{{ $dis }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="start_date">Start Date</label>
                            <div class="form-group form-control-material">
                                <input type="text" name="start_date" id="start-date" placeholder="Start Date" class="form-control datepicker" value="{{ old('start_date') }} " />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">End Date</label>
                            <div class="form-group form-control-material">
                                <input type="text" name="end_date" id="end-date" placeholder="End Date" class="form-control datepicker" value="{{ old('end_date') }}" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                        <div class="col-md-3">
                            <label for="parent">Is Published</label>
                            <br />
                            <div data-type="published" class="checkbox checkbox-info checkbox-circle">
                                <input id="published" type="checkbox" name="published" {{ (old('published')) ? 'checked' : '' }}>
                                <label for="published">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="parent">Enrollments are Invite Only</label>
                            <br />
                            <div data-type="invite_only" class="checkbox checkbox-info checkbox-circle">
                                <input id="invite_only" type="checkbox" name="invite_only" {{ (old('invite_only')) ? 'checked' : '' }}>
                                <label for="invite_only">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="parent">Anyone can enroll</label>
                            <br />
                            <div data-type="public_enrollment" class="checkbox checkbox-info checkbox-circle">
                                <input id="public_enrollment" type="checkbox" checked name="public_enrollment" {{ (old('public_enrollment')) ? 'checked' : '' }}>
                                <label for="public_enrollment">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="parent">Manually accept enrollments</label>
                            <br />
                            <div class="checkbox checkbox-info checkbox-circle">
                                <input id="manually_accept" type="checkbox" name="manually_accept" {{ (old('manually_accept')) ? 'checked' : '' }}>
                                <label for="manually_accept">Yes</label>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                    {{ csrf_field() }}
                </form>
            </div>

            <div class="clearfix"></div>

            <div class="text-right">
                <a href="#" class="btn btn-primary" id="btn_save">Save</a>
                <a href="#" class="btn btn-primary">Lessons >></a>
            </div>

        <!-- // END Panes -->

    </div>
    <!-- // END Tabbable Widget -->
@endsection

@section('custom-scripts')
    <script src="/assets/js/vendor/forms/summernote.js"></script>
    <script src="/assets/js/responsiveTabs.min.js"></script>
    <script>
        $(function () {

            $('.summernote').each(function () {
                $(this).summernote();
            });

            $('#tabs').responsiveTabs({
                startCollapsed: 'accordion'
            });

            $('.datepicker').datepicker();

            $('#tabs').responsiveTabs('activate', 0);

            $('.nav-tabs li[data-item="course"]').on('click', function() {
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');
            });

            $('.nav-tabs li[data-item="meta"]').on('click', function() {
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');
            });

            $('#title').on('keyup', function() {
                $('#slug').val(str_slug($(this).val()));
            });

            $('.checkbox').on('click', function() {
                switch($(this).data('type')) {
                    case 'invite_only':
                        $('#public_enrollment').prop('checked', false);
                        break;
                    case 'public_enrollment':
                        $('#invite_only').prop('checked', false);
                        break;
                }
            });

            $('#btn_save').on('click', function() {
                $('#builder-form').submit();
            });

        });
    </script>
@endsection