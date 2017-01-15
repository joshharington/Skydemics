@extends('index')

@section('site-title')
    Curriculum | {{ $course->name }}
@endsection

@section('page-title')
    Curriculum | {{ $course->name }}
@endsection

@section('custom-styles')
    <style>
        a.lesson-link:hover, a.lesson-link:hover .list-group-item.media {
            text-decoration: none;
            background-color: #f9f9f9;
        }
    </style>
@endsection

@section('content')
        <div class="col-md-9">
            <div class="page-section">
                <?php
                    $count = 1;
                    $lesson_count = 1;
                ?>
                @foreach($course->modules as $module)
                    <div class="panel panel-default curriculum open paper-shadow" data-z="0.5">
                        <div class="panel-heading panel-heading-gray">
                            <div class="media">
                                <div class="media-left">
                                    <span class="icon-block img-circle bg-blue-300 half text-white"><i class="fa fa-graduation-cap"></i></span>
                                </div>
                                <div class="media-body">
                                    <h4 class="text-headline">{{ ($module->name != '') ? $module->name : 'Module ' . $count++ }}</h4>
                                    <p>{!! $module->description !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="list-group collapse in" id="curriculum-1">
                            <?php $lesson_count = 1; ?>
                            @foreach($module->lessons as $lesson)
                                <a class="lesson-link" href="{{ route('student.courses.single.curriculum.lesson', [$course->lecturer_id, $course->slug, $module->slug, $lesson->slug]) }}">
                                    <div class="list-group-item media" data-target="app-take-course.html">
                                        <div class="media-left">
                                            <div class="text-crt">{{ $lesson_count++ }}.</div>
                                        </div>
                                        <div class="media-body">
                                            <i class="fa fa-fw fa-circle text-grey-300"></i> {{ $lesson->name }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">

            <div class="page-section width-auto-xs">

                <!-- .panel -->
                <div class="panel panel-default paper-shadow" data-z="0.5" data-hover-z="1" data-animated>
                    <div class="panel-heading">
                        <h4 class="text-headline">Course Information</h4>
                    </div>
                    <div class="panel-body">
                        <div data-scrollable>

                            <ul class="sidebar-menu sm-bordered sm-active-item-bg">
                                <li class="active"><a href="{{ route('student.courses.single.curriculum', [$lecturer->id, $course->slug]) }}">Curriculum</a></li>
                                <li><a href="app-course-forums.html">Go to Next Lesson</a></li>
                                <li><a href="app-quiz-results.html">Tests</a></li>
                                <li><a href="app-quiz-results.html">Test Results</a></li>
                            </ul>

                            <h4 class="category">Lecturer</h4>
                            <div class="sidebar-block">
                                <div class="media v-middle">
                                    <div class="media-left">
                                        <a href="" class="media-object">
                                            <img class="img-circle" src="/assets/images/people/50/guy-1.jpg" alt="people" />
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="sidebar-heading media-heading"><a href="">{{ $lecturer->name }}</a></h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr class="margin-none" />
                </div>
                <!-- // END .panel -->


            </div>
            <!-- // END .page-section -->

        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        $(function () {



        });
    </script>
@endsection