@extends ('admin.master')


@section('body')

    <!-- Begin Page Content -->
    {{--<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Costs</h6>
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>From/To Location</th>
                        <th>From/To Location</th>
                        <th>Ticket Cost</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>From/To Location</th>
                        <th>From/To Location</th>
                        <th>Ticket Cost</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($costs as $cost)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$cost->from_location}}</td>
                            <td>{{$cost->to_location}}</td>
                            <td>{{$cost->ticket_cost}}</td>
                            <td>
                                <a href="{{route('edit-cost',['id'=>$cost->id])}}" class="btn btn-success">Edit</a>
                                <a href="#" id="{{$cost->id}}" class="btn btn-danger"
                                   onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteCostForm'+'{{$cost->id}}').submit();
                                       }"
                                >Delete</a>
                                <form id="deleteCostForm{{$cost->id}}" action="{{route('delete-cost')}}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$cost->id}}">
                                </form>

                                {{--<a href="#"
                                   class="btn btn-danger ml-1"
                                   onclick="event.preventDefault(); document.getElementById('deleteCategoryForm').submit();">Delete</a>

                                <form id="deleteCategoryForm" action="{{route('delete-category')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$category->id}}" name="id">
                                </form>--}}

                                {{--<form id="deleteCategoryForm" action="{{route('delete-category')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    <button type="submit" class="btn btn-danger ml-1">Delete</button>
                                </form>--}}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--</div>--}}
    <!-- /.container-fluid -->

@endsection
