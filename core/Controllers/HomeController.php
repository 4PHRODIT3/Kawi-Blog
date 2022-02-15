<?php

class HomeController
{
    public function index()
    {
        $query = "SELECT article_id, COUNT(*) AS total_viewers FROM viewers GROUP BY article_id ORDER BY total_viewers DESC LIMIT 0,3";
        $popular_articles_id = App::getData('query_builder')->customQuery($query);

        $data = [
            'articles' => App::getData('query_builder')->retrieve('articles', [], " ORDER BY pinned DESC, created_at DESC"),
            'categories' => App::getData('query_builder')->retrieve('categories'),
            'popular_articles_id' => $popular_articles_id,
        ];
        renderView('index', $data);
    }

    public function detailView()
    {
        $id = $_GET['id'];
        if (isset($id)) {
            session_start();
            $viewer_data = [
                'name' => isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'Guest',
                'device' => $_SERVER['HTTP_USER_AGENT'],
                'article_id' => $id,
            ];
            App::getData('query_builder')->create('viewers', $viewer_data);

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
