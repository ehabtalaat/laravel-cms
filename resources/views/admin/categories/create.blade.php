@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
          @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>add category</h3></div>
                <div class="card-body">
                	<form action="{{route('categories.store')}}" method="post">
                		@csrf
                		<div class="form-group">
                			<label>name:</label>
                			<input type="text" class="form-control" placeholder="enter the name of the category" name="name">
                			@error('name')
 						   <div class="alert alert-danger mt-3">{{ $message }}</div>
							@enderror
                		</div>
                		<input type="submit" class="btn btn-success" value="create">
                	</form>
                </div>
        </div>
</div>
</div>
</div>

@endsection