@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
           @include('admin.includes.sidebar')
        <div class="col-md-8">
         <table class="table">
    <thead>
      <tr>
        <th>image</th>
        <th>name</th>
        <th>actions</th>
      </tr>
    </thead>
    <tbody>
        @if($posts->count() == 0)
       
        <tr>
         <td>
      <h2 class="text-center">no trashed posts yet</h2>
  </td>
</tr>
 @else
  @foreach($posts as $post)
      <tr>
        <td><img src="{{asset('storage/' . $post->image)}}" style="width:100px;height: 100px;"></td>
        <td>{{ $post->title }}</td>
        <td><a class="btn btn-primary btn-sm mr-3" href="{{route('trashedPosts.restore',$post->id)}}">restore</a><form method="post" action="{{route('trashedPosts.delete',$post->id)}}" class="d-inline">
            @csrf
          @method('delete')
          <input type="submit" class="btn btn-danger btn-sm mt-2" value="delete"></form></td>

</tr>
      @endforeach

      @endif
    </tbody>
  </table>
        </div>
</div>
</div>
@endsection