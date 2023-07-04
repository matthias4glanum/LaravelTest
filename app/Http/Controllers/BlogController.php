<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BlogFilterRequest;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Pagination\Paginator;

class BlogController extends Controller
{
    public function index() :View
    {
        $paginate = Post::paginate(10);

        $post = Post::find(8);

        // $post->tags()->createMany([[
        //     'name' => 'Tag 1'
        // ],
        // [
        //     'name' => 'Tag 2'
        // ]]);

        return view('blog.index', [
            'posts' => $paginate
        ]);
    }

    public function show(string $slug, Post $post) :RedirectResponse|View
    {
        if ($post->slug != $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }

        return view('blog.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(CreatePostRequest $request)
    {
        $post = Post::create($request->validated());

        return redirect()->route('blog.index', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a bien été ajouté");
    }

    public function edit(Post $post)
    {
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->validated());

        return redirect()->route('blog.index', ['post' => $post->id])->with('success', "L'article a bien été modifié");
    }

    public function destroy(Request $request)
    {
        DB::query()
            ->select('id')
            ->from('posts')
            ->where(
                'id', $request->id
            )
        ->delete();

        return redirect()->back()->with('success', "L'article a bien été supprimé");
    }
}
