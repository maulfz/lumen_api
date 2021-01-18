<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function showAllArticles()
    {
        return response()->json(Article::all());
    }

    public function showOneArticle($id)
    {
        if(!Article::find($id)) return $this->customResponse('Article not found!', 404);
        return response()->json(Article::find($id));
    }

    public function create(Request $request)
    {
        $article = Article::create($request->all());

        if($article) {
            return response()->json($article, 200);
        } else {
            return $this->customResponse('Failed to create!', 400);
        }
    }

    public function update($id, Request $request)
    {
        $article = Article::find($id);
        if(!$article) return $this->customResponse('Article not found!', 404);
            if($article->update($request->all())) {
                return response()->json($article, 200);
            } else {
                return $this->customResponse('Failed to update!', 400);
            }
    }

    public function delete($id)
    {
        $article = Article::find($id);
        if(!$article) return $this->customResponse('Article not found!', 404);
            if($article->delete()){
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