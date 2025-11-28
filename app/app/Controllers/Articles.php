<?php

namespace App\Controllers;

use App\Models\ArticleModel;

use App\Entities\Article;

class Articles extends BaseController
{
    private ArticleModel $model;

    public function __construct()
    {
        helper('form');
        $this->model = new ArticleModel();
    }

    public function index(): string
    {
        return view('Articles/index', ['articles' => $this->articleModel->findAll()]);
    }

    public function show($id): string
    {
        $article = $this->model->find($id);

        if (!$article) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Article with ID {$id} not found.");
        }

        return view('Articles/show', ['article' => $article]);
    }

    public function new(): string
    {
        return view('Articles/new', ['article' => new Article()]);
    }

    public function create()
    {
        $article = new Article($this->request->getPost([
            'title',
            'content',
        ]));

        $id = $this->model->insert($article);

        if (!$id) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors())->withInput();
        }

        return redirect()->to('/articles/' . $id)->with("messages", "Article created successfully.");
    }   

    public function edit($id)
    {
        return view('Articles/edit', ['article' => (new ArticleModel())->find($id)]);
    }   

    public function update($id)
    {
        $article = $this->model->find($id);

        $article->fill($this->request->getPost());

        if (!$article->hasChanged()) {
            return redirect()->back()->withInput()->with('messages', 'No changes detected.')->withInput();
        }

        if (!$this->model->save($article)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors())->withInput();
        }

        return redirect()->to('/articles/' . $id)->with("messages", "Article updated successfully.");
    }   
}
