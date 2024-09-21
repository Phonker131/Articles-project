<?php
require './config/project_config.php';
echo "<form action=\"{$base_dir}/edit_article/{$data->getArticleID()}\" method='POST'>";
echo "<input id='article-name' type=\"text\" name=\"name\" value=\"{$data->getName()}\" maxlength='32'/>";
echo "<textarea name='content' rows='20' cols='55' maxlength='1024'>{$data -> getContent()}</textarea>"
?>
    <input type="submit" class="create" value="Save" disabled="disabled">
</form>
<?php
echo "<a id='back-edit' href={$base_dir}/articles style='text-decoration: none'>Back to articles</a>"
?>
