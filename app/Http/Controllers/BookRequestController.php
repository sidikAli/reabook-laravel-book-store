<?php

namespace App\Http\Controllers;

use App\BookRequest;
use Illuminate\Http\Request;

class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $search = $request->input('search');
        $query = BookRequest::query();

        if (!empty($status)) {
            $query->where('status', $status);
        }
        
        if (!empty($search)) {
            $query->where('email','LIKE', "%$search%");
        }

        $requests = $query->paginate(10);
        return view('admin.request.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $book_request = BookRequest::findOrFail($id);
        return view('admin.request.edit', compact('book_request'));
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
        $request->validate([
            'status' => 'required|in:pending,approved,declined'
        ]);

        BookRequest::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect()->route('book-request.index')->with('success', 'Request Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book_request = BookRequest::findOrFail($id);
        $book_request->delete();

        return redirect()->route('request.index')->with('Request Deleted Successfully!');
    }
}
