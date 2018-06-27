<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function list($page) {
        if (Auth::check()) {
            $user = Auth::user();
            $userNumber = $user->number;
        }
        else {
            return ['data' => [], 'pageNum' => 0, 'msg' => 'plase login first'];
        }
    	$pageSize = 10;
    	$data = Article::where('status', 'passed')->whereIn('number', [$userNumber, '000'])->skip($pageSize * ($page - 1))->take($pageSize)->get()->toArray();
    	$totalPage = ceil(Article::where('status', 'passed')->whereIn('number', [$userNumber, '000'])->count()/$pageSize);
    	return ['data' => $data, 'pageNum' => $totalPage];
    }

    public function detail($id) {
        if (Auth::check()) {
            $user = Auth::user();
            $userNumber = $user->number;
        }
        else {
            return ['data' => [], 'msg' => 'plase login first'];
        }
    	$data = Article::where('status', 'passed')->whereIn('number', [$userNumber, '000'])->where('id', $id)->first();
    	return ['data' => $data];
    }

    public function save(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $userNumber = $user->number;
        }
        else {
            return ['status' => false, 'msg' => 'plase login first'];
        }
        if ($request->has('id')) {
            $article = Article::find($request->input('id'));
        }
        else {
            $article = new Article();
            $article->status = 'passed';
            $article->author = $user->id;
            $article->number = $userNumber;
        }
        if ($request->has('title')) {
            $article->title = $request->input('title', '');
        }
        if ($request->has('cover')) {
            $article->cover = $request->input('cover', '');
        }
        if ($request->has('tags')) {
            $article->tags = implode(',', $request->input('tags'));
        }
        if ($request->has('content')) {
            $article->content = $request->input('content', '');
        }
        return ['status' => $article->save()];
    }

    public function delete(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $userNumber = $user->number;
        }
        else {
            return ['status' => false, 'msg' => 'plase login first'];
        }
        $article = Article::find($request->input('id'));
        if ($article->number == $userNumber) {
            $article->status = 'delete';
            return ['status' => $article->save()];
        }
        return ['status' => false];
    }
}
