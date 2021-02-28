@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h1 class="text-center text-success"> {{Session::get('message')}} </h1>
                <form action="{{route('new-cost')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">From/To Location</label>
                        <div class="col-md-6">
                            <select name="from_location" class="form-control">
                                @foreach($locations as $location)
                                    <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">From/To Location</label>
                        <div class="col-md-6">
                            <select name="to_location" class="form-control">
                                @foreach($locations as $location)
                                    <option value="{{ $location->location_name }}">{{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Ticket Cost</label>
                        <div class="col-md-6">
                            <input type="text" name="ticket_cost">

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" >
                            <input type="submit" class="btn btn-success btn-block" value="save">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
