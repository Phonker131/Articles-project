<div class = "main-container">
    <div class = "table-container">
        <h1 id="title-main">Search</h1>
        <?php
        require './config/project_config.php';
        echo "<form action=\"{$base_dir}/search\" method='GET'>";
        echo "<input id='article' type=\"text\" name=\"query\" maxlength='32'/>";
        ?>
        <input type="submit" class="search" value="Search">
        </form>

        <h1 id="title-main">Article List</h1>
        <table class = "article-table">
            <?php
            require './config/project_config.php';
            foreach ($data as $article)
            {
                echo "<tr class='article'  id=\"article{$article -> getArticleID()}\"><td class='article-name'>{$article -> getName()}</td><td><a id='show-edit' style='text-decoration:none' href=\"{$base_dir}/article/{$article -> getArticleID()}\">Show</a></td><td><a id='show-edit' style='text-decoration:none' href=\"{$base_dir}/edit_article/{$article -> getArticleID()}\">Edit</a></td><td><a id='delete-button' style='text-decoration:none' onclick=\"removeArticle({$article -> getArticleID()})\" href=\"#\">Delete</a></td></tr>";
            }

            ?>
        </table>
    </div>
    <button type="button" class = "prev">Previous</button>

    <button type="button" class = "next">Next</button>
    <?php
    echo "<h3 class='number-articles'></h3>";
    ?>
    <button type="button" class="open-modal">Create article</button>
    <div id="modal-window">
        <label>Name</label>
        <input type = "text"  id = "article-name"/>
        <button type = "button" class = "cancel">Cancel</button>
        <button type = "button" class = "create" disabled="disabled">Create</button>
    </div>
</div>