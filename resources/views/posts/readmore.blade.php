@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$post->title}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{asset($post->img_url)}}" style="width:100%;height:250px;"/>
                    <div style="width:100%;height:250px;">
                    {{$post->content}}
                    </div>
                    <label> Writ By : {{$post->user->name}} </label>
                        <label> Writed At : {{$post->created_at}}</label>
                  
                 
                 
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
