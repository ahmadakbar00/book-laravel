<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $book = Book::all();
        // dd($book);
        return view('home', ['listbook'=>$book]);
    }

    public function addbook(Request $request){
        // dd($request);
       
        $book = new Book; //membuat object model/tabel baru

        //kolom database = data yang akan dimasukan
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->penerbit = $request->penerbit;

        $book->save(); //insert data ke database
        return redirect()->back()->with('success','Data Berhasil Dimasukan');
    }

    public function editbook(Request $request){
        $book = Book::find($request->id); //mencari row dengan mencari berdasar id
        // dd($request, $book);
        //kolom database = data yang akan dimasukan
        $book->judul = $request->judul;
        $book->penulis = $request->penulis;
        $book->tahun = $request->tahun;
        $book->penerbit = $request->penerbit;

        $book->save(); //insert data ke database
        return redirect()->back()->with('success','Data Berhasil Diedit');   
    }

    public function deletebook($id){
        // dd($id);
        $book = Book::find($id); //mengapus row dengan mencari berdasar id
        $book->delete();
        return redirect()->back()->with('success','Data Berhasil Dihapus');   
    }
    public function detailbook($id){
        $book = Book::find($id); //mencari row didatabase berdasar id
        // dd($book);
        return view('detail', ['book'=> $book]);   
    }

}

