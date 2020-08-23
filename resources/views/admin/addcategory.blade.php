@extends('layouts.app-admin')

@section('title')
    Create Category
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Category</h4>
            {!! Form::open(['class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm']) !!}
              @csrf
              <div class="form-group">
                {{ Form::label('', 'Product Category', ['for' => 'category_name']) }}
                {{ Form::text('category_name', old('category_name'), ['class' => 'form-control', 'minlength' => '2', 'id' => 'cname']) }}
              </div>
              {{ Form::submit('Add Category', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  @endsection