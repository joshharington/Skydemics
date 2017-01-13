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
            <li data-item="lessons"><a href="#lessons"><i class="fa fa-fw fa-credit-card"></i> <span class="hidden-sm hidden-xs">Lessons</span></a></li>
        </ul>
        <!-- // END Tabs -->

        <!-- Panes -->
        <div class="tab-content">

            <div id="course" class="tab-pane active">
                <form action="">
                    <div class="col-md-9">
                        <div class="form-group form-control-material">
                            <input type="text" name="title" id="title" placeholder="Course Title" class="form-control used" value="" />
                            <label for="title">Title</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon text-primary" style="color: #797979;">{{ env('APP_URL') }}/courses/</span>
                            <input type="text" class="form-control" id="slug" aria-describedby="slug" name="slug">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" class="summernote">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae consectetur dignissimos itaque nesciunt nostrum, provident saepe similique. Delectus dicta distinctio quibusdam velit veniam? Aperiam cum dignissimos doloremque officiis
                            quisquam velit!</textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>

            <div id="meta" class="tab-pane">
                <form action="">
                    <div class="form-group form-control-material">
                        <input type="text" name="title" id="title" placeholder="Course Title" class="form-control used" value="Basics of HTML" />
                        <label for="title">Meta</label>
                    </div>

                </form>
            </div>

            <div id="lessons" class="tab-pane">
                <form action="">
                    <div class="form-group form-control-material">
                        <input type="text" name="title" id="title" placeholder="Course Title" class="form-control used" value="Basics of HTML" />
                        <label for="title">Lessons</label>
                    </div>

                </form>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="text-right">
            <a href="#" class="btn btn-primary">Save</a>
            <a href="#" class="btn btn-primary">Show Course</a>
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

            $('#tabs').responsiveTabs('activate', 0);

            $('.nav-tabs li[data-item="course"]').on('click', function() {
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');
            });

            $('.nav-tabs li[data-item="meta"]').on('click', function() {
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');
            });

            $('.nav-tabs li[data-item="lessons"]').on('click', function() {
                $('.nav-tabs li').removeClass('active');
                $(this).addClass('active');
            });

            $('#title').on('keyup', function() {
                $('#slug').val(str_slug($(this).val()));
            });

        });
    </script>
@endsection