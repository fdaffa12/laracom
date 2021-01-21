@extends('admin.layouts.master')
@section('brand') active @endsection
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">
          <div class="col-md-8">
          	<div class="card">
          		<div class="card-header">All Brand
          		</div>

          		<div class="card-body">
          			<div class="card pd-20 pd-sm-40">
			          <h6 class="card-body-title">Brand list</h6>
			          	@if(session('Catupdated'))
	          			<div class="alert alert-success alert-dismissible fade show" role="alert">
	          			<strong>{{session('Catupdated')}}</strong>
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
				                  <th class="wd-15p">Brand name</th>
				                  <th class="wd-15p">Status</th>
				                  <th class="wd-20p">Action</th>
				                </tr>
				              </thead>
				              <tbody>
				              	@php
				              	 $i = 1;
				              	@endphp
				              	@foreach ($brands as $row)
				                <tr>
				                  <td>{{ $i++ }}</td>
				                  <td>{{$row->brand_name}}</td>
				                  <td>
				                  	@if($row->status == 1)
				                  	<span class="badge badge-success">Active</span>
				                  	@else
				                  	<span class="badge badge-danger">Inactive</span>
				                  	@endif
				                  </td>
				                  <td>
				                  	<a href="{{url ('admin/brand/edit/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
				                  	<a href="{{url ('admin/brand/delete/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash "></i></a>
				                  	@if($row->status == 1)
				                  	<a href="{{url ('admin/brand/inactive/'.$row->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
				                  	@else
				                  	<a href="{{url ('admin/brand/active/'.$row->id)}}" class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
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
          		<div class="card-header">Add Brand
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

          			<form action="{{route ('store.brand')}}" method="POST">
          				@csrf
          				<div class="form-group">
          					<label for="exampleInputEmail">Brand Name</label>
          					<input type="text" name="brand_name" class="form-control @error('brand_name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Category">

          					@error('brand_name')
          					<span class="text-danger">{{$message}}</span>
          					@enderror
          				</div>
          				<button type="submit" class="btn btn-primary">Add Brand</button>
          			</form>	

          		</div>
          	</div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection