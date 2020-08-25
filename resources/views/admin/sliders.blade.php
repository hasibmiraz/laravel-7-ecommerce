@extends('layouts.app-admin')

@section('title')
    Sliders
@endsection

@section('content')

@if (session()->has('status'))
  <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
    <span>{{ session()->get('status') }}</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>            
  </div>
@endif

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Sliders</h4>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>Order</th>
                  <th>Image</th>
                  <th>Description One</th>
                  <th>Description Two</th>
                  <th>Status</th>
                  <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php $i = 1; @endphp
              @foreach ($sliders as $slider)
                <tr>
                    <td>{{ $i }}</td>
                    <td><img src="/storage/slider_images/{{ $slider->slider_image }}" alt=""></td>
                    <td>{{ $slider->description1 }}</td>
                    <td>{{ $slider->description2 }}</td>
                    <td>
                      @if ($slider->status === 1)
                        <label class="badge badge-success">Activated</label>
                      @else
                        <label class="badge badge-danger">Deactivated</label>
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('slider.edit', ['id' => $slider->id]) }}"><button class="btn btn-outline-primary">Edit</button></a>
                    
                      <a href="{{ route('slider.delete', ['id' => $slider->id]) }}" class="btn btn-outline-danger" id="delete">Delete</a>

                      @if ($slider->status === 1)
                        <a href="{{ route('slider.activate', ['id' => $slider->id]) }}" class="btn btn-outline-warning">Deactivate</a>                            
                      @else
                        <a href="{{ route('slider.activate', ['id' => $slider->id]) }}" class="btn btn-outline-success">Activate</a>  
                      @endif

                    </td>
                </tr>                    
                @php $i++; @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('backend/js/data-table.js') }}"></script>
@endsection