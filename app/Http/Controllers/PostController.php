<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Jobs\SendPostNotifications;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Contracts\Queue\Queue;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->all());
    
        //SendPostNotifications::dispatch($post)->onQueue('Subscription');
    
        return response()->json($post, 201);
    }
}
