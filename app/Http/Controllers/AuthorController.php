<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function showAllAuthors()
    {
        return response()->json(Author::all());
    }

    public function showOneAuthor($id)
    {
        if(!Author::find($id)) return $this->customResponse('Author not found!', 404);
        return response()->json(Author::find($id));
    }

    public function create(Request $request)
    {
        $author = Author::create($request->all());

        if($author) {
            return response()->json($author, 200);
        } else {
            return $this->customResponse('Failed to create!', 400);
        }
    }

    public function update($id, Request $request)
    {
        $author = Author::find($id);
        if(!$author) return $this->customResponse('Author not found!', 404);
            if($author->update($request->all())) {
                return response()->json($author, 200);
            } else {
                return $this->customResponse('Failed to update!', 400);
            }
    }

    public function delete($id)
    {
        $author = Author::find($id);
        if(!$author) return $this->customResponse('Author not found!', 404);
        if($author->delete()){
            return $this->customResponse('Deleted successfully', 200);
        } else {
            return $this->customResponse('Failed to delete!', 400);
        }
    }

    public function customResponse($message = 'success', $status = 200)
    {
        return response(['status' =>  $status, 'message' => $message], $status);
    }
}
?>