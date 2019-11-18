<?php

namespace App\Http\Controllers;

use App\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Posts;
class PagesController extends Controller
{
    public function all()
    {
        $allpages=Pages::all()->where('status',1);
        
        $posts = Posts::orderBy('created_at', 'asc')->get();

        return View('welcome',['pages'=> $allpages, 'posts' => $posts]);
    }
   public function  getpage($id)
   {
       $page=Pages::find($id);
       return View('pages.page',['page'=>$page]);
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $pages=Pages::all();
          return View('pages.index',['pages'=>$pages]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Pages::create($input);
        return redirect('pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(Pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page=Pages::find($id);
        return View('pages.edit',['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        Pages::find($id)->update($input);
        return redirect('pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id != null) {
            $page = Pages::find($id);
            $page->forceDelete();
            return redirect('pages');
        } else {
            return redirect('pages');
        }
    }
    
}
