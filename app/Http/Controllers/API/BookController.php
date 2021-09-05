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
        	return response()->json(['status' => 'success', 'message' => 'Book record successfully created']);
        } catch (Throwable $e) {
            return response()->json(['status' => 'fail', 'message' => $e->message]);
        }
    }

    public function list()
    {
        $books = Book::all();
        if(!empty($books)){
            return response()->json(['status' => 'success', 'data' => $books, 'message' => 'data retrieved']);
        }
        return response()->json(['status' => 'fail', 'message' => 'Data not found']);
        
    }
 
    public function record($id)
    {
        $book = Book::find($id);
        if(!empty($book)){
            return response()->json(['status' => 'success', 'data' => $book]);
        }
        
        return response()->json(['status' => 'fail', 'message' => 'Data not found']);
        
    }


    public function update(Request $request, $id)
    {
        $result = Book::where('id', $id)->update($request->all());
        if($result){
            return response()->json(['status' => 'success', 'data' => $res]);
        }
        return response()->json(['status' => 'fail', 'message' => 'Validation Fail']);
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
