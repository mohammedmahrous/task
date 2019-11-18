<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            body, input{
	font-family: Calibri, Arial;
	margin: 0px;
	padding: 0px;
}
a {
	color: #0254EB
}
a:visited {
	color: #0254EB
}
#header h2 {
	color: white;
	background-color: #00A1E6;
	margin:0px;
	padding: 5px;
}
.comment {
	width: 400px;
	background-color: #f0f0f0;
	margin: 10px;
}
a.morelink {
	text-decoration:none;
	outline: none;
}
.morecontent span {
	display: none;

}
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
         <div class="top-left  links">
                    
                    @foreach ($pages as $page )
                        <a href="{{ url('page/'.$page->id) }}">{{$page->title}}</a>
                    @endforeach
                   
                        

                    
                </div>
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

           
               <div class=" container" style="width:90%">
               
                    <div class="row lg-12">
                    @foreach ($posts as $post )
                        
                   
                        <div class="" style="width:30%;float:left;margin:20px 10px">
                         <span style="display:block" > {{$post->title}}</span>
                         
                        <img src="{{asset($post->img_url)}}" style="width:100%;height:200px"/>
                       
                        <p>{!!  substr($post->content,0,150)."..." !!}<a href="{{url('/readmore/'.$post->id)}}">Read More"</a> </p>

                     </div>
                @endforeach

               </div>
               </div>
            
        </div>
    </body>
</html>
