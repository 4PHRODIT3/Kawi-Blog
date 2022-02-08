<?php

class HomeController
{
    public function index()
    {
        $data = [
            'articles' => App::getData('query_builder')->retrieve('articles'),
            'categories' => App::getData('query_builder')->retrieve('categories'),
        ];
        renderView('index', $data);
    }

    public function detailView()
    {
        $id = $_GET['id'];
        if (isset($id)) {
            $article = App::getData('query_builder')->retrieve('articles', ['id' => $id])[0];
            $data = ['article' => $article,
                     'author' => App::getData('query_builder')->retrieve('users', ['id' => $article['user_id']])[0],
                     'category' => App::getData('query_builder')->retrieve('categories', ['id' => $article['category_id']])[0],
                    ];
            renderView('article_detail', $data);
        } else {
            renderView('404');
        }
    }
}
