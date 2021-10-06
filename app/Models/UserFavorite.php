<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserFavorite extends Model{
	protected $table = "user_favorites";
	
	function favoritesOf(){
		return $this->belongsTo(User::class, 'id');
	}
}


?>