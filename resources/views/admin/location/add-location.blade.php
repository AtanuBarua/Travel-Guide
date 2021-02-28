@extends('admin.master')



@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h1 class="text-center text-success"> {{Session::get('message')}} </h1>
                <form action="{{route('new-location')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-3">Location name</label>
                        <div class="col-md-6">
                            <input type="text" name="location_name" class="form-control">
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
