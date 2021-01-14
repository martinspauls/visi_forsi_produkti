@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br><br>
                    {{ __('Product HTML pivot table using eloquent requests - > ') }}
                    <a class="btn btn-success" href="{{route('products.index')}}">Produkti</a> 
                    <br><br>
                    {{ __('All products in json - > ') }}
                    <a class="btn btn-info" href="{{route('json_all')}}">Produkti json formātā</a> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
