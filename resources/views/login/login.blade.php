@extends('layout.page_body')

@section('page_body')

<div class="bg-gradient-primary">
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center align-content-center" style="height:100vh">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Log In</h1>

                        @if ($errors->any())
                          <div class="alert alert-danger pb-0">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                        @elseif(session('message'))
                          <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                          </div>
                        @endif
                        
                    </div>
                    {!! Form::open(['route'=>'login.confirm', 'method'=>'post', 'class'=>'user']) !!}
                        <div class="form-group">
                            {{ Form::email('email', NULL, ['class'=>'form-control form-control-user', 'placeholder'=>'Enter Email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class'=>'form-control form-control-user', 'placeholder'=>'Enter Password']) }}
                        </div>
                        <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    {!! Form::close() !!}
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>

@endsection