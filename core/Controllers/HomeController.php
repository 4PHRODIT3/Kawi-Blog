<?php

class HomeController
{
    public function index()
    {
        $query = "SELECT article_id, COUNT(*) AS total_viewers FROM viewers GROUP BY article_id ORDER BY total_viewers DESC LIMIT 0,4";
        $popular_articles_id = App::getData('query_builder')->customQuery($query);

        $data = [
            'articles' => App::getData('query_builder')->retrieve('articles', [], "WHERE is_published != 0 ORDER BY pinned DESC, created_at DESC;"),
            'categories' => App::getData('query_builder')->retrieve('categories'),
            'popular_articles_id' => $popular_articles_id,
        ];
        renderView('index', $data);
    }

    public function detailView()
    {
        $id = is_numeric($_GET['id']) ? $_GET['id'] : null;
        if (!empty($id)) {
            session_start();
            $viewer_data = [
                'name' => isset($_SESSION['user']) ? $_SESSION['user']['name'] : 'Guest',
                'device' => $_SERVER['HTTP_USER_AGENT'],
                'article_id' => $id,
            ];
            App::getData('query_builder')->create('viewers', $viewer_data);

            $article = App::getData('query_builder')->retrieve('articles', ['id' => $id], "AND is_published != 0;")[0];
            $data = ['article' => $article,
                     'author' => App::getData('query_builder')->retrieve('users', ['id' => $article['user_id']])[0],
                     'category' => App::getData('query_builder')->retrieve('categories', ['id' => $article['category_id']])[0],
                    ];
            renderView('article_detail', $data);
        } else {
            renderView('404');
            die();
        }
    }

    public function searchArticles()
    {
        $search_key =cleanString($_GET['q']);
        if (trim($search_key) != "") {
            $data = [
                'search_results' => App::getData("query_builder")->customSearch("SELECT articles.*,categories.title AS category FROM articles LEFT JOIN users ON articles.user_id = users.id  LEFT JOIN categories ON articles.category_id = categories.id WHERE  articles.title LIKE :keywords OR articles.description LIKE :keywords OR articles.contents LIKE :keywords OR categories.title LIKE :keywords OR users.name LIKE :keywords;", ['keywords' => '%'.$search_key.'%']),
                'search_key' => $search_key,
                'recent_articles' => App::getData('query_builder')->retrieve('articles', [], "WHERE is_published != 0 ORDER BY pinned DESC, created_at DESC LIMIT 0,6"),
                'categories' => App::getData('query_builder')->retrieve('categories')
                
            ];
            
            renderView("frontpanel_search", $data);
        } else {
            redirect('/');
        }
    }
    public function contact()
    {
        renderView('contact');
    }
    public function sendMessage()
    {
        $data = $_POST;
        
        if (ReCaptcha::verifyCaptcha($data['g-recaptcha-response'])) {
            $message = [
                'name' => $data['name'],
                'email' => $data['email'],
                'message' => $data['message']
            ];
            curlPostRequest('https://formsubmit.co/f7f8ed2f45aa14c221db88d138b39867', $message);
            redirect('/contact', '?success=Wait reply in your mailbox!');
        } else {
            redirect('/contact', '?error=Fill I\'m not a robot!');
        }
    }
}
