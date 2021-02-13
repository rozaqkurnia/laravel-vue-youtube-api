<?php

namespace App\Http\Controllers;

use App\Events\CommentCreatedEvent;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->validate([
            'video_id' => 'required'
        ]);

        $comments = Comment::where('video_id', $request->video_id)
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        $resource = CommentResource::collection($comments);

        return response($resource, 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|min:3',
            'video_id' => 'required'
        ]);

        $comment = Comment::create([
            'body' => $data['body'],
            'user_id' => \Auth::user()->id,
            'video_id' => $data['video_id']
        ]);

        $resource = new CommentResource($comment);

        event(new CommentCreatedEvent($resource));

        return response($resource, 201);
    }
}
