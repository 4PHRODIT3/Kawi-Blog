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
        $img = $_FILES;
        if (checkCSRF($article_data['csrf_token'])) {
            if (validateForm($article_data)) {
                $img_name = insertImageToDB($img);
                App::getData('query_builder')->create('articles', [
                    'title' => cleanString($article_data['article_title']),
                    'description' => cleanString($article_data['article_description']),
                    'contents' => cleanString($article_data['article_contents']),
                    'category_id' => is_numeric($article_data['category_id']) ? $article_data['category_id'] : "1" ,
                    'user_id' => $auth['id'],
                    'duration' => is_numeric($article_data['duration']) ? (int) $article_data['duration'] : 3,
                    'header_img' => !empty($img_name) ? $img_name : null,
                ]);
                redirect('/article/manipulate', '?success=Action Confirmed! Hope You Get More Viewers.');
            } else {
                redirect('/article', '?error=Please Fill Required Fields');
            }
        } else {
            renderView('403');
            die();
        }
    }
    public function mainpulateArticle()
    {
        $data = ['articles' => App::getData('query_builder')->retrieve('articles', [], "ORDER BY created_at DESC"),
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
        $img = $_FILES;
        if (checkCSRF($article_data['csrf_token'])) {
            if (validateForm($article_data)) {
                $insert_data = [
                    'title' => cleanString($article_data['article_title']),
                    'description' => cleanString($article_data['article_description']),
                    'contents' => cleanString($article_data['article_contents']),
                    'category_id' => $article_data['category_id'],
                    'user_id' => $auth['id'],
                    'duration' => is_numeric($article_data['duration']) ? (int) $article_data['duration'] : 3,
                    'updated_at' => date('Y-m-d H:i:s', time()),
                ];
                if ($_FILES['content_img']['name'] != "") {
                    $img_name = insertImageToDB($img);
                    if (!empty($img_name)) {
                        $insert_data['header_img'] = $img_name;
                    }
                }

                App::getData('query_builder')->update('articles', $insert_data, [
                    'id' => $article_data['id']
                ]);
                redirect('/articles?id='.$article_data['id'], '?success=Edit Successfully!');
            } else {
                redirect('/article', '?error=Please Fill Required Fields');
            }
        } else {
            renderView('403');
            die();
        }
    }

    public function deleteArticle()
    {
        $article_id = $_GET['id'];
        $auth = Authorization::checkSuperUser();
        if (checkCSRF($_GET['csrf_token'])) {
            App::getData('query_builder')->delete('articles', ['id' => $article_id]);
            redirect('/article/manipulate', '?success=Delete Successfully');
        } else {
            renderView('403');
            die();
        }
    }

    public function previewArticle()
    {
        $article_id = $_GET['id'];
        $auth = Authorization::checkAuthor();

        if (isset($article_id)) {
            $article = App::getData('query_builder')->retrieve('articles', ['id' => $article_id])[0];
            $data = [
                'article' => $article,
                'author' => App::getData('query_builder')->retrieve('users', ['id' => $article['user_id']])[0],
                'category' => App::getData('query_builder')->retrieve('categories', ['id' => $article['category_id']])[0],
                'viewers' => App::getData('query_builder')->retrieve('viewers', ['article_id' => $article_id ])
            ];
            renderView('preview_article', $data);
        } else {
            renderView('404');
            die();
        }
    }

    public function pinArticle()
    {
        $article_id = is_numeric($_GET['id']) ? $_GET['id'] : 0;
        
        $auth = Authorization::checkAuthor();

        if (isset($article_id)) {
            $pin = 1;
            
            if ($_GET['action'] === 'false') {
                $pin = 0;
            }
            
            App::getData('query_builder')->update('articles', ['pinned' => $pin], ['id' => $article_id]);
            redirect("/articles?id=$article_id", '&success=Action Successful!');
        } else {
            renderView('404');
            die();
        }
    }

    public function publishArticle()
    {
        $auth = Authorization::checkAuthor();
        $article_id = is_numeric($_GET['id']) ? $_GET['id'] : 0;

        if ($article_id !== 0 && checkCSRF($_GET['csrf_token'])) {
            $publish = 1;
            if ($_GET['action'] === 'false') {
                $publish = 0;
            }
            App::getData('query_builder')->update('articles', ['is_published' => $publish], ['id' => $article_id]);
            redirect("/articles?id=$article_id", '&success=Action Successful!');
        } else {
            renderView('404');
            die();
        }
    }
}
