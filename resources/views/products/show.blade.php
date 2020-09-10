@extends('layout.main')

@section('main_content')

    <div class="row clearfix mb-3">
        <div class="col-md-12">
            <a href="{{ route('products.index') }}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Back </a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <strong> {{ $product->title }} </strong> Information</h6>
        </div>
        <div class="card-body my-3 mb-5">
            <div class="row justify-content-center">
                <div class="table-responsive col-md-10">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th class="text-right col-2">Category :</th>
                            <td>{{ $product->category->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Title :</th>
                            <td>{{ $product->title }}</td>
                        </tr>
                        <tr>
                            <th class="text-right"> Description : </th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Cost Price :</th>
                            <td>{{ $product->cost_price }}</td>
                        </tr>
                        <tr>
                            <th class="text-right">Sale Price :</th>
                            <td>{{ $product->price }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection