@extends('layouts.app-admin')

@section('title')
    Create Product
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Product</h4>
            {!! Form::open(['class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data']) !!}
              @csrf

              <div class="form-group">
                {{ Form::label('', 'Product Name', ['for' => 'product_name']) }}
                {{ Form::text('product_name', old('product_name'), ['class' => 'form-control', 'id' => 'cname']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Product Price', ['for' => 'product_price']) }}
                {{ Form::number('product_price', old('product_price'), ['class' => 'form-control', 'id' => 'cname', 'minlength' => '2']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Product Category', ['for' => 'product_category']) }}
                {{ Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['class' => 'form-control', 'placeholder' => 'Select Category']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Product Image', ['for' => 'product_image']) }}
                {{ Form::file('product_image', ['class' => 'form-control', 'id' => 'cname']) }}
              </div>

              <div class="form-group">
                  {{ Form::checkbox('product_status', '', 'false') }}
                  {{ Form::label('', 'Product Status', ['for' => 'product_status', 'class' => 'form-check-label', 'style' => 'margin-top: -4px; margin-left:3px']) }}
              </div>

              {{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  @endsection

  
  @section('scripts')
    <script src="{{ asset('backend/js/form-validation.js') }}"></script>
    <script src="{{ asset('backend/js/bt-maxLength.js') }}"></script>
  @endsection