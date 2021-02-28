@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h1 class="text-center text-success"> {{Session::get('message')}} </h1>
                <form action="{{route('update-location')}}" name="editCostForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" class="form-control" value="{{$cost->id}}">

                    <div class="form-group">
                        <label class="control-label col-md-3">From/To Location</label>
                        <div class="col-md-6">
                            <select name="from_location_id" class="form-control">
                                @foreach($locations as $location)
                                    <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">From/To Location</label>
                        <div class="col-md-6">
                            <select name="to_location_id" class="form-control">
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Ticket Cost</label>
                        <div class="col-md-6">
                            <input type="text" name="ticket_cost" value="{{$cost->ticket_cost}}">

                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" >
                            <input type="submit" class="btn btn-success btn-block" value="update">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        document.forms['editCostForm'].elements['from_location'].value = '{{ $cost->from_location }}'
        document.forms['editCostForm'].elements['to_location'].value = '{{ $cost->to_location }}'
    </script>
@endsection
