<?php

namespace App\Http\Controllers\eccomerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;
use App\BookRequest;
use App\Category;

class EccomerceController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$books = Book::take(6)->orderBy('created_at', 'desc')->get();
    	$books2 = Book::take(12)->orderBy('judul', 'asc')->get();

    	return view('eccomerce.index', compact('books', 'books2', 'categories'));
    }

    public function show($slug)
    {
    	$categories = Category::all();
    	$book = Book::where('slug', $slug)->firstOrFail();
    	return view('eccomerce.show', compact('book', 'categories'));
    }

    public function product()
    {
    	$categories = Category::all();
    	$books = Book::orderBy('judul', 'asc')->paginate(12);
    	return view('eccomerce.product', compact('books', 'categories'));
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $books = Book::where('judul', 'like', '%'.$request->search.'%')->orWhere('penulis', 'like', '%'.$request->search.'%')->orderBy('judul', 'asc')->paginate(12);
        return view('eccomerce.product', compact('books', 'categories'));
    }

    public function category(Category $category)
    {
    	$categories = Category::all();
    	$books = $category->book()->orderBy('judul', 'asc')->paginate(12);
    	return view('eccomerce.product', compact('books', 'categories'));
    }

    public function request()
    {
        $categories = Category::all();
        return view('eccomerce.book_request', compact('categories'));
    }

    public function requestCreate(Request $request)
    {
        $request->validate([
            'email'          => 'required|email',
            'book_link'      => 'required|url',
        ]);

        $book = BookRequest::create([
            'email' => $request->email,
            'book_link' => $request->book_link,
            'note' => $request->note,
        ]);
        return redirect()->route('eccomerce.request')->with('success', 'Thank you for your request. We will inform you in 24 hours');
    }

    public function about()
    {
        $categories = Category::all();
        return view('eccomerce.about', compact('categories'));
    }
}
