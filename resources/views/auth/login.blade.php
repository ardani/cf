@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-2">
                    <div class="card-block">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <div class="input-group mb-1 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" name="email" placeholder="email" value="{{ old('email') }}" required autofocus>
                            {{ csrf_field() }}
                        </div>
                        <div class="input-group mb-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="icon-lock"></i>
                            </span>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-12">
                                    @if ($errors->has('email'))
                                        <span class="help-block text-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                        @if ($errors->has('password'))
                                            <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                        @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card card-inverse card-primary py-3 hidden-md-down" style="width:44%">
                    <div class="card-block text-center">
                        <div>
                            <p>certainly factor</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
