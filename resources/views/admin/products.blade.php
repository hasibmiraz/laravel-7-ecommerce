@extends('layouts.app-admin')

@section('title')
    Products
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
      <h4 class="card-title">Products</h4>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table id="order-listing" class="table">
              <thead>
                <tr>
                    <th>Order</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Product Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @php $i = 1; @endphp
                @foreach ($products as $product)
                  <tr>
                      <td>{{ $i }}</td>
                      <td><img src="/storage/product_images/{{ $product->product_image }}" alt=""></td>
                      <td>{{ $product->product_name }}</td>
                      <td>{{ $product->product_price }}</td>
                      <td>{{ $product->product_category }}</td>
                      <td>
                        @if ($product->status === 1)
                          <label class="badge badge-success">Activated</label>
                        @else
                          <label class="badge badge-danger">Deactivated</label>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('product.edit', ['id' => $product->id]) }}"><button class="btn btn-outline-primary">Edit</button></a>
                      
                        <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-outline-danger" id="delete">Delete</a>

                        @if ($product->status === 1)
                          <a href="{{ route('product.activate', ['id' => $product->id]) }}" class="btn btn-outline-warning">Deactivate</a>                            
                        @else
                          <a href="{{ route('product.activate', ['id' => $product->id]) }}" class="btn btn-outline-success">Activate</a>  
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