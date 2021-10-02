<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserPicture;
use App\Models\UserMessage;
use App\Models\UserInterest;
use App\Models\UserHobby;
use App\Models\UserNotification;

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

    public function addConnection(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_to_add = User::find($request->user_id);
        $user->connection()->save($user_to_add);

        $response['status'] = "connection_created";
        return response()->json([$response], 200);
    }

    public function removeConnection(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_to_remove = User::find($request->user_id);
        $connection = $user->connection()->find($user_to_remove);
        if($connection){
            $connection->pivot;
        }else{
            $connection = $user_to_remove->connection()->find($user)->pivot;
        }
        $connection->delete();
        $response['status'] = "connection_removed";
        return response()->json([$response], 200);
            
    }

    public function addFavorite(Request $request){
        //check if exists and if yes -> add connection and favorite(notifie users that connection created) else -> add favorite | add notification on favorite
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_to_favorite = User::find($request->user_id);
        $user->favorite()->save($user_to_favorite);

        $response['status'] = "add_favorite";
        return response()->json([$response], 200);
    }

    public function blockUser(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_to_block = User::find($request->user_id);
        $user->blockUser()->save($user_to_block);

        $response['status'] = "user_blocked";
        return response()->json([$response], 200);
    }

    public function sendMessage(Request $request){
        $user_id = auth()->user()->id;
        // $user = User::find($user_id); check if connection exists 
        $message = new UserMessage;
        $message->sender_id = $user_id;
        $message->receiver_id= $request->receiver_id;
		$message->body= $request->body;
		$message->is_approved= 0;	
		$message->is_read= 0;
        $message->save();
        
        $response['status'] = "message_sent";
        return response()->json([$response], 200);
    }

    public function addInterest(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_interest = new UserInterest;
        $user_interest->name = $request->name;
        $user->interests()->save($user_interest);

        return response()->json([$user_interest], 200);
    }

    public function addHobby(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_hobby = new UserHobby;
        $user_hobby->name = $request->name;
        $user->hobbies()->save($user_hobby);

        return response()->json([$user_hobby], 200);
    }

    public function addNotification(Request $request){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $user_notification = new UserNotification;
        $user_notification->body = $request->body;	
		$user_notification->is_read = 0;	
        $user->notifications()->save($user_notification);

        return response()->json([$user_notification], 200);
    }
}
