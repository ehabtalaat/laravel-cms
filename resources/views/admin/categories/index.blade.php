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
        @if($categories->count() == 0)
       
        <tr>
         <td>
      <h2>no categories yet</h2>
  </td>
</tr>
 @else
  @foreach($categories as $category)
      <tr>
        <td>{{ $category->name }}</td>
        <td><a class="btn btn-primary btn-sm mr-3" href="{{route('categories.edit', $category->id)}}">edit</a>
          <form method="post" action="{{route('categories.destroy',$category->id)}}" class="d-inline">
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