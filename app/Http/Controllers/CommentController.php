<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        if(Auth::guard('user')->guest()){
            abort(503);
        }
    }
    
    public function create(Request $request){
        if($request->user_type == 'user') {
            $author_id = Auth::guard('user')->user()->id;
            $author_type = 'App\User';
        }
        elseif($request->user_type == 'admin'){
            $author_id = Auth::guard('admin')->user()->id;
            $author_type = 'App\Models\Admin';
        }
        
        $text = $request->text;
        $place_id = $request->place_id;

        if($request->parent_id){
            $parent_id = $request->parent_id;
        }
        else{
            $parent_id = 0;
        }
        
       $response = Comment::create(['text' => $text, 'place_id' => $place_id, 'parent_id' => $parent_id, 'commentable_id' => $author_id, 'commentable_type' => $author_type]);

        $comment = [];
        if($response->commentable_type = 'App\User')
            $author = User::find($response->commentable_id)->name;
        elseif($response->commentable_type = 'App\Models\Admin')
            $author = Admin::find($response->commentable_id)->name;
        $comment['name'] = $author;
        $comment['date'] = date_format(date_create($response->created_at), "m/d/y");
        $comment['comment'] = $response->text;
        $comment['id'] = $response->id;

        return response()->json(['status' => 'ok', 'comment' => $comment]);
    }
}
