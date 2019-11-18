@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users  
                 
                <form method="get" action="{{url('user/create')}}" class="float-right">
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            
                            <th>Delete</th>
                            <th>Edit</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user )
                              
                        <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                         <td>{{$user->Password}}</td>
                        <td>
                         <form method="post" action="{{url('user/delete/'.$user->id)}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="DELETE">      
                        

                        <input type="submit" name="delete" value="Delete" class="btn bg-danger">

                        </form>
                        </td>
                        <td>
                        <form method="get" action="{{url('user/edit/'.$user->id)}}">
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
