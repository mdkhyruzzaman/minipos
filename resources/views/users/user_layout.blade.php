@extends('layout.main')

@section('main_content')

    <div class="row clearfix mb-3">
        <div class="col-md-3">
        <a href="{{ route('users.index') }}" class="btn btn-primary"> <i class="fas fa-arrow-left"></i> Back </a>
        </div>
        <div class="col-md-9 text-md-right">
            <a href="{{ route('users.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> New Sale </a>
            <a href="{{ route('users.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> New Purchases </a>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newPayment">
                <i class="fas fa-plus"></i> New Payment 
            </button>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newReceipt">
                <i class="fas fa-plus"></i> New Receipt 
            </button>
        </div>
    </div>

    <div class="row mt-5">
    <div class="col-2">
        <div class="nav flex-column nav-pills">
            <a href="{{ route('users.show', $user->id) }}" class="nav-link @if($tab_manu == 'user_info') active @endif "> User Info </a>
            <a href="{{ route('users.sales', $user->id) }}" class="nav-link @if($tab_manu == 'sales') active @endif "> Sales </a>
            <a href="{{ route('users.purchases', $user->id) }}" class="nav-link @if($tab_manu == 'purchases') active @endif "> Purchases </a>
            <a href="{{ route('users.payments', $user->id) }}" class="nav-link @if($tab_manu == 'payments') active @endif "> Payments </a>
            <a href="{{ route('users.receipts', $user->id) }}" class="nav-link @if($tab_manu == 'receipts') active @endif "> Receipts </a>
        </div>
    </div>
    <div class="col-10">

        @yield('user_content')

    </div>

    {{-- Model for a new payment --}}

    <div class="modal fade" id="newPayment" tabindex="-1" aria-labelledby="newPaymentLabel" aria-hidden="true">
        <div class="modal-dialog">

            {!! Form::open([ 'route'=>['users.payments.store', $user->id], 'method'=>'post' ]) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentLabel"> New Payment </h5>
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


    {{-- Model for a new receipt --}}

    <div class="modal fade" id="newReceipt" tabindex="-1" aria-labelledby="newReceiptLabel" aria-hidden="true">
        <div class="modal-dialog">

            {!! Form::open([ 'route'=>['users.receipts.store', $user->id], 'method'=>'post' ]) !!}

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newReceiptLabel"> New Receipt </h5>
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

@stop