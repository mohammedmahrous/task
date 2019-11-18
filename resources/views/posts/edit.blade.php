@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Post</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                  <form method="post" enctype="multipart/form-data" action="{{url('post/update/'.$post->id)}}">
                  {!! csrf_field() !!}
                  <label>Post Title :  </label>
                  <input type="text" name="title" class="mb-3" value="{{$post->title}}"/>
                  <br>
                  <label>Post Image :  </label>
                  <input type="file" name="img_url" class="mb-3" />
                  <br>
                 <img class="img-responsive" style="width:100px;height:100px" src="{{asset($post->img_url)}}" />
                  <br>
                   <br> 
                  <label>Post Content :  </label>
                   <textarea name="content" class="mb-3"> {{$post->content}}</textarea>
                   <br>
                   <label>Added Post By :  </label>
                  
                   <select  name="added_by">
                   @foreach ($users as $user )
                       
                   @if ($post->added_by==$user->id)
                       <option selected value="{{$user->id}}">{{$user->name}} </option>
                       @else
                       <option value="{{$user->id}}">{{$user->name}} </option>
                   @endif
                   
                    @endforeach
                   </select> 
                   <br>
                   
                   <input type="submit" name="update" value="update" class="mb-3 " id="btn_pdate"  />
                   
                  </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
