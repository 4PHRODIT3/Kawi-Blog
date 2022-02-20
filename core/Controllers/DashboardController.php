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
}
