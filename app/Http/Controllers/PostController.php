<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends ApiController
{
    public function index()
    {
        $posts = Post::paginate(3);
        return $this->successResponse(200, [
            'posts' => PostResource::collection($posts),
            'links' => PostResource::collection($posts)->response()->getData()->links,
            'meta' => PostResource::collection($posts)->response()->getData()->meta,
        ], 'okConnect');
    }

    public function show(Post $post)
    {
        $dataResponse = new PostResource($post);
        return $this->successResponse(200, $dataResponse, 'getOk');
//        return $dataResponse->additional([
//           'food' => [
//               'pizza' => $post->slug,
//           ]
//        ]);
    }

    public function store(Request $request, Post $post)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string',
            'image' => 'required|image',
            'content' => 'required|string',
            'user_id' => 'required',
        ]);
        if ($validate->fails()) {
            return $this->errorResponse(400, $validate->messages());
        }
        $post->newPost($request);
        $dataResponse = $post->orderBy('id', 'desc')->first();
        return $this->successResponse(200, $dataResponse, 'post created successfully');
    }

    public function update(Request $request, Post $post)
    {
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'slug' => 'required|string',
            'image' => 'image',
            'content' => 'required|string',
            'user_id' => 'required',
        ]);
        if ($validate->fails()) {
            return $this->errorResponse(400, $validate->messages());
        }
        $post->updatePost($request);
        return $this->successResponse(200, $post, 'post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->deletePost($post);
        return $this->successResponse(200, $post, 'post deleted successfully');
    }


}
