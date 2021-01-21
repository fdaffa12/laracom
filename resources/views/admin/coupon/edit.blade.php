@extends('admin.layouts.master')
@section('coupon') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">

          <div class="col-md-12 m-auto">
          	<div class="card">
          		<div class="card-header">Update Coupon
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

          			<form action="{{route ('update.coupon')}}" method="POST">
          				@csrf
          				<input type="hidden" name="id" value="{{$coupon->id}}">
          				<div class="form-group">
          					<label for="exampleInputEmail">Coupon Name</label>
          					<input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$coupon->coupon_name}}">

          					@error('coupon_name')
          					<span class="text-danger">{{$message}}</span>
          					@enderror
          				</div>

                  <div class="form-group">
                    <label for="exampleInputEmail">Coupon Discount</label>
                    <input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$coupon->discount}}">

                    @error('discount')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
          				<button type="submit" class="btn btn-primary">Update Coupon</button>
          			</form>	

          		</div>
          	</div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection