@extends('layout.main')

@section('main_content')

    <h2>Create New Group</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
        </div>
        <div class="card-body my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{ url('groups') }}" method="POST" class="text-center">
                    @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="title" placeholder="Title">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection