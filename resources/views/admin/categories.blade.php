@extends('layouts.app-admin')

@section('title')
    Categories
@endsection

@section('content')

@if (session()->has('status'))
  <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
    <p>{{ session()->get('status') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>            
  </div>
@endif

<div class="card">
    <div class="card-body">
      <h4 class="card-title">Categories</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order</th>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>

                @php $i = 1; @endphp

                @foreach ($categories as $category)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $category->category_name }}</td>
                  <td>
                    <a href="{{ route('category.edit', ['id' => $category->id]) }}"><button class="btn btn-outline-primary">Edit</button></a>
                    
                    <a href="{{ route('category.delete', ['id' => $category->id]) }}" class="btn btn-outline-danger" id="delete">Delete</a>

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