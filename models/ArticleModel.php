<?php


require_once './models/Article.php';


class ArticleModel//
{
//Business logic of refactoring data
    private $mysqli;


    function __construct($db_config)
    {
       // require_once './config/db_config.php';
        $this->mysqli = new mysqli($db_config['server'], $db_config['login'], $db_config['password'],
            $db_config['database']);



    }

    public function getAll(){
        $query = "SELECT * FROM articles";
        $articles = [];
        if ($result = $this ->mysqli -> query($query)) { // $result contains mysqli_result object representing the result set or FALSE
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {
                $articles[] = new Article($row["article_id"], $row["article_name"],$row["article_content"]);
                // access $row["Column1"], $row["Column2"], ...
            }
        }
        return $articles;

}
    public function get_by_ID($ID)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM articles where article_id=?");
        $stmt->bind_param('i', $ID);
        $stmt->execute();
        $query_result = $stmt->get_result();
        $article = null;
        if ( $query_result) { // $result contains mysqli_result object representing the result set or FALSE
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc( $query_result)) {
                $article = new Article($row["article_id"], $row["article_name"],$row["article_content"]);
                // access $row["Column1"], $row["Column2"], ...
            }
        }
        return $article;
    }

    public function edit($article)
    {
        //Prepare statement
        $stmt = $this->mysqli->prepare("UPDATE articles set article_name= ? ,article_content= ? where article_id=?");
        $article_id = $article->getArticleID();
       $article_name = $article->getName();
       $article_content = $article->getContent();
        $stmt->bind_param('ssi',$article_name,$article_content, $article_id);
        return $stmt->execute();


    }

public function create($article_name){
        //Create article
    $stmt = $this->mysqli->prepare("INSERT INTO articles (article_name) VALUES (?)");
    $stmt->bind_param('s',$article_name);
    try {
    if($stmt->execute()){
        return $stmt->insert_id;
    }
    } catch (Exception $e) {
       echo $e->getMessage();
    }

    return null;
}

public function delete($ID)
{
    $stmt = $this->mysqli->prepare("DELETE FROM articles where article_id=?");
    $stmt->bind_param('i',$ID);
    $stmt->execute();
    return $stmt->affected_rows > 0;

}

    public function search($query){
        $sql = "SELECT article_id,article_name, article_content FROM articles WHERE article_name LIKE ? 
                                                      OR article_content LIKE ? ORDER BY CASE 
                               WHEN article_name LIKE ? THEN 1 ELSE 2  END, article_name";

        $stmt=null;
        try {

        $stmt = $this->mysqli->prepare($sql);

        $query_like='%'.$query.'%';
        $stmt->bind_param('sss', $query_like,$query_like,$query_like);


        $stmt->execute();
        } catch (Exception $e) {
            var_dump($e);
        }

        $query_result = $stmt->get_result();
        $articles = [];
        if ( $query_result) { // $result contains mysqli_result object representing the result set or FALSE
            /* fetch associative array */
            while ($row = mysqli_fetch_assoc( $query_result)) {
                $articles[] = new Article($row["article_id"], $row["article_name"],$row["article_content"]);
                // access $row["Column1"], $row["Column2"], ...
            }
        }
        return $articles;



    }


}
