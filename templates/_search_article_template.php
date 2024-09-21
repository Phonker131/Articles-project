<?php
require './config/project_config.php';


$article = $data['article'];
$query = $data['query'];
$article_name= str_replace($query,"<span id='show-title-search' style='background:yellow'>{$query}</span>",$article -> getName());
$article_content= str_replace($query,"<span style='background:yellow'>{$query}</span>",$article -> getContent());

echo "<h1 id='show-title-search'>{$article_name}</h1>";
echo "<p id='show-article-content'>{$article_content}</p>";
echo "<a id='edit-button' style='text-decoration:none' href=\"{$base_dir}/edit_article/{$article -> getArticleID()}\">Edit</a>";
echo "<a style='text-decoration:none' id='back-button-show' href={$base_dir}/search?query={$query}>Back to articles</a>";
?>