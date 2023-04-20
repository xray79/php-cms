<?php

use App\Core\Request;

class QueryBuilder
{
    // QueryBuilder handles queries to the db and db related methods
    // wrapper around pdo instance
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        // PDO instance is required for querybuilder to work, required in constructor
        $this->pdo = $pdo;
    }

    public function update(string $table, array $parameters)
    {
        // $table mytodo.pages
        // $parameters (TODO) [title, "new_title", text, "new_text", id, "id"]

        // UPDATE mytodo.pages 
        // SET title = "new_title", text = "new_text"
        // WHERE title = "old_title";

        // create sql query to update titles and text based on an id
        // vprintf operates in the same way as sprintf but accepts an array
        $sql = vsprintf(
            'UPDATE %s 
            SET %s = "%s", %s = "%s"
            WHERE %s = "%d"',
            array_merge([$table], $parameters)
        );

        // attempt to run the query and catch any errors
        try {
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die('something went wrong');
        }
    }

    public function getPostIdFromUri(string $uri)
    {
        // based on the uri passed in,
        // return the correct post id
        $id = 0;

        switch ($uri) {
            case '':
                $id = 1;
                break;
            case 'about':
                $id = 2;
                break;
            case 'contact':
                $id = 3;
                break;
        }

        return $id;
    }

    public function getPost()
    {
        // get trimmed uri from e.g about, home, contact
        try {
            $uri = Request::uri();
            $id = $this->getPostIdFromUri($uri);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        $statement = $this->pdo->prepare("SELECT title, text FROM mytodo.pages WHERE id = '{$id}'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }

    public function getCurrentValues(string $uri)
    {
        // based on uri return all values (title, text) for the post
        try {
            $id = $this->getPostIdFromUri($uri);
        } catch (Exception $e) {
            die($e->getMessage());
        }

        $statement = $this->pdo->prepare("SELECT title, text FROM mytodo.pages WHERE id = '{$id}'");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
    }
}
