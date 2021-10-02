<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model{
	protected $table = "user_messages";
	

	public function scopeUnApproved($query){
        return $query->where('is_approved', '0');
    }
}


?>