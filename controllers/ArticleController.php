<?php

class ArticleController{

    private $model;

    function __construct($model)
    {
        $this->model=$model;
    }



    function getArticles(){
        $template_name = "_all_articles_template";
        $all_articles = $this->model -> getAll();
        $this->render_template($template_name, $all_articles);
    }




    function getEditArticle($article_ID){
        $article = $this->model -> get_by_ID($article_ID);
        if($article == null){
            http_response_code(404);
        }
        else {
            $template_name = '_edit_article_template';
            $this->render_template($template_name, $article);
        }
    }


    function postEditArticle($article_ID, $name, $content){
        require './config/project_config.php';
        $article =new Article($article_ID,$name,$content);
        $this->model -> edit($article);

        header('Location: '.$base_dir.'/articles');

    }

    //function postArticle($article_name){

    function getArticle($article_ID,$search){
        $article = $this->model -> get_by_ID($article_ID);
        if($article == null){
            http_response_code(404);

        }
        else if($search==''){
            $template_name = '_show_article_template';
            $this->render_template($template_name, $article);
        }
        else{
           $data=['article'=>$article,'query'=>$search];
            $template_name = '_search_article_template';
            $this->render_template($template_name, $data);

        }

    }



    function postArticle($article_name){
        $insert_result =  $this->model-> create($article_name);
        echo json_encode(['result'=>$insert_result]);
    }

    function deleteArticle($article_ID){
        $result = $this->model -> delete($article_ID);
        echo json_encode(['result'=>$result]);
    }

    function getSearch($query)
    {

        $result = $this -> model -> search($query);
        $data=['query'=>$query,'ar'=>$result];
        $template_name = "_search_template";
        $this->render_template($template_name, $data);
    }


    function render_template($template_name, $data){
        require './templates/_header.php';
        require './templates/'.$template_name.'.php';
        require './templates/_footer.php';
    }


}