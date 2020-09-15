@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row">
       @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>add user</h3>
                </div>
                <div class="card-body">
                	<form action="{{route('users.store')}}" method="post"  enctype="multipart/form-data">
                		@csrf
                        <div class="form-group">
                            <label>username:</label>
                        <input type="text" name="name"  class="form-control" placeholder="enter the username">
                        </div>
                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" class="form-control" placeholder="enter the email">
                        </div>
                		<input type="submit" class="btn btn-success mt-2" value="create">
                	</form>
                </div>
        </div>
</div>
</div>
</div>

@endsection