<?php
require './config/project_config.php';
echo "<h1 id='show-title'>{$data->getName()}</h1>";
echo "<p id='show-article-content'>{$data -> getContent()}</p>";
echo "<a id='edit-button' style='text-decoration:none' href=\"{$base_dir}/edit_article/{$data -> getArticleID()}\">Edit</a>";
echo "<a style='text-decoration:none' id='back-button-show' href={$base_dir}/articles>Back to articles</a>"
?>


