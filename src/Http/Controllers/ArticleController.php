<?php

namespace Vanguardkras\LaravelSimpleArticles\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Vanguardkras\LaravelSimpleArticles\Article;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * All articles for the admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function adminIndex()
    {
        $this->authorize('create', Article::class);

        $articles = Article::select('id', 'title', 'created_at')
            ->paginate(config('articles.per_page', 15));

        return view('articles::admin_index', compact('articles'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::select(
            'id',
            'title',
            'image',
            'created_at',
            'text_preview'
        )->paginate(config('articles.per_page', 15));

        return view('articles::index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('articles::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $article = new Article;
        $article->fill($request->all());
        $article->image = $request->file('image')->store('articles', 'public');
        $article->text_preview = Str::words(strip_tags($article->text_content), 100);
        $article->save();

        return redirect('/articles/' . $article->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('articles::show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('articles::edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article)
    {
        $article->fill($request->all());
        $article->text_preview = Str::words(strip_tags($article->text_content), 100);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image);
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        Storage::disk('public')->delete($article->image);
        $article->delete();

        return back();
    }

    /**
     * Method checks user's right to manage articles.
     *
     * @param User|null $user
     * @return bool
     */
    public static function checkUser(?User $user)
    {
        return true;
    }
}
