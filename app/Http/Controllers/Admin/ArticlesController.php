<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\ArticleRepositoryInterface as ArticleRepository;
use Auth;
use App\Models\Article;

class ArticlesController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $repository)
    {
        $this->articleRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $articles = $this->articleRepository->findAllBy('status', $request->status)->paginate(config('common.paging_number'));

        return view('admins.articles.index', compact('status', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);

        if (isset($article)) {
            return view('admins.articles.show', compact('article'));
        } else {
            abort(404, trans('admin.errors.404_article'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = $this->articleRepository->find($id);
        //unactive article
        if ($article->status == config('common.article.status.activated')) {
            $article->status = config('common.article.status.unactivated');
            $article->save();

        return redirect()->action('Admin\ArticlesController@index', ['status' => config('common.article.status.unactivated')])
            ->with('success', trans('session.articles.article_unactive_success'));
        } elseif ($article->status == config('common.article.status.unactivated')) {
            $article->status = config('common.article.status.activated');
            $article->save();

            return redirect()->action('Admin\ArticlesController@index', ['status' => config('common.article.status.activated')])
            ->with('success', trans('session.articles.article_active_success'));
        } else {
            return redirect()->action('Admin\ArticlesController@index', ['status' => config('common.article.status.activated')])->with('errors', trans('session.articles.article_not_found'));
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->articleRepository->delete($id);

        return redirect()->action('Admin\ArticlesController@index', ['status' => config('common.garage.status.activated')])
            ->with('success', trans('session.articles.article_delete_success'));
    }
}
