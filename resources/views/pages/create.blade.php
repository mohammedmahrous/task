@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">New Pages</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                    @endif
                  <form method="post" enctype="multipart/form-data" action="{{url('pages/create')}}">
                  {!! csrf_field() !!}
                  <label>Page Title :  </label>
                  <input type="text" name="title" class="mb-3"/>
                  <br>
                  
                  <br>
                  <label>Page Content :  </label>
                   <textarea name="content" class="mb-3">Next, use our Get Started docs to setup Tiny!</textarea>
                   <br>
                  <select name="status">
                       
                   
                   <option value="1">true </option>
                    <option value="0">false </option>
                   </select> 
                   <br>
                   
                   <input type="submit" name="addPost" value="Add New" class="mb-3 " id="btn_save"  />
                   
                  </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
