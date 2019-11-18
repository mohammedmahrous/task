@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Update Pages</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                  <form method="post" enctype="multipart/form-data" action="{{url('page/update/'.$page->id)}}">
                  {!! csrf_field() !!}
                  <label>Page Title :  </label>
                  <input type="text" name="title" class="mb-3"value="{{$page->title}}"/>
                  <br>
                  
                  <br>
                  <label>Page Content :  </label>
                   <textarea name="content" class="mb-3">{{$page->content}}</textarea>
                   <br>
                  <select name="status">
                   @if($page->status==1)
                   <option selected   value="1">true </option>
                   @else
                        <option    value="1">true </option>
                    @endif
                    @if($page->status==0)
                   <option selected   value="0">false </option>
                   @else
                   <option    value="0">false </option>
                       @endif
                   </select> 
                   <br>
                   
                   <input type="submit" name="update" value="Update" class="mb-3 " id="btn_update"  />
                   
                  </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
