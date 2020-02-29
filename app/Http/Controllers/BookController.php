<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Category;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::all();
        $authors=Author::all();;
        $categories=Category::all();
        return view('backend.books.index',compact('books','authors','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories=Category::all();
        $authors=Author::all();
        return view('backend.books.create',compact('categories','authors'));
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
        //     "title"=>'required|max:191',
        //     "photo"=>'required',
        //     "price"=>'required',
        //     "pdf"=>'required',
            
        //     "description"=>'required',
        //     "category"=>'required',
        //     "author"=>'required']);

        //file //Upload //3
        if($request->hasfile('logo')){
            $logo=$request->file('logo');
            $upload_dir=public_path().'/storage/book/';
            $name=time().'.'.$logo->getClientOriginalExtension();
            $logo->move($upload_dir,$name);
            $path='/storage/book/'.$name;
        }

        //Store Dattitlea//4
        $book=new Book;
        $book->title=request('title');
        $book->photo=$path;
        $book->price=request('price');
        $book->pdf=request('pdf');
        $book->description=request('description');
        $book->category_id=request('category');
        $book->author_id=request('author');
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $book=Book::find($id);
        $authors=Author::all();;
        $categories=Category::all();
       
         return view('backend.books.edit',compact('book','authors',
            'categories'));
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

        //Store Dattitlea//4
        $book=Book::find($id);
        $book->title=request('title');
        $book->photo=$path;
        $book->price=request('price');
        $book->pdf=request('pdf');
        $book->description=request('description');
        $book->category_id=request('category');
        $book->author_id=request('author');
        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //dd($id);
        $book=Book::find($id);
        $book->delete();
        return redirect()->route('books.index');

       
    }
}
