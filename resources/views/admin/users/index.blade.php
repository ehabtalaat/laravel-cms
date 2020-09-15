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
        @if($users->count() == 0)
       
        <tr>
         <td>
      <h2>no users yet</h2>
  </td>
</tr>
 @else
  @foreach($users as $user)
      <tr>
        <td><img src="{{asset('storage/' . $user->profile->avatar)}}" style="width:100px;height: 100px;border-radius: 50%;"></td>
        <td>{{ $user->name }}</td>
        <td>
          @if($user->id != auth()->id())
          @if($user->admin == 1)
          <a class="btn btn-primary btn-sm mr-3" href="{{route('users.makeadmin',$user->id)}}">remove permission</a>
           @else
           <a class="btn btn-primary btn-sm mr-3" href="{{route('users.makeadmin',$user->id)}}">make admin</a>
           @endif
           @endif
           @if($user->id != auth()->id())
          <form method="post" action="{{route('users.destroy',$user->id)}}" class="d-inline">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger btn-sm mt-2" value="delete"></form></td>
          @endif
</tr>
      @endforeach

      @endif
    </tbody>
  </table>
        </div>
</div>
</div>
@endsection