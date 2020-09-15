@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
            @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>add post</h3>
                </div>
                <div class="card-body">
                	<form action="{{route('posts.store')}}" method="post"  class="col-md-12" enctype="multipart/form-data">
                		@csrf
                		<div class="form-group">
                			<label>title:</label>
                			<input type="text" class="form-control" placeholder="enter the title of the post" name="title">
                			@error('title')
 						   <div class="alert alert-danger mt-3">{{ $message }}</div>
							@enderror
                		</div>
                        <div class="form-group">
                            <label>image:</label>
                            <input type="file" name="image" class="form-control">
                            @error('image')
                           <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                         <label>category:</label>
                         <select name="category_id" class="form-control">
                             @foreach($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                             @endforeach
                         </select>
                     </div>
         <div class="form-group mr-10 ">
        <b>choose your tags:</b>
        <br>
         @foreach($tags as $tag)
         <div class="custom-control custom-checkbox">
             <input type="checkbox" class="custom-control-input" id="{{$tag->id}}"  name='tags[]' value="{{$tag->id}}">
  <label class="custom-control-label" for="{{$tag->id}}">
   {{$tag->tag}}
  </label>
</div>
  @endforeach
</div>
<br>
                     <div class="form-group">
                         <label>content:</label>
                         <textarea class="form-control" rows="10" name="content"></textarea>
                          @error('content')
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