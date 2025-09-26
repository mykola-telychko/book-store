/**
 * Class ModelAdmin
 *
 * Handles administrative operations for the book store application, including user management,
 * book management, and author/genre relations. Uses PDO for database interactions.
 *
 * Methods:
 * - __construct(): Initializes the database connection.
 * - getAdmin(): Authenticates an admin user based on POST data.
 * - insertUsers(): Inserts a new user into the database using POST data.
 * - selectUsers(): Retrieves all users from the database.
 * - selectOneUser(): Retrieves a single user by ID from GET data.
 * - updateUser(): Updates user information based on POST data.
 * - getBook(): Retrieves all books with their genres.
 * - getAuthor(): Retrieves all authors grouped by book.
 * - changeBook($id): Updates book and genre information based on POST data.
 * - addBook(): Adds a new book, author, and genre using POST data.
 * - delBook($id): Deletes a book by its ID.
 *
 * Note:
 * - Many methods rely on direct access to $_POST and $_GET superglobals.
 * - SQL queries are constructed using string interpolation, which may be vulnerable to SQL injection.
 * - Passwords are hashed using md5, which is not recommended for secure password storage.
 */
<?php

class ModelAdmin
{
    private $dbh;

    public function __construct()
    {
        try {

            $this->dbh = new PDO('mysql:host='. conf::HOST .';dbname=teststore','root','');
            // "mysql:host=".conf::HOST.";dbname=".conf::DB.",".conf::USER.",".conf::PASS."");

        } catch (PDOException $e) {

          echo $e->getMessage();

        }
    }


    public function getAdmin()
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->dbh->query($sql);

        while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ){

            if ( $row['login'] == $_POST['login'] &&
                 $row['password'] == md5($_POST['password']) &&
                 $row['role'] == $_POST['role'] ) {

            $_SESSION['role'] = $_POST['role'];
            $_SESSION['id'] = $row['id'];

                 }
        }

    }



    public function insertUsers()
    {
        $login = $_POST['name'];

        $password = $_POST['password'];

        $role = $_POST['role'];

        $sql = "INSERT INTO users(
                login, password, role)
                VALUES('$login', '$password', '$role');";

        $res = $this->dbh->exec($sql);

        if ( $res == 0 ) {

            $error = $dbh->errorinfo();

            echo $error[2];

        }

        return false;
    }



    public function selectUsers()
    {
        $sql = "SELECT * FROM users";

        $stmt = $this->dbh->query($sql);

        return $stmt->fetchAll();
    }



    public function selectOneUser()
    {
        $sql = "SELECT * FROM users WHERE id = ".$_GET['id_edit'];

        $stmt = $this->dbh->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }



    public function updateUser()
    {
        $upname = $_POST['upname'];
        $uppassword = md5($_POST['uppassword']);
        $uprole = $_POST['uprole'];
        $upid = $_POST['upid'];

        $sql = "UPDATE users SET
                login='$upname',
                password='$uppassword',
                role='$uprole'
                WHERE id = '$upid'";

        $this->dbh->exec($sql);

        if ( $res == 0 ) {

            $error = $this->dbh->errorinfo();
            echo $error[2];

        }

        return false;
    }



    public function getBook()
    {
        $sql = "SELECT `books`.id, `title`, `description`, `body`,
                `price`, `image`, books_genres.genre_id AS id_cat
                FROM `books` JOIN books_genres
                ON books.id=books_genres.book_id ORDER BY id DESC";

        $stmt = $this->dbh->query($sql);

        $bookset = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $bookset;
    }



    public function getAuthor()
    {
        $sql1 = "SELECT books_authors.book_id AS id,
                 GROUP_CONCAT(name) AS author FROM `authors`
                 JOIN `books_authors`
                 ON authors.id=books_authors.author_id
                 GROUP BY book_id
                 ORDER BY book_id DESC";

        $stmt1 = $this->dbh->query($sql1);

        $bookset2 = $stmt1->fetchAll(PDO::FETCH_ASSOC);

        return $bookset2;
    }



    public function changeBook($id)
    {
        $id =  strip_tags(substr(trim($_POST['id']), 0, 5));

        $name =  strip_tags(substr(trim($_POST['name']), 0, 200));

        $author = strip_tags(substr(trim($_POST['author']), 0, 200));

        $description =  strip_tags(substr(trim($_POST['description']), 0, 100));

        $body =  strip_tags(substr(trim($_POST['body']), 0, 500));

        $price = strip_tags(substr(trim($_POST['price']), 0, 5));

        $image = strip_tags(substr(trim($_POST['image']), 0, 8));

        $category = strip_tags(substr(trim($_POST['category']), 0, 5));


        $sql2 = "UPDATE `books_genres`
                 SET `genre_id` = '$category'
                 WHERE `book_id` = ".$id.";UPDATE `books` SET `title`='$name',
                `description`='$description', `body`= '$body',`price` = '$price',
                `image` = '$image' WHERE `id` =".$id."";

        $stmt2 = $this->dbh->query($sql2);

        return $stmt2;
    }






    public function addBook()
    {
        $name =  strip_tags(substr(trim($_POST['name']), 0, 200));

        $author = strip_tags(substr(trim($_POST['author']), 0, 200));

        $description =  strip_tags(substr(trim($_POST['description']), 0, 100));

        $body =  strip_tags(substr(trim($_POST['body']), 0, 500));

        $price = strip_tags(substr(trim($_POST['price']), 0, 5));

        $image = strip_tags(substr(trim($_POST['image']), 0, 5));

        $category = strip_tags(substr(trim($_POST['category']), 0, 2));

        # add book
        $sql = "INSERT INTO
                `books`( `title`, `description`,
                `body`, `price`, `image`)
                VALUES
                ('$name','$description','$body','$price','$image');";

        $stmt = $this->dbh->query($sql);

        $book_id = $this->dbh->lastInsertId();

        # add authors
        $sql1 = "INSERT INTO `authors`( `name`)
                 VALUES ('$author')";

        $stmt1 = $this->dbh->query($sql1);

        $author_id = $this->dbh->lastInsertId();

        # load data to relation table
        $sql3 = "INSERT INTO `books_authors`(`book_id`, `author_id`)
                 VALUES ('$book_id', '$author_id')";

        $stmt = $this->dbh->query($sql3);

        # add genre
        $sql4 = "INSERT INTO `books_genres`(`book_id`, `genre_id`)
                 VALUES ('$book_id', '$category')";

        $stmt = $this->dbh->query($sql4);

        if ( $stmt ) {echo 1;} else { echo 0;};

        return $stmt;

    }



    public function delBook($id)
    {
        $sql = "DELETE FROM `books` WHERE id = " . $id;

        $stmt = $this->dbh->query($sql);

        return $stmt;
    }
}
