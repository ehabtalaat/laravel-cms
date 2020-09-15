@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
       @include('admin.includes.sidebar')
        <div class="col-md-8">
         <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>actions</th>
      </tr>
    </thead>
    <tbody>
        @if($tags->count() == 0)
       
        <tr>
         <td>
      <h2>no tags yet</h2>
  </td>
</tr>
 @else
  @foreach($tags as $tag)
      <tr>
        <td>{{ $tag->tag }}</td>
        <td><a class="btn btn-primary btn-sm mr-3" href="{{route('tags.edit', $tag->id)}}">edit</a><form method="post" action="{{route('tags.destroy',$tag->id)}}" class="d-inline">
            @csrf
            @method('delete')<input type="submit" class="btn btn-danger btn-sm mt-2" value="delete"></form></td>

</tr>
    @endforeach
      @endif
    </tbody>
  </table>
        </div>
</div>
</div>
@endsection