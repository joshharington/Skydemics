@extends('index')

@section('site-title')
    Disciplines | Admin
@endsection

@section('page-title')
    Disciplines | Admin <div class="pull-right"><a href="{{ route('admin.site.disciplines.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign"></span> Add Discipline</a></div>
@endsection

@section('custom-styles')

@endsection

@section('content')
    <div class="panel panel-default">

        <!-- Data table -->
        <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="col-md-4">Name</th>
                    <th class="col-md-2"># Lecturers</th>
                    <th class="col-md-2"># Courses</th>
                    <th class="col-md-2"># Students</th>
                    <th class="col-md-2">Manage</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="col-md-4">Name</th>
                    <th class="col-md-2"># Lecturers</th>
                    <th class="col-md-2"># Courses</th>
                    <th class="col-md-2"># Students</th>
                    <th class="col-md-2">Manage</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($disciplines as $discipline_id => $discipline)
                    <tr>
                        <td>
                            {{ $discipline->name }}
                            @if($discipline->parent)
                                <label class="badge">{{ $discipline->parent->name }}</label>
                            @endif
                        </td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.site.disciplines.edit', $discipline->id) }}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                                <a href="#" class="btn btn-xs btn-danger remove-discipline" data-itemid="{{ $discipline->id }}"><span class="glyphicon glyphicon-remove"></span> Delete</a>
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

        $(document).on('click', '.remove-discipline', function() {
            var r = confirm("Are you sure that you want to delete this discipline?");
            if (r == true) {
                window.location.href = '{{ route('admin.site.disciplines.delete', $discipline->id) }}';
            }
        });
    </script>
@endsection