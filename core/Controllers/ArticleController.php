<?php

class ArticleController
{
    public function index()
    {
        $data = ['categories' => App::getData('query_builder')->retrieve('categories')];
        renderView('article_add', $data);
    }
    public function createArticle()
    {
        $auth = Authorization::checkAuthor();
        $article_data = $_POST;
        
        if (checkCSRF($article_data['csrf_token'])) {
            if (validateForm($article_data)) {
                App::getData('query_builder')->create('articles', ['title' => $article_data['article_title'],'description' => $article_data['article_description'],'contents' => $article_data['article_contents'],'category_id' => $article_data['category_id'],'user_id' => $auth['id']]);
                redirect('/article/manipulate', '?success=Action Confirmed! Hope You Get More Viewers.');
            } else {
                redirect('/article', '?error=Please Fill Required Fields');
            }
        } else {
            renderView('403');
        }
    }
    public function mainpulateArticle()
    {
        $data = ['articles' => App::getData('query_builder')->retrieve('articles'),
                 'categories' => App::getData('query_builder')->retrieve('categories'),
                 'users' =>  App::getData('query_builder')->retrieve('users')
                ];
        renderView('articles', $data);
    }

    public function editArticle()
    {
        $article_id = $_GET['id'];
        $auth = Authorization::checkAuthor();
        if (isset($article_id) && isset($auth)) {
            $data = ['previous_data' => App::getData('query_builder')->retrieve('articles', ['id' => $article_id])[0],
                     'categories' => App::getData('query_builder')->retrieve('categories'),
                    ];
            renderView('manipulate_article', $data);
        } else {
            redirect('/article/manipulate', '?error=Missing Post ID');
        }
    }

    public function updateArticle()
    {
        $auth = Authorization::checkAuthor();
        $article_data = $_POST;
        
        if (checkCSRF($article_data['csrf_token'])) {
            if (validateForm($article_data)) {
                App::getData('query_builder')->update('articles', ['title' => $article_data['article_title'],'description' => $article_data['article_description'],'contents' => $article_data['article_contents'],'category_id' => $article_data['category_id'],'user_id' => $auth['id']], ['id' => $article_data['id']]);
                redirect('/article/manipulate', '?success=Edit Successfully!');
            } else {
                redirect('/article', '?error=Please Fill Required Fields');
            }
        } else {
            renderView('403');
        }
    }

    public function deleteArticle()
    {
        $article_id = $_GET['id'];
        $auth = Authorization::checkAuthor();
        if (checkCSRF($_GET['csrf_token'])) {
            App::getData('query_builder')->delete('articles', ['id' => $article_id]);
            redirect('/article/manipulate', '?success=Delete Successfully');
        } else {
            renderView('403');
        }
    }
}
