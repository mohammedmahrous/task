@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Posta  
                 
                <form method="get" action="{{url('post/create')}}" class="float-right">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" name="add" value="Add" class="btn bg-success">
                        </form>
                
                
                 
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                         

<table class="table">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Content</th>
                            <th>Added By</th>
                            <th>Delete</th>
                            <th>Edit</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($posts as $post )
                              
                        <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td><img class="img-responsive" style="width:100px;height:100px" src="{{$post->img_url}}" ></td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                         <form method="post" action="{{url('post/delete/'.$post->id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="DELETE">      
                        

                        <input type="submit" name="delete" value="Delete" class="btn bg-danger">

                        </form>
                        </td>
                        <td>
                        <form method="get" action="{{url('post/edit/'.$post->id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="submit" name="edit" value="Edit" class="btn bg-success pr-2">
                        </form>
                        </td>
                       
                        </tr>
                        
                    @endforeach
                    </tbody>
                </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
