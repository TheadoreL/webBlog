<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Tags;

class Article extends Model
{
	/**
		articles Model
	**/
	protected $table = 'articles';
	
	public function getAuthorAttribute($value) {
    	if (empty($value)) {
    		return 'Default';
		}
		if ($value == 0) {
    		return 'Default';
    	}
    	$user = User::where('id', $value)->first();
    	return $user->name;
	}
	
	public function getTagsAttribute($value) {
    	if (empty($value)) {
    		return [];
    	}
    	$tag = Tags::find(explode(',', $value));
    	$tagNames = [];
    	foreach ($tag as $key => $value) {
			$tagNames[$value->id] = $value->name;
    	}
    	return $tagNames;
    }
}
