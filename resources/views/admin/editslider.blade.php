@extends('layouts.app-admin')

@section('title')
    Edit Slider
@endsection

@section('content')
<div class="row grid-margin">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Edit Slider</h4>
            {!! Form::open(['route' => ['slider.update', 'id' => $slider->id], 'class' => 'cmxform', 'method' => 'POST', 'id' => 'commentForm', 'enctype' => 'multipart/form-data']) !!}
              @csrf

              <div class="form-group">
                {{ Form::label('', 'Description One', ['for' => 'description_one']) }}
                {{ Form::text('description_one', $slider->description1, ['class' => 'form-control', 'minlength' => '2']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Description Two', ['for' => 'description_two']) }}
                {{ Form::text('description_two', $slider->description2, ['class' => 'form-control', 'minlength' => '2']) }}
              </div>

              <div class="form-group">
                {{ Form::label('', 'Slider Image', ['for' => 'slider_image']) }}
                {{ Form::file('slider_image', ['class' => 'form-control', 'id' => 'cname']) }}
              </div>

              {{ Form::submit('Update Slider', ['class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  @endsection

  
  @section('scripts')
    {{-- <script src="{{ asset('backend/js/form-validation.js') }}"></script> --}}
    <script src="{{ asset('backend/js/bt-maxLength.js') }}"></script>
  @endsection