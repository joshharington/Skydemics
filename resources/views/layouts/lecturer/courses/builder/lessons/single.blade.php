@extends('index')

@section('site-title')
    Edit a Lesson | Lecturer
@endsection

@section('page-title')
    Edit a Lesson | Lecturer <small><a href="{{ route('courses.builder.lessons', $course->slug) }}">Back to {{ $course->name }} lessons</a></small>
@endsection

@section('custom-styles')
    <link rel="stylesheet" href="/assets/css/responsive-tabs.css"/>
    <link rel="stylesheet" href="/assets/css/dropzone.css"/>
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
            <li class="active" data-item="course"><a href="#lesson"><i class="fa fa-fw fa-lock"></i> <span class="hidden-sm hidden-xs">Lesson</span></a></li>
            <li data-item="meta"><a href="#meta"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Meta</span></a></li>
        </ul>
        <!-- // END Tabs -->

        <!-- Panes -->
        <div class="tab-content">
            <form action="{{ route('courses.builder.lessons.single', [$course->slug, $lesson->slug]) }}" method="POST" id="builder-form" enctype="multipart/form-data">
                <div id="lesson" class="tab-pane active">

                    <div class="col-md-7">
                        <div class="form-group form-control-material">
                            <input type="text" name="title" id="title" placeholder="Lesson Title" class="form-control used" value="{{ (old('title')) ? old('title') : $lesson->name }}" />
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-addon text-primary" style="color: #797979;">{{ env('APP_URL') }}/courses/{{ $course->lecturer_id }}/{{ $course->slug }}/{{ ($module->slug != '') ? $module->slug : $module->id }}/</span>
                            <input type="text" class="form-control" id="slug" aria-describedby="slug" name="slug" value="{{ (old('slug')) ? old('slug') : $lesson->slug }}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" class="summernote">{!! (old('description')) ? old('description') : $lesson->description !!}</textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br /><br />
                    <input type="file" name="files" />
                </div>

                <div id="meta" class="tab-pane">
                    <div class="form-group">
                        <div class="col-md-4">
                            <label for="parent">Attendance Code</label>
                            <br />
                            <div class="form-group form-control-material">
                                <input type="text" placeholder="Attendance Code" class="form-control" id="attendance_code" aria-describedby="attendance_code" name="attendance_code" value="{{ (old('attendance_code')) ? old('attendance_code') : (($lesson->lesson_code != '') ? $lesson->lesson_code : str_random(4)) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="start_date">Start Date</label>
                            <div class="form-group form-control-material">
                                <input type="text" name="start_date" id="start-date" placeholder="Start Date" class="form-control datepicker" value="{{ (old('start_date')) ? old('start_date') : date('m/d/Y', $lesson->start_date) }} " />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date">End Date</label>
                            <div class="form-group form-control-material">
                                <input type="text" name="end_date" id="end-date" placeholder="End Date" class="form-control datepicker" value="{{ (old('end_date')) ? old('end_date') : date('m/d/Y', $lesson->end_date) }}" />
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <br />
                        <div class="col-md-3">
                            <label for="parent">Is Published</label>
                            <br />
                            <div data-type="published" class="checkbox checkbox-info checkbox-circle">
                                <input id="published" type="checkbox" name="published" {{ (old('published')) ? 'checked' : (($lesson->published == 1) ? 'checked' : '') }}>
                                <label for="published">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="parent">Requires Attendance</label>
                            <br />
                            <div data-type="requires_attendance" class="checkbox checkbox-info checkbox-circle">
                                <input id="requires_attendance" type="checkbox" checked name="requires_attendance" {{ (old('requires_attendance')) ? 'checked' : ( ($lesson->requires_attendance == 1) ? 'checked' : '') }}>
                                <label for="requires_attendance">Yes</label>
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
        </div>

        <!-- // END Panes -->

    </div>
    <!-- // END Tabbable Widget -->
@endsection

@section('custom-scripts')
    <script src="/assets/js/vendor/forms/summernote.js"></script>
    <script src="/assets/js/responsiveTabs.min.js"></script>
    <script src="/assets/js/dropzone.js"></script>
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