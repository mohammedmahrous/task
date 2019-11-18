@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                  <form method="post" enctype="multipart/form-data" action="{{url('users/update/'.$user->id)}}">
                  {!! csrf_field() !!}
                  <label>User Name :  </label>
                  <input type="text" name="name" class="mb-3"value="{{$user->name}}"/>
                  <br>
                  <label>User Email :  </label>
                  <input type="Email" name="email" class="mb-3" value="{{$user->email}}"/>
                  <br>
                  <label>Password :  </label>
                  <input type="password" name="password" class="mb-3" value="{{$user->password}}"/>
                   <br>
                   
                   <br>
                   
                   <input type="submit" name="update" value="update" class="mb-3 " id="btn_pdate"  />
                   
                  </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
