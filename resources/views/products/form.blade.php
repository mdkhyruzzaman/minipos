@extends('layout.main')

@section('main_content')

    @if ($errors->any())
        <div class="alert alert-danger pb-0">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>{{ $headline }}</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $headline }}</h6>
        </div>
        <div class="card-body my-3">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    @if($mode == 'edit')
                        {!! Form::model($product,[ 'route'=>['products.update', $product->id], 'method'=>'put' ]) !!}
                    @else
                        {!! Form::open([ 'route'=>'products.store', 'method'=>'post' ]) !!}
                    @endif

                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label text-right"> Title <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                {{ Form::text('title', NULL, ['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Title']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label text-right"> Description <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description', NULL, ['class'=>'form-control', 'id'=>'description', 'placeholder'=>'Description']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category_id" class="col-sm-2 col-form-label text-right"> Category <span class="text-danger">*</span> </label>
                            <div class="col-sm-10">
                                {{ Form::select('category_id', $categories, NULL, ['class'=>'form-control', 'id'=>'category_id', 'placeholder'=>'Select Category']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cost_price" class="col-sm-2 col-form-label text-right">Cost Price</label>
                            <div class="col-sm-10">
                                {{ Form::text('cost_price', NULL, ['class'=>'form-control', 'id'=>'cost_price', 'placeholder'=>'Cost Price']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label text-right">Price</label>
                            <div class="col-sm-10">
                                {{ Form::text('price', NULL, ['class'=>'form-control', 'id'=>'price', 'placeholder'=>'Price']) }}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label text-right"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection