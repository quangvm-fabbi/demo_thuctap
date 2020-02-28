<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cake;
use App\Models\Comment;
use App\Http\Controllers\Auth;
use App\Repositories\cake\CakeRepositoryInterface;

class CommentController extends Controller
{
    protected $cake;

    public function __construct(CakeRepositoryInterface $cake)
    {
        $this->cake = $cake;
    }
	public function postCommentFood($id, Request $request){
    	$id_cake = $id;
    	$cake= $this->cake->find($id);	
    	$comment = new Comment;
    	$comment->cake_id = $id_cake;
    	$comment->user_id = auth()->user()->id;
    	$comment->content = $request->content;
    	$comment->save();
        
    	return redirect()->route('cakeDetail', $id);	
    }
}
