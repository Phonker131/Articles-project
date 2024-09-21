<div class = "main-container">
    <div class = "table-container">

        <h1 id="title-main">Article List</h1>
        <table class = "article-table">
            <?php
            require './config/project_config.php';
            $query = $data['query'];
            foreach ($data['ar'] as $article)

            {
                $article_name= str_replace($query,"<span style='background:yellow'>{$query}</span>",$article -> getName());
                $article_content= str_replace($query,"<span style='background:yellow'>{$query}</span>",$article -> getContent());

                echo "<tr class='article'  id=\"article{$article -> getArticleID()}\"><td class='article-name'>{$article_name}</td><td class='article-content'>{$article_content}</td><td><a id='show-edit' style='text-decoration:none' href=\"{$base_dir}/article/{$article -> getArticleID()}?search={$data['query']}\">Show</a></td></tr>";
            }

            ?>
        </table>
    </div>
    <button type="button" class = "prev">Previous</button>

    <button type="button" class = "next">Next</button>
    <?php
    require './config/project_config.php';

    echo "<h3 class='number-articles'></h3>";
    echo "<a style='text-decoration:none' id='back-button' href={$base_dir}/articles>Back to articles</a>"
    ?>


</div>
</div>