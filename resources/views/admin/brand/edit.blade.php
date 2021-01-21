@extends('admin.layouts.master')
@section('brand') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">
          <div class="col-md-4 m-auto">
            <div class="card">
              <div class="card-header">Update Brand
              </div>

              <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

                <form action="{{route ('update.brand')}}" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $brand->id}}">
                  <div class="form-group">
                    <label for="exampleInputEmail">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$brand->brand_name}}">

                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Update Brand</button>
                </form> 

              </div>
            </div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection