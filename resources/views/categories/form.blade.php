@extends('layout.main')

@section('main_content')

    <h2> {{ $headline }} </h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
        </div>
        <div class="card-body my-5">
            <div class="row justify-content-center">
                <div class="col-md-6">

                    @if($mode == 'edit')
                        {!! Form::model($category, ['route'=>['categories.update', $category->id], 'method' => 'put', 'class' => 'text-center']) !!}
                    @else
                        {!! Form::open(['route'=>'categories.store', 'method' => 'post', 'class' => 'text-center']) !!}
                    @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            {{ Form::text('title', NULL, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Title']) }}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection