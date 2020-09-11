@extends('users.user_layout')

@section('user_content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Receipts of <strong> {{ $user->name }} </strong> </h6>
        </div>
        <div class="card-body my-3 mb-5">
            <div class="row justify-content-center">
                <div class="table-responsive col-md-12">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th> User </th>
                                <th> Date </th>
                                <th> Amount </th>
                                <th> Note </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th colspan='2' class="text-right"> Total : </th>
                                <th> {{ $user->receipts()->sum('amount') }} Taka </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user->receipts as $receipt)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $receipt->date }}</td>
                                <td>{{ $receipt->amount }} Taka </td>
                                <td>{{ $receipt->note }}</td>
                                <td class="text-right">
                                    <form action="{{ route('users.receipts.destroy', ['id'=>$user->id, 'receipt_id'=>$receipt->id]) }}" method="POST">
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
    </div>

@stop