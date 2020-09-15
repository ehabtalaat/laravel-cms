@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-4">
         <ul class="list-group">
            <li class="list-group-item">home</li>
            <li class="list-group-item">categories</li>
            <li class="list-group-item">create new category</li>
            <li class="list-group-item">all posts</li>
            <li class="list-group-item">create new post</li>
            </ul> 
            </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>add category</h3></div>
                <div class="card-body">
                	<form action="{{route('categories.update',$category->id)}}" method="post">
                        @method('put')
                		@csrf
                		<div class="form-group">
                			<label>name:</label>
                			<input type="text" class="form-control" placeholder="enter the name of the category" name="name" value="{{$category->name}}">
                			@error('name')
 						   <div class="alert alert-danger mt-3">{{ $message }}</div>
							@enderror
                		</div>
                		<input type="submit" class="btn btn-primary" value="update">
                	</form>
                </div>
        </div>
</div>
</div>
</div>

@endsection