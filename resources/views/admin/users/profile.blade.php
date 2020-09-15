@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
     @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>edit profile</h3>
                </div>
                <div class="card-body">
                  <form action="{{route('profile.update',$user->profile->id)}}" class="col-md-12" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                   <label>user:</label>
              <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                      <label>email</label>
                      <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                     <div class="form-group">
                      <label>new password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                        <div class="form-group">
                            <label>avatar:</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="form-group">
                         <label>youtube:</label>
                        <input type="text" name="youtube" class="form-control" value="{{$user->profile->youtube}}">
                     </div>
                      <div class="form-group">
                         <label>facebook:</label>
                        <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
                     </div>
                     <div class="form-group">
                         <label>about:</label>
                         <textarea class="form-control" rows="10" name="about">{{$user->profile->about}}</textarea>
                     </div>
                    <input type="submit" class="btn btn-success mt-2" value="update">
                  </form>
                </div>
        </div>
</div>
</div>
</div>

@endsection