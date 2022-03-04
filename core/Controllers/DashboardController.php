<?php

class DashboardController
{
    public function searchArticle()
    {
        $search_key = $_GET['q'];
        Authorization::checkAuthor();

        if (trim($search_key) != "") {
            $data = [
                'search_results' => App::getData("query_builder")->customSearch("SELECT articles.*,categories.title AS category,users.name AS username FROM articles LEFT JOIN users ON articles.user_id = users.id  LEFT JOIN categories ON articles.category_id = categories.id WHERE articles.title LIKE :keywords OR description LIKE :keywords OR contents LIKE :keywords OR categories.title LIKE :keywords OR users.name LIKE :keywords;", ['keywords' => '%'.$search_key.'%']),
                'search_query' => $search_key,
            ];
            renderView("articles", $data);
        } else {
            redirect('/article/manipulate');
        }
    }
    public function adminPanel()
    {
        $auth = Authorization::checkAuthor();
        $data = [
            'viewers' => App::getData("query_builder")->customQuery("SELECT *, CAST(viewed_at AS DATE) AS date FROM viewers WHERE viewed_at >= DATE_ADD(NOW(), INTERVAL -10 DAY)"),
            'recent_articles' => App::getData("query_builder")->customQuery("SELECT articles.title, COUNT(*) AS total_viewers FROM articles  JOIN viewers ON articles.id = viewers.article_id GROUP BY article_id ORDER BY articles.created_at DESC LIMIT 0,3"),
            'total_users' => App::getData("query_builder")->customQuery("SELECT COUNT(id) AS total FROM users WHERE 1")[0],
            'total_subscribers' => App::getData("query_builder")->customQuery("SELECT COUNT(id) AS total FROM subscribers WHERE 1")[0],
            'total_articles' => App::getData("query_builder")->customQuery("SELECT COUNT(id) AS total FROM articles WHERE 1")[0],
        ];
        return renderView('panel', $data);
    }
}
