@extends('layout.main')

@section('main_content')

    <div class="row clearfix mb-3">
        <div class="col-md-6">
            <h2> User Groups </h2>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ url('groups/create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Group</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTable</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($groups as $group)
                    <tr>
                        <td>{{ $group->id }}</td>
                        <td>{{ $group->title }}</td>
                        <td class="text-right">
                            <form action="{{ url('groups/'.$group->id) }}" method="POST">
                            
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"> <i class="far fa-trash-alt"></i> </button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection