<?php

class CategoryController
{
    public function index()
    {
        $auth = Authorization::checkSuperUser();
        $data = ['categories' => App::getData('query_builder')->retrieve('categories')];
        renderView('categories', $data);
    }

    public function createCategory()
    {
        $auth = Authorization::checkSuperUser();
        $category_data = $_POST;
        if (!isset($category_data['user_id']) || !isset($category_data['category_name'])) {
            redirect('/category', '?error=Fill out all Informations!');
        }
        App::getData('query_builder')->create('categories', [
            'title' => strip_tags(trim($category_data['category_name'])),
            'user_id' => $category_data['user_id'],
        ]);
        redirect('/category', '?success=Added Successfully!');
    }
    public function manipulateCategory()
    {
        $auth = Authorization::checkSuperUser();
        $data = ['categories' => App::getData('query_builder')->retrieve('categories')];
        renderView('manipulate_category', $data);
    }

    public function editCategory()
    {
        $auth = Authorization::checkSuperUser();
        if (!isset($_POST['category_id']) || !isset($_POST['category_name'])) {
            redirect('/category/manipulate', '?error=Please fill all the fields!');
        }
        App::getData('query_builder')->update('categories', ['title' => strip_tags(trim($_POST['category_name']))], ['id' => $_POST['category_id']]);
        redirect('/category/manipulate', '?success=Updated Successfully!');
    }

    public function deleteCategory()
    {
        $auth = Authorization::checkSuperUser();
        $id = $_GET['id'];
        if (!isset($id)) {
            redirect("/404");
        }
        App::getData('query_builder')->delete("categories", ['id' => $id]);
        redirect("/category/manipulate", "?success=Deleted Successfully");
    }
}
