@extends('users.user_layout')

@section('user_content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Payments of <strong> {{ $user->name }} </strong> </h6>
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
                                <th> {{ $user->payments()->sum('amount') }} Taka </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user->payments as $payment)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $payment->date }}</td>
                                <td>{{ $payment->amount }} Taka </td>
                                <td>{{ $payment->note }}</td>
                                <td class="text-right">
                                    <form action="{{ route('users.payments.destroy', ['user_id'=>$user->id, 'payment_id'=>$payment->id]) }}" method="POST">
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



    {{-- Model for a new payment --}}

    <div class="modal fade" id="newPayment" tabindex="-1" aria-labelledby="newPaymentLabel" aria-hidden="true">
        <div class="modal-dialog">

            {!! Form::open([ 'route'=>['users.payments.store', $user->id], 'method'=>'post' ]) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label"> Date <span class="text-danger">*</span> </label>
                        <div class="col-sm-9">
                            {{ Form::date('date', NULL, ['class'=>'form-control', 'id'=>'date', 'placeholder'=>'Date', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="amount" class="col-sm-3 col-form-label"> Amount <span class="text-danger">*</span> </label>
                        <div class="col-sm-9">
                            {{ Form::text('amount', NULL, ['class'=>'form-control', 'id'=>'amount', 'placeholder'=>'Amount', 'required']) }}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="note" class="col-sm-3 col-form-label"> Note </label>
                        <div class="col-sm-9">
                            {{ Form::textarea('note', NULL, ['class'=>'form-control', 'id'=>'note', 'placeholder'=>'Note', 'rows'=>'']) }}
                        </div>
                    </div>
                
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> <i class="fas fa-save"></i> Save </button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection