@extends('admin.layouts.master')
@section ('admin_content')
<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="row row-sm">

          <div class="col-md-8 m-auto">
          	<div class="card">
          		<div class="card-header">Edit Category
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

          			<form action="{{route ('update.category')}}" method="POST">
          				@csrf
                  <input type="hidden" value="{{$category->id}}" name="id">
          				<div class="form-group">
          					<label for="exampleInputEmail">Edit Category</label>
          					<input type="text" name="category_name" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" value="{{$category->category_name}}">

          					@error('category_name')
          					<span class="text-danger">{{$message}}</span>
          					@enderror
          				</div>
          				<button type="submit" class="btn btn-primary">Update Category</button>
          			</form>	

          		</div>
          	</div>
          </div>

        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
@endsection