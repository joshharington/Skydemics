@extends('index')

@section('site-title')
    Courses
@endsection

@section('page-title')
    Courses
@endsection

@section('custom-styles')
    <style>
        .item .panel-body.content {
            min-height: 122px;
        }
    </style>
@endsection

@section('content')
    <div class="row" data-toggle="isotope">

        @foreach($courses as $course)
            <div class="item col-xs-12 col-sm-6 col-lg-4">
                <div class="panel panel-default paper-shadow" data-z="0.5">

                    <div class="panel-body">
                        <h4 class="text-headline margin-v-0-10"><a href="{{ route('student.courses.single', [$course->lecturer_id, $course->slug]) }}">{{ $course->name }}</a></h4>

                        <p class="small margin-none">
                            <a href="#"><span class="fa fa-fw fa-graduation-cap"></span> Enroll Now</a>
                        </p>

                    </div>
                    <hr class="margin-none" />
                    <div class="panel-body content">

                        <p>{{ substr(strip_tags($course->description), 0, 100) }}</p>

                        <div class="media v-middle">
                            <div class="media-left">
                                <img src="/assets/images/people/50/guy-4.jpg" alt="People" class="img-circle width-40" />
                            </div>
                            <div class="media-body">
                                <h4><a href="">{{ $course->lecturer->name }}</a>
                                    <br/>
                                </h4>
                                Instructor
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach

    </div>

    <ul class="pagination margin-top-none">
        <li class="disabled"><a href="#">&laquo;</a></li>
        <li class="active"><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">&raquo;</a></li>
    </ul>
@endsection

@section('custom-scripts')
    <script>

    </script>
@endsection