@extends('products.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('products.index')}}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description" required>{{ $product->description }}</textarea>
                </div>
            </div>
            @foreach ($product->product_attributes as $attribute)
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Key:</strong>
                    <input type="text" name="key" value="{{ $attribute->key}}" class="form-control" placeholder="Key" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Value:</strong>
                    <input type="text" name="value" value="{{ $attribute->value}}" class="form-control" placeholder="Value" required>
                </div>
            </div>
            @endforeach
            <button type="create" class="btn btn-primary">Create attribute</button>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
