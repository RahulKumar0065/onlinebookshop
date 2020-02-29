<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors=Author::all();
        return view('backend.authors.index',compact('authors'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // $request->validate([
        //     "name"=>'required|max:191',
        //      "photo"=>'required',
        //     "email"=>'required',
        //     "gender"=>'required',
        //     "address"=>'required',
        //     "description"=>'required']);

        //file //Upload //3
        if($request->hasfile('logo')){
            $logo=$request->file('logo');
            $upload_dir=public_path().'/storage/author/';
            $name=time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path='/storage/author/'.$name;
        }

        //Store Data//4
        $author=new Author;
        $author->name=request('name');
        $author->photo=$path;
        $author->email=request('email');
        $author->gender=request('gender');
        $author->address=request('address');
        $author->description=request('description');
        $author->save();

        return redirect()->route('authors.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.authors.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author=Author::find($id);
        return view('backend.authors.edit',compact('author'));

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasfile('logo')){
            $logo=$request->file('logo');
            $upload_dir=public_path().'/storage/author/';
            $name=time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path='/storage/author/'.$name;
        }else{
            $path=request('oldlogo');
        }

        $author=Author::find($id);
        $author->name=request('name');
        $author->photo=$path;
        $author->email=request('email');
        $author->gender=request('gender');
        $author->address=request('address');
        $author->description=request('description');
        $author->save();

        return redirect()->route('authors.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author=Author::find($id);
        $author->delete();
        return redirect()->route('authors.index');
    }
}
