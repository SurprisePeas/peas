<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin/article/index')->withArticles(Article::all());
    }

    public function create()
    {
        return view('admin/article/create');
    }

    public function edit($id)
    {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }


    public function destroy($id)
    {
        $article = Article::find($id);
        $title = $article->title;
        $article->delete();
        return redirect()->back()->withInput()->withErrors($title . ' 删除成功');
    }
    
    /**
     * 文章添加
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) // 依赖注入系统会自动初始化需要的 Request 类
    {
        // 验证数据
        $this->validate($request, [
            'title' => 'required|unique:articles|max:255',
            'body'  => 'required'
        ]);

        $article = new Article;
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;
        if($article->save()){
            return redirect('admin/article');
        }else{
            // 数据添加失败, 返回上一层页面并保留用户输入的数据
            return redirect()->back()->withInput()->withErrors('保存失败');
        }
    }

    public function update(Request $request,$id)
    {
        $article = Article::find($id);
        $article->title = $request->get('title');
        $article->body = $request->get('body');
        $article->user_id = $request->user()->id;
        if($article->save()){
            return redirect('admin/article');
        }else{
            // 数据添加失败, 返回上一层页面并保留用户输入的数据
            return redirect()->back()->withInput()->withErrors('保存失败');
        }
    }

}
