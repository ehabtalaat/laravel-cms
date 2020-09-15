@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>add tag</h3></div>
                <div class="card-body">
                	<form action="{{route('tags.store')}}" method="post">
                		@csrf
                		<div class="form-group">
                			<label>name:</label>
                			<input type="text" class="form-control" placeholder="enter the name of the tag" name="tag">
                			@error('tag')
 						   <div class="alert alert-danger mt-3">{{ $message }}</div>
							@enderror
                		</div>
                		<input type="submit" class="btn btn-success mt-2" value="create tag">
                	</form>
                </div>
        </div>
</div>
</div>
</div>
@endsection