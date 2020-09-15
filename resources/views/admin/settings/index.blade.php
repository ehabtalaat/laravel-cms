@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
         @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3> edit post </h3></div>
                <div class="card-body">
                	<form action="{{route('setting.update',$setting->id)}}" method="post">
                		@csrf
                        @method('put')
                      <div class="form=group">
                        <label>site_name:</label>
                        <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
                      </div>
                       <div class="form=group">
                        <label>contact_number:</label>
                        <input type="text" name="contact_number" class="form-control" value="{{$setting->contact_number}}">
                      </div>
                       <div class="form=group">
                        <label>contact_email:</label>
                        <input type="text" name="contact_email" class="form-control"
                         value="{{$setting->contact_email}}">
                      </div>
                      <div class="form=group">
                        <label>address:</label>
                        <input type="text" name="address" class="form-control" value="{{$setting->address}}">
                      </div>
                		<input type="submit" class="btn btn-primary mt-2" value="update">
                	</form>
                </div>
        </div>
</div>
</div>
</div>

@endsection