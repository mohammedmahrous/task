@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Add New Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                  <form method="post" enctype="multipart/form-data" action="{{url('posts/create')}}">
                  {!! csrf_field() !!}
                  <label>Post Title :  </label>
                  <input type="text" name="title" class="mb-3"/>
                  <br>
                  <label>Post Image :  </label>
                  <input type="file" name="img_url" class="mb-3" />
                  <br>
                  <label>Post Content :  </label>
                   <textarea name="content" class="mb-3">Next, use our Get Started docs to setup Tiny!</textarea>
                   <br>
                   <label>Added Post By :  </label>
                  
                   <input type="text" name="added_by">
                   
                   <br>
                   
                   <input type="submit" name="addPost" value="Add New" class="mb-3 " id="btn_save"  />
                   
                  </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
