@extends('index')

@section('site-title')
    Course Lessons | Lecturer
@endsection

@section('page-title')
    Course Lessons | Lecturer
@endsection

@section('custom-styles')

@endsection

@section('content')
    <div class="panel panel-default">

        <!-- Data table -->
        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="col-md-3">Title</th>
                <th class="col-md-2">Discipline</th>
                <th class="col-md-2"># Lessons</th>
                <th class="col-md-2"># Students</th>
                <th class="col-md-1">Published</th>
                <th class="col-md-2">Manage</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th class="col-md-3">Title</th>
                <th class="col-md-2">Discipline</th>
                <th class="col-md-2"># Lessons</th>
                <th class="col-md-2"># Students</th>
                <th class="col-md-1">Published</th>
                <th class="col-md-2">Manage</th>
            </tr>
            </tfoot>
            <tbody>
            @foreach($courses as $course_id => $course)
                <tr>
                    <td>
                        {{ $course->name }}
                    </td>
                    <td>
                        @if($course->discipline)
                            {{ $course->discipline->name }}
                        @endif
                    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{ ($course->published == 1) ? 'Yes' : 'No' }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('courses.builder.single', $course->id) }}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                            <a href="#" class="btn btn-xs btn-danger remove-course" data-itemid="{{ $course->id }}"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- // Data table -->
    </div>
@endsection

@section('custom-scripts')
    <script src="/assets/js/vendor/tables/dataTables.bootstrap.js"></script>
    <script>
        $('.table').dataTable();

        $(document).on('click', '.remove-course', function() {
            var item_id = $(this).data('itemid');
            var r = confirm("Are you sure that you want to delete this course?");
            if (r == true) {
                var url = '{{ route('lecturer.courses.delete', '--id--') }}';
                url = url.replace('--id--', item_id);
                window.location.href =  url;
            }
        });
    </script>
@endsection