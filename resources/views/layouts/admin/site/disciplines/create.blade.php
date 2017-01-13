@extends('index')

@section('site-title')
    Create Discipline | Admin
@endsection

@section('page-title')
    Create Discipline | Admin
@endsection

@section('custom-styles')
    <style>
        .bottomaligned {position:absolute; bottom:0;  margin-bottom:7px; left: 0;}
        .bottomright {position:absolute; bottom:0;  margin-bottom:7px; margin:7px; right: 0;}
        .bottomleft {position:absolute; bottom:0;  margin-bottom:7px; left: 100px;}
        .fixedheight { height: 200px;  width: 243px;  position:relative; border:1px solid;}
    </style>
@endsection

@section('content')
    <div class="tabbable paper-shadow relative" data-z="0.5" id="tabs">

        <!-- Panes -->
        <div class="tab-content">

            <div id="course" class="tab-pane active">
                <form action="{{ route('admin.site.disciplines.create') }}" method="POST" class="form-horizontal">
                    <div class="col-md-6">
                        <div class="form-group form-control-material">
                            <input type="text" name="discipline" id="discipline" placeholder="Discipline" class="form-control used" value="" />
                            <label for="discipline">Discipline</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group form-control-material">
                            <select name="parent" class="selectpicker" data-style="btn-white" data-live-search="true" data-size="5">
                                @foreach($disciplines as $discipline_id => $discipline)
                                    <option value="{{ $discipline_id }}">{{ $discipline }}</option>
                                @endforeach
                            </select>
                            <label for="parent">Parent</label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="text-right">
                            <br />
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </form>
            </div>

        </div>

        <div class="clearfix"></div>

        <!-- // END Panes -->

    </div>
@endsection

@section('custom-scripts')

@endsection