@extends('layouts.app-admin')

@section('title')
    Create Slider
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Create Slider</h4>
            {!! Form::open(['class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data']) !!}
              @csrf

              <div class="form-group">
                {{ Form::label('', 'Description One', ['for' => 'description_one']) }}
                {{ Form::text('description_one', old('description_one'), ['class' => 'form-control', 'minlength' => '2']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Description Two', ['for' => 'description_two']) }}
                {{ Form::text('description_two', old('description_two'), ['class' => 'form-control', 'minlength' => '2']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Slider Image', ['for' => 'slider_image']) }}
                {{ Form::file('slider_image', ['class' => 'form-control', 'id' => 'cname']) }}
              </div>

              <div class="form-group">
                  {{ Form::checkbox('slider_status', '', ['class' => 'form-control']) }}
                  {{ Form::label('', 'Slider Status', ['for' => 'slider_status', 'class' => 'form-check-label', 'style' => 'margin-top: -4px; margin-left:3px']) }}
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