<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Article;

class ArticleController extends Controller
{
    public function list($number, $page) {
    	$pageSize = 10;
    	$data = Article::where('status', 1)->whereIn('number', [$number, '000'])->skip($pageSize * ($page - 1))->take($pageSize)->get()->toArray();
    	$totalPage = ceil(Article::where('status', 1)->whereIn('number', [$number, '000'])->count()/$pageSize);
    	return ['data' => $data, 'pageNum' => $totalPage];
    }

    public function detail($number, $id) {
    	$data = Article::where('status', 1)->whereIn('number', [$number, '000'])->where('id', $id)->first();
    	return ['data' => $data];
    }
}
