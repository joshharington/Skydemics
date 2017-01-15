@extends('index')

@section('site-title')
    {{ $lesson->name }} | {{ $module->name . ' - ' . $course->name }}
@endsection

@section('page-title')
    {{ $lesson->name }} <small>| {{ $module->name . ' - ' . $course->name }}</small>
@endsection

@section('custom-styles')
    <style>

    </style>
@endsection

@section('content')
    <div class="media media-grid media-clearfix-xs">
        <div class="media-body">

            <div class="page-section">
                <h2 class="text-headline margin-none">Lesson</h2>
                <div class="panel panel-body">
                    {!! $lesson->description !!}
                    <br/>
                    <p class="margin-none">
                        <span class="label bg-gray-dark">Tag 1</span>
                        <span class="label label-grey-200">Tag 2</span>
                        <span class="label label-grey-200">Tag 3</span>
                    </p>
                </div>
            </div>

            <div class="page-section">
                <h2 class="text-headline margin-none">Files</h2>
                <div class="panel panel-body">
                    {!! $lesson->description !!}
                    <br/>
                    <p class="margin-none">
                        <span class="label bg-gray-dark">Tag 1</span>
                        <span class="label label-grey-200">Tag 2</span>
                        <span class="label label-grey-200">Tag 3</span>
                    </p>
                </div>
            </div>

        </div>
        <div class="media-right">

            <div class="page-section width-270 width-auto-xs">

                <!-- .panel -->
                <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                    <div class="panel-heading">
                        <h4 class="text-headline">Course</h4>
                    </div>
                    <div class="panel-body">
                        <p class="text-caption margin-none">
                            <i class="fa fa-calendar fa-fw"></i> {{ ($course->start_date != '') ? date('d M Y', $course->start_date) : '' }} {{ ($course->start_date != '' && $course->end_date != '') ? '-' : '' }} {{ ($course->end_date != '') ? date('d M Y', $course->end_date) : '' }}
                            <br/>
                            <i class="fa fa-user fa-fw"></i> Instructor: {{ $course->lecturer->name }}
                            <br/>
                            <i class="fa fa-mortar-board fa-fw"></i> # Lessons: {{ $course->lessons->count() }}
                            <br/>
                            <i class="fa fa-check fa-fw"></i> Enrolled: 0
                        </p>
                    </div>
                    <hr class="margin-none" />
                    <div class="panel-body text-center">
                        <p><a class="btn btn-success btn-lg paper-shadow relative" data-z="1" data-hover-z="2" data-animated href="{{ route('student.courses.single.enroll', [$course->lecturer_id, $course->slug]) }}">Enroll</a></p>
                    </div>
                </div>
                <!-- // END .panel -->

                <!-- .panel -->
                <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                    <div class="panel-body">
                        <div class="media v-middle">
                            <div class="media-left">
                                <img src="/assets/images/people/110/guy-6.jpg" alt="About Adrian" width="60" class="img-circle" />
                            </div>
                            <div class="media-body">
                                <h4 class="text-title margin-none"><a href="#">{{ $course->lecturer->name }}</a></h4>
                                <span class="caption text-light">Biography</span>
                            </div>
                        </div>
                        <br/>
                        <div class="">
                            <div class="">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus aut consectetur consequatur cum cupiditate debitis doloribus, error ex explicabo harum illum minima mollitia nisi nostrum officiis omnis optio qui quisquam
                                    saepe sit sunt totam vel velit voluptatibus? Adipisci ducimus expedita id nostrum quas quia!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // END .panel -->


            </div>
            <!-- // END .page-section -->

        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>

    </script>
@endsection