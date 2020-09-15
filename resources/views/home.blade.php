@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
       @include('admin.includes.sidebar')
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-danger">
                           <h3 class="text-center">posts</h3>
                        </div>
                        <div class="card-body">
                            <h4>{{$postCount}}</h4>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-warning">
                             <h3 class="text-center">trashed </h3>
                        </div>
                        <div class="card-body">
                            <h4>{{$trashedCount}}</h4>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-success">
                          <h3 class="text-center">users</h3>
                        </div>
                        <div class="card-body">
                            <h4>{{$userCount}}</h4>
                        </div>
                    </div>
                </div>
                  <div class="col-md-3">
                    <div class="card">
                        <div class="card-header bg-primary">
                         <h3 class="text-center">categories</h3>
                        </div>
                        <div class="card-body">
                            <h4>{{$catCount}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
</div>
</div>
@endsection
