<?php

class CategoryController
{
    public function index()
    {
        $data = ['categories' => App::getData('query_builder')->retrieve('categories')];
        renderView('category', $data);
    }

    public function createCategory()
    {
        $category_data = $_POST;
        if (!isset($category_data['user_id']) || !isset($category_data['category_name'])) {
            redirect('/category', '?error=Fill out all Informations!');
        }
        App::getData('query_builder')->create('categories', [
            'title' => $category_data['category_name'],
            'user_id' => $category_data['user_id'],
        ]);
        redirect('/category', '?success=Added Successfully!');
    }
    public function manipulateCategory()
    {
        $data = ['categories' => App::getData('query_builder')->retrieve('categories')];
        renderView('manipulate_category', $data);
    }

    public function editCategory()
    {
        $edit_data = $_POST;
        if (!isset($_POST['category_id']) || !isset($_POST['category_name'])) {
            redirect('/category/manipulate', '?error=Please fill all the fields!');
        }
        App::getData('query_builder')->update('categories', ['title' => $_POST['category_name']], ['id' => $_POST['category_id']]);
        redirect('/category/manipulate', '?success=Updated Successfully!');
    }

    public function deleteCategory()
    {
        $id = $_GET['id'];
        if (!isset($id)) {
            redirect("/404");
        }
        App::getData('query_builder')->delete("categories", ['id' => $id]);
        redirect("/category/manipulate", "?success=Deleted Successfully");
    }
}
