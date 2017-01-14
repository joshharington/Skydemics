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
                        <button data-moduleid="{{ $module->id }}" class="edit-module btn btn-default btn-xs"><span class="glyphicon glyphicon-cog"></span></button><br /><br />
                        <button data-moduleid="{{ $module->id }}" class="remove-module btn btn-danger btn-xs hidden"><span class="glyphicon glyphicon-remove"></span></button>
                    </div>
                    <div class="media-body">
                        <h4 class="text-headline module-header" data-moduleid="{{ $module->id }}">{{ ($module->name != '') ? $module->name : 'Module ' . $count++ }}</h4>
                        <p class="module-description" data-moduleid="{{ $module->id }}">{{ ($module->description != '') ? $module->description : 'Click on the settings button next to the title to enter or exit edit mode for this module' }}</p>
                    </div>
                </div>
            </div>
            <div class="list-group collapse in sortable" id="module-{{ $module->id }}">
                @foreach($module->lessons as $lesson)
                    <div class="list-group-item media ui-state-default" id="lesson-{{ $lesson->id }}">
                        <div class="media-left">
                            <div class="text-crt"><span class="glyphicon glyphicon-move"></span></div>
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
                                <a href="#" class="btn btn-xs btn-danger remove-lesson hidden" data-moduleid="1"><span class="glyphicon glyphicon-remove"></span> Delete</a>
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
        var module_title = false;
        var module_content = false;

        $( ".sortable" ).sortable({
            stop : function(event, ui) {
                var serialized = JSON.stringify($(this).sortable('serialize'));
                serialized = serialized.replace(/lesson\[]=/g, '');
                var arr = serialized.split('&');

                $.ajax({
                    url: '{{ route('api.builders.lessons.modules.update.order') }}',
                    type: 'POST',
                    data: {order: serialized},
                    success: function(res) {
                        console.log('res:', res);
                    },
                    error: function(res) {
                        console.log('error res:', res);
                    }
                });
            }
        });
        $( ".sortable" ).disableSelection();

        $(document).on('click', '.remove-lesson', function() {
            var item_id = $(this).data('itemid');
            var r = confirm("Are you sure that you want to delete this lesson?");
            if (r == true) {
                var url = '{{ route('lecturer.courses.delete', '--id--') }}';
                url = url.replace('--id--', item_id);
                window.location.href =  url;
            }
        });

        $(document).on('click', '.remove-module', function() {
            var item_id = $(this).data('moduleid');
            var r = confirm("Are you sure that you want to delete this module?");
            if (r == true) {
                var url = '{{ route('lecturer.courses.modules.delete', [$course->id, '--id--']) }}';
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

                        var url = '{{ route('courses.builder.lessons.create', [$course->id, '--module_id--']) }}';
                        url = url.replace('--module_id--', res.data.id);
                        $('.btn-add-lesson[data-moduleid="' + res.data.id + '"]').attr('href', url).removeAttr('disabled');
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

            var $header=$('.module-header[data-moduleid="' + module_id + '"]'), isHeaderEditable=$header.is('.editable');
            var $desc=$('.module-description[data-moduleid="' + module_id + '"]'), isContentEditable=$desc.is('.editable');

            if((module_title != false && module_title != $('.module-header[data-moduleid="' + module_id + '"]').text()) || module_content != false && module_content != $('.module-description[data-moduleid="' + module_id + '"]').text()) {
                var url = '{{ route('api.builders.lessons.modules.update', '--module_id--') }}';
                url = url.replace('--module_id--', module_id);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {module_id: module_id, course_id: course_id, title: $('.module-header[data-moduleid="' + module_id + '"]').text(), module_content: $('.module-description[data-moduleid="' + module_id + '"]').text()},
                    success: function(res) {
                        console.log('success res', res);
                    },
                    error: function(res) {
                        console.log('error res', res);
                    }
                });
            } else {
                module_title = $('.module-header[data-moduleid="' + module_id + '"]').text();
                module_content = $('.module-description[data-moduleid="' + module_id + '"]').text();
            }

            $header.prop('contenteditable',!isHeaderEditable).toggleClass('editable');
            $desc.prop('contenteditable',!isContentEditable).toggleClass('editable');

            $('.remove-lesson[data-moduleid="' + module_id + '"]').toggleClass('hidden');
            $('.remove-module[data-moduleid="' + module_id + '"]').toggleClass('hidden');
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
                '<h4 class="text-headline module-header" data-moduleid="' + guid + '">Module ' + module_count +
                '</h4> ' +
                '<p class="module-description" data-moduleid="' + guid + '">Click on the settings button next to the title to enter or exit edit mode for this module</p> ' +
                '</div> ' +
                '</div> ' +
                '<span class="collapse-status collapse-open">Open</span> ' +
                '<span class="collapse-status collapse-close">Close</span> ' +
                '</div>' +
                '<div class="lessons-div list-group collapse in" id="' + guid + '" data-moduleid="' + guid + '">' +
                '<div class="list-group-item media"> ' +
                '<a class="btn btn-default btn-block btn-add-lesson" href="#" data-moduleid="' + guid + '" data-courseid="' + course_id + '" disabled><span class="glyphicon glyphicon-plus"></span></a>'
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