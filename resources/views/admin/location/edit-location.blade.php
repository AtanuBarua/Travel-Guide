@extends('admin.master')

@section('title')
    Edit Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h1 class="text-center text-success"> {{Session::get('message')}} </h1>
                <form action="{{route('update-location')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf




                    <div class="form-group">
                        <label class="control-label col-md-3">Location Name</label>
                        <div class="col-md-6">
                            <textarea name="location_name" class="form-control">{{$location->location_name}}</textarea>
                            <input type="hidden" name="id" class="form-control" value="{{$location->id}}">

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

@endsection
