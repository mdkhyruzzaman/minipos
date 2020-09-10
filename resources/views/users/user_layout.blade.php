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

            <a href="{{ route('users.create') }}" class="btn btn-primary"> <i class="fas fa-plus"></i> New Receipt </a>
        </div>
    </div>

    <div class="row mt-5">
    <div class="col-2">
        <div class="nav flex-column nav-pills">
            <a href="{{ route('users.show', $user->id) }}" class="nav-link @if($tab_manu == 'user_info') active @endif ">User Info</a>
            <a href="{{ route('users.sales', $user->id) }}" class="nav-link @if($tab_manu == 'sales') active @endif ">Sales</a>
            <a href="{{ route('users.purchases', $user->id) }}" class="nav-link @if($tab_manu == 'purchases') active @endif ">Purchases</a>
            <a href="{{ route('users.payments', $user->id) }}" class="nav-link @if($tab_manu == 'payments') active @endif ">Payments</a>
            <a href="#" class="nav-link">Receipts</a>
        </div>
    </div>
    <div class="col-10">

        @yield('user_content')

    </div>

@endsection