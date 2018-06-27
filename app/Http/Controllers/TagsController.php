<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Tags;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{
    public function list() {
        if (Auth::check()) {
            $user = Auth::user();
            $userNumber = $user->number;
        }
        else {
            return ['data' => [], 'pageNum' => 0, 'msg' => 'plase login first'];
        }
    	$data = Tags::where('status', 'passed')->whereIn('number', [$userNumber, '000'])->get()->toArray();
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
            $tag = Tags::find($request->input('id'));
        }
        else {
            $tag = new Tags();
            $tag->status = 'passed';
            $tag->creator = $user->id;
            $tag->number = $userNumber;
        }
        if ($request->has('name')) {
            $tag->name = $request->input('name', '');
        }
        if ($request->has('cover')) {
            $tag->cover = $request->input('cover', '');
        }
        if ($request->has('description')) {
            $tag->description = $request->input('description', '');
        }
        return ['status' => $tag->save()];
    }

    public function delete(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $userNumber = $user->number;
        }
        else {
            return ['status' => false, 'msg' => 'plase login first'];
        }
        $tag = Tags::find($request->input('id'));
        if ($tag->number == $userNumber) {
            $tag->status = 'delete';
            return ['status' => $tag->save()];
        }
        return ['status' => false];
    }
}
