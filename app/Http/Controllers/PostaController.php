<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Validator;
class PostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_posts=Posts::all();
  
        return view('posts.index',['posts'=>$all_posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
   
        $users = User::all();
        return View('posts.create', ['users' => $users]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $input =$request->all();
        if(isset($input['img_url']))
        {
               //upload input['img_url']
               $input['img_url']=$this->upload($input['img_url']);
        }else{
            $input['img_url'] = 'images/defualt.jpg';
        }
        
        $input['added_by']= \Auth::user()->id;

        Posts::create($input);
        return redirect('/postss');
    }
      


    public function upload($file)
    {
        $extention = $file->getClientOriginalExtension();
        $fileNameHash= sha1($file->getClientOriginalName());
        $fileName= time()."_".$fileNameHash.$extention;
        $path=public_path('images/');
        $file->move($path,$fileName);
        return 'images/'.$fileName;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Posts::find($id);
        return View('posts.readmore',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Posts::find($id);
        $users=User::all();
        return View('posts.edit',['post'=>$post,'users'=>$users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        if (isset($input['img_url'])) {
            //upload input['img_url']
            $input['img_url'] = $this->upload($input['img_url']);
        } 
        
        Posts::find($id)->update($input);

        
        return redirect('/postss');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Respons
     */
    public function destroy($id =null)
    {
        if($id != null){
            $post=Posts::find($id);
            $post->forceDelete();
            return redirect('postss');
        }
        else{
            return redirect('postss');
        }
        
    }
   
}
