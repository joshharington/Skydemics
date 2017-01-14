@extends('index')

@section('site-title')
    Course Lessons | Lecturer
@endsection

@section('page-title')
    Course Lessons | Lecturer
@endsection

@section('custom-styles')
    <style>
        .files-center {
            align-content: center;
        }

        .editable{ background:#EAEAEA}
    </style>
@endsection

@section('content')
    <div class="panel panel-default">
        <div class="col-md-12">
            <h3>{{ $course->name }}</h3><br />

            <p class="text-muted">{{ ($course->start_date != '') ? date('M D Y', $course->start_date) : '' }} {{ ($course->start_date != '' && $course->end_date != '') ? '-' : '' }} {{ ($course->end_date != '') ? date('M D Y', $course->end_date) : '' }}</p>
        </div>

        <div class="clearfix"></div>

        <div class="col-md-12">
            <h3>Course Files</h3>

            <ul class="list-inline">
                <li>
                    <a href="#">
                        <span class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of file">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <br />
                        Name of file
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of file">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <br />
                        Name of file
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of file">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <br />
                        Name of file
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="btn btn-default text-grey-400 btn-lg btn-circle paper-shadow relative" data-hover-z="0.5" data-animated data-toggle="tooltip" data-title="Name of file">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <br />
                        Name of file
                    </a>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
    <?php
        $count = 1;
        $lesson_count = 1;
    ?>
    @foreach($course->modules as $module)
        <div class="panel panel-default curriculum open paper-shadow" data-z="0.5">
            <div class="panel-heading panel-heading-gray" data-toggle="collapse" data-target="#module-{{ $module->id }}">
                <div class="media">
                    <div class="media-left">
                        <button data-moduleid="{{ $module->id }}" class="edit-module btn btn-default btn-xs"><span class="glyphicon glyphicon-cog"></span></button>
                    </div>
                    <div class="media-body">
                        <h4 class="text-headline module-header" data-moduleid="{{ $module->id }}">{{ ($module->name != '') ? $module->name : 'Chapter ' . $count++ }}</h4>
                        <p class="module-description" data-moduleid="1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cumque minima nemo repudiandae rerum! Aspernatur at, autem expedita id illum laudantium molestias officiis quaerat, rem sapiente sint totam velit. Enim.</p>
                    </div>
                </div>
                <span class="collapse-status collapse-open">Open</span>
                <span class="collapse-status collapse-close">Close</span>
            </div>
            <div class="list-group collapse in" id="module-{{ $module->id }}">
                @foreach($module->lessons as $lesson)
                    <div class="list-group-item media" data-target="app-take-course.html">
                        <div class="media-left">
                            <div class="text-crt">{{ $lesson_count++ }}.</div>
                        </div>
                        <div class="media-body">
                            <i class="fa fa-fw fa-circle {{ ($lesson->published == 1) ? 'text-green-300' : 'text-blue-300' }}"></i> {{ $lesson->name }}<!-- <br />

                            Enrolled: 3500<br />
                            Completed: 3024<br />
                            Started: 1000 -->
                        </div>
                        <div class="pull-right">
                            <div class="btn-group">
                                <a href="{{ route('courses.builder.lessons.single', [$course->id, $lesson->id]) }}" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="list-group-item media">
                    <a class="btn btn-default btn-block" href="{{ route('courses.builder.lessons.create', [$course->id, $module->id]) }}" data-moduleid="{{ $module->id }}" data-courseid="{{ $course->id }}"><span class="glyphicon glyphicon-plus"></span></a>
                </div>
            </div>
        </div>
    @endforeach

    <!-- <div class="panel panel-default curriculum open paper-shadow" data-z="0.5">
        <div class="panel-heading panel-heading-gray" data-toggle="collapse" data-target="#curriculum-1">
            <div class="media">
                <div class="media-left">
                    <span class="icon-block img-circle bg-indigo-300 half text-white"><i class="fa fa-graduation-cap"></i></span>
                </div>
                <div class="media-body">
                    <h4 class="text-headline module-header" data-moduleid="1">Chapter 1 <button data-moduleid="1" class="edit-module btn btn-default btn-xs"><span class="glyphicon glyphicon-cog"></span></button></h4>
                    <p class="module-description" data-moduleid="1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cumque minima nemo repudiandae rerum! Aspernatur at, autem expedita id illum laudantium molestias officiis quaerat, rem sapiente sint totam velit. Enim.</p>
                </div>
            </div>
            <span class="collapse-status collapse-open">Open</span>
            <span class="collapse-status collapse-close">Close</span>
        </div>
        <div class="list-group collapse in" id="curriculum-1">
            <div class="list-group-item media" data-target="app-take-course.html">
                <div class="media-left">
                    <div class="text-crt">1.</div>
                </div>
                <div class="media-body">
                    <i class="fa fa-fw fa-circle text-green-300"></i> Installation<br />

                    Enrolled: 3500<br />
                    Completed: 3024<br />
                    Started: 1000

                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="{ route('courses.builder.lessons.create', [$course->id, 1]) }}" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </div>
                </div>
            </div>
            <div class="list-group-item media" data-target="app-take-course.html">
                <div class="media-left">
                    <div class="text-crt">2.</div>
                </div>
                <div class="media-body">
                    <i class="fa fa-fw fa-circle text-blue-300"></i> The MVC architectural pattern
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </div>
                </div>
            </div>
            <div class="list-group-item media" data-target="app-take-course.html">
                <div class="media-left">
                    <div class="text-crt">3.</div>
                </div>
                <div class="media-body">
                    <i class="fa fa-fw fa-circle text-grey-200"></i> Database Models
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </div>
                </div>
            </div>
            <div class="list-group-item media" data-target="app-take-course.html">
                <div class="media-left">
                    <div class="text-crt">4.</div>
                </div>
                <div class="media-body">
                    <i class="fa fa-fw fa-circle text-grey-200"></i> Database Access
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </div>
                </div>
            </div>
            <div class="list-group-item media" data-target="app-take-course.html">
                <div class="media-left">
                    <div class="text-crt">5.</div>
                </div>
                <div class="media-body">
                    <i class="fa fa-fw fa-circle text-grey-200"></i> Eloquent Basics
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </div>
                </div>
            </div>
            <div class="list-group-item media" data-target="app-take-quiz.html">
                <div class="media-left">
                    <div class="text-crt">6.</div>
                </div>
                <div class="media-body">
                    <i class="fa fa-fw fa-circle text-grey-200"></i> Take Quiz
                </div>
                <div class="pull-right">
                    <div class="btn-group">
                        <a href="#" class="btn btn-xs btn-info" data-moduleid="1"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                        <a href="#" class="btn btn-xs btn-danger remove-course hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                    </div>
                </div>
            </div>
            <div class="list-group-item media">
                <button class="btn btn-default btn-block" type="button"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        </div>
    </div> -->

    <div id="add-module" class="panel panel-default curriculum open paper-shadow" data-z="0.5">
        <button class="btn btn-block btn-default" type="button" id="btn-add-module"><span class="glyphicon glyphicon-plus"></span></button>
    </div>
@endsection

@section('custom-scripts')
    <script src="/assets/js/vendor/tables/dataTables.bootstrap.js"></script>
    <script>
        $('.table').dataTable();

        var module_count = '{{ $course->modules->count() }}';
        var course_id = '{{ $course->id }}';
        console.log('module_count', module_count);

        $(document).on('click', '.remove-course', function() {
            var item_id = $(this).data('itemid');
            var r = confirm("Are you sure that you want to delete this course?");
            if (r == true) {
                var url = '{{ route('lecturer.courses.delete', '--id--') }}';
                url = url.replace('--id--', item_id);
                window.location.href =  url;
            }
        });

        $(document).on('click', '#btn-add-module', function() {
            module_count++;
            var guid = render_module();

            $.ajax({
                url: '{{ route('api.builders.lessons.modules.create') }}',
                type: 'POST',
                data: {guid: guid, course_id: course_id},
                success: function(res) {
                    console.log('success res', res);
                    if(res.hasOwnProperty('data') && res.data.hasOwnProperty('id')) {
                        $('[data-moduleid="' + guid + '"]').attr('data-moduleid', res.data.id);
                    }
                },
                error: function(res) {
                    console.log('error res', res);
                }
            });
        });

        $(document).on('click', '.edit-module', function(event) {
            event.stopPropagation();
            var module_id = $(this).data('moduleid');

            var $header=$('.module-header[data-moduleid="' + module_id + '"]'), isEditable=$header.is('.editable');
            $header.prop('contenteditable',!isEditable).toggleClass('editable');

            var $desc=$('.module-description[data-moduleid="' + module_id + '"]'), isEditable=$desc.is('.editable');
            $desc.prop('contenteditable',!isEditable).toggleClass('editable');

            $('.remove-course[data-moduleid="' + module_id + '"]').toggleClass('hidden');
        });

        function render_module() {
            var guid = guidGenerator();

            var html = '<div class="panel panel-default curriculum open paper-shadow" data-z="0.5" data-moduleid="' + guid + '">' +
                '<div class="panel-heading panel-heading-gray" data-toggle="collapse" data-target="#' + guid + '"> ' +
                '<div class="media"> ' +
                '<div class="media-left"> ' +
                '<button data-moduleid="' + guid + '" class="edit-module btn btn-default btn-xs">' +
                '<span class="glyphicon glyphicon-cog"></span>' +
                '</button>' +
                '</div> ' +
                '<div class="media-body"> ' +
                '<h4 class="text-headline module-header" data-moduleid="' + guid + '">Chapter ' + module_count +
                '</h4> ' +
                '<p class="module-description" data-moduleid="' + guid + '">Click on the settings button next to the title to enter or exit edit mode for this module</p> ' +
                '</div> ' +
                '</div> ' +
                '<span class="collapse-status collapse-open">Open</span> ' +
                '<span class="collapse-status collapse-close">Close</span> ' +
                '</div>' +
                '<div class="lessons-div list-group collapse in" id="' + guid + '" data-moduleid="' + guid + '">' +
                '<div class="list-group-item media"> ' +
                '<button class="btn btn-default btn-block" type="button" moduleid="' + guid + '">' +
                '<span class="glyphicon glyphicon-plus"></span>' +
                '</button> ' +
                '</div>' +
                '</div>' +
                '</div>';

            $(html).insertBefore('#add-module');

            return guid;
        }

        function guidGenerator() {
            var S4 = function() {
                return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
            };
            return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
        }
    </script>
@endsection