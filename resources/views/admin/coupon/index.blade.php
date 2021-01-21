@extends('admin.layouts.master')
@section('coupon') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">
          <div class="col-md-8">
          	<div class="card">
          		<div class="card-header">All Coupon
          		</div>

          		<div class="card-body">
          			<div class="card pd-20 pd-sm-40">
			          <h6 class="card-body-title">Coupon list</h6>
			          	@if(session('update'))
	          			<div class="alert alert-success alert-dismissible fade show" role="alert">
	          			<strong>{{session('update')}}</strong>
	          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	          			</button>
	          			</div>
	          			@endif

	          			@if(session('delete'))
	          			<div class="alert alert-danger alert-dismissible fade show" role="alert">
	          			<strong>{{session('delete')}}</strong>
	          			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	          				<span aria-hidden="true">&times;</span>
	          			</button>
	          			</div>
	          			@endif
	          			<div class="table-wrapper">
				            <table id="datatable1" class="table display responsive nowrap">
				              <thead>
				                <tr>
				                	<th class="wd-5p">S1</th>
				                  <th class="wd-15p">Coupon name</th>
				                  <th class="wd-15p">Coupon discount</th>
				                  <th class="wd-15p">Status</th>
				                  <th class="wd-20p">Action</th>
				                </tr>
				              </thead>
				              <tbody>
				              	@php
				              	 $i = 1;
				              	@endphp
				              	@foreach ($coupons as $row)
				                <tr>
				                  <td>{{ $i++ }}</td>
				                  <td>{{$row->coupon_name}}</td>
				                  <td>{{$row->discount}}%</td>
				                  <td>
				                  	@if($row->status == 1)
				                  	<span class="badge badge-success">Active</span>
				                  	@else
				                  	<span class="badge badge-danger">Inactive</span>
				                  	@endif
				                  </td>
				                  <td>
				                  	<a href="{{url ('admin/coupon/edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				                  	<a href="{{url ('admin/coupon/delete/'.$row->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure want to delete ?')"><i class="fa fa-trash "></i></a>
				                  	@if($row->status == 1)
				                  	<a href="{{url ('admin/coupon/inactive/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
				                  	@else
				                  	<a href="{{url ('admin/coupon/active/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
				                  	@endif
				                  </td>
				                </tr>
				                @endforeach
				              </tbody>
				            </table>
				          </div><!-- table-wrapper -->
	          		</div>
	          	</div>
          	</div>
          </div>

          <div class="col-md-4">
          	<div class="card">
          		<div class="card-header">Add Coupon
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

          			<form action="{{route ('store.coupon')}}" method="POST">
          				@csrf
          				<div class="form-group">
          					<label for="exampleInputEmail">Coupon Name</label>
          					<input type="text" name="coupon_name" class="form-control @error('coupon_name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Coupon">

          					@error('coupon_name')
          					<span class="text-danger">{{$message}}</span>
          					@enderror
          				</div>

          				<div class="form-group">
          					<label for="exampleInputEmail">Coupon Discount</label>
          					<input type="text" name="discount" class="form-control @error('discount') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Coupon Discount %">

          					@error('discount')
          					<span class="text-danger">{{$message}}</span>
          					@enderror
          				</div>
          				<button type="submit" class="btn btn-primary">Add Coupon</button>
          			</form>	

          		</div>
          	</div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection