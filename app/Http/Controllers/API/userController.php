<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserPicture;

class userController extends Controller
{
    public function addPicture(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $user_picture = new UserPicture;
        $user_picture->picture_url = $request->picture_url;
        $user_picture->is_profile_picture = $request->is_profile_picture;
        $user_picture->is_approved = 0;
        $user->pictures()->save($user_picture);

        
        return response()->json([$user_picture], 200);
    }
}
