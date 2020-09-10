@extends('layout.main')

@section('main_content')

    <div class="row clearfix mb-3">
        <div class="col-md-6">
            <h2> Products </h2>
        </div>
        <div class="col-md-6 text-md-right">
            <a href="{{ route('products.create') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Product</a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> ID </th>
                        <th> Catrgory </th>
                        <th> Title </th>
                        <th> Cost Price </th>
                        <th> Sale Price </th>
                        <th class="text-right">Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Catrgory</th>
                        <th>Title</th>
                        <th>Cost Price</th>
                        <th>Price</th>
                        <th class="text-right">Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->title }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->cost_price }}</td>
                            <td>{{ $product->price }}</td>
                            <td class="text-right">
                                <form action="{{ route('products.destroy', ['product'=>$product->id]) }}" method="POST">

                                    <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-info btn-sm" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('products.edit',['product'=>$product->id]) }}" class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Delete"><i class="far fa-trash-alt"></i></button>

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