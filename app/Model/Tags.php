<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Tags extends Model
{
    //
    protected $table = 'tags';

    public function getCreatorAttribute($value) {
    	if (empty($value)) {
    		return 'Default';
        }
        if ($value == 0) {
    		return 'Default';
    	}
    	$user = User::where('id', $value)->first();
    	return $user->name;
	}
}
