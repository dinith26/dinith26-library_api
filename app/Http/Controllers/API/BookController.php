<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'isbn' => 'required|max:20|unique:books',
                'category' => 'required|max:100',
                'title' => 'required',
                'category' => 'required|max:100',
                'author' => 'required|max:100',
                'price' => 'required|max:10',
                'availability' => 'required|max:10',
            ]);
        	Book::create($request->all());
        	return response()->json(['status' => 'success']);
        } catch (Throwable $e) {
            report($e);
            return response()->json(['status' => 'fail', 'message' => $e->message]);
        }
    }

    public function list()
    {
        $books = Book::all();
        return response()->json(['status' => 'success', 'data' => $books]);
    }
 
    public function record($id)
    {
        $book = Book::find($id);
        return response()->json(['status' => 'success', 'data' => $book]);
    }


    public function update(Request $request, $id)
    {
        $res = Book::where('id', $id)->update($request->all());
		return response()->json(['status' => 'success', 'data' => $res]);
    }

    public function search($type, $param)
    {
        if($param == 'all'){
            $filterData = Book::all();
        }else{
           $filterData = Book::where($type,'LIKE','%'.$param.'%')
                      ->get(); 
        }
        
        return response()->json(['status' => 'success', 'data' => $filterData]);
    }
}
