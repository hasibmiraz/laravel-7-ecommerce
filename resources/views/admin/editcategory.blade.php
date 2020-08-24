@extends('layouts.app-admin')

@section('title')
    Edit Category
@endsection

@section('content')

@if (session()->has('status'))
  <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
    <span>{{ session()->get('status') }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>            
  </div>
@endif

<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Category</h4>
            {!! Form::open(['route' => ['category.update', $category->id], 'class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm']) !!}
              @csrf
              <div class="form-group">
                {{ Form::label('', 'Product Category', ['for' => 'category_name']) }}
                {{ Form::text('category_name', $category->category_name, ['class' => 'form-control', 'minlength' => '3', 'id' => 'cname']) }}
              </div>
              {{ Form::submit('Update Category', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  @endsection

  @section('scripts')
    <script src="{{ asset('backend/js/bt-maxLength.js') }}"></script>
  @endsection