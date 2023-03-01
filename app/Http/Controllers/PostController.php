<?php

namespace App\Http\Controllers;

use App\Data\PostData;
use App\Http\Requests\Post\StorePostRequest;
use App\Interfaces\PostServiceInterface;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct(
        private PostServiceInterface $postService
    )
    {
    }

    public function index(Request $request)
    {
        $token = auth()->user()->createToken('Marlons Token');
        dd($token);

//        $post = Post::find(8);

//        $post->categories()->syncWithoutDetaching([1, 2]);
//
//        dd('done');

        $posts = Post::with('user')->paginate(5);

//        if (Cache::has('posts')) {
//            $posts = Cache::get('posts');
//        } else {
//            $posts = Post::all();
//            Cache::put('posts', $posts, 60);
//        }
//
//        dd($posts->forPage($request->get('page') ?? 1, 5));

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePostRequest $request)
    {
        try {
            $this->postService->store(PostData::from(['user_id' => auth()->id(), ...$request->validated()]));
        } catch (QueryException $e) {
            return redirect()->back()->withError('Post konnte nicht erstellt werden!');
        }

        return redirect()->back()->withSuccess('Post erfolgreich erstellt!');
    }

    public function edit(Post $post)
    {
        if (auth()->user()->cannot('edit', $post)) {
            abort(403);
        }

        return view('post.edit', compact('post'));
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $post->update($request->validated());

        return redirect()->route('post.index')->withSuccess('Post erfolgreich editiert.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->back();
    }
}
