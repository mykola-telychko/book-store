/**
 * Class Model
 *
 * Extends the Database class and provides methods for interacting with the book store database.
 * Handles operations such as retrieving menu genres, book content, pagination, book details, prices,
 * inserting orders into the basket, and searching for books/authors.
 *
 * Methods:
 * - getMenu(): Retrieves all genres from the database.
 * - db_result_to_array($result): Converts a MySQL result set to an array.
 * - getContent(): Retrieves book and author information for a specific category and page.
 * - getPage(): Generates pagination links for book categories.
 * - getBook($id): Retrieves detailed information about a specific book and its author.
 * - getPrice($id): Retrieves the price of a book by its ID.
 * - insertBusket(): Inserts order information into the database for items in the user's cart.
 * - getSearch(): Searches for books or authors based on a search term.
 *
 * Note:
 * - Uses deprecated MySQL extension functions (mysql_query, mysql_fetch_array, etc.).
 * - Input data is sanitized using mysql_real_escape_string and strip_tags.
 * - Relies on session variables for cart and order management.
 * - Some methods interact with a Controller class for URL parsing and error handling.
 */
<?php


class Model extends Database
{

    public function getMenu()
    {
        $sql = "SELECT * FROM `genres`";

        $query = mysql_query($sql) or die(mysql_error());

        return $this->db_result_to_array($query);
    }



    public function db_result_to_array($result)
    {
        $res_array = array();

        for ( $i=0; $row = mysql_fetch_array($result); $i++ ) {

            $res_array[$i] = $row;

        }

        return $res_array;

    }



    public function getContent()
    {
        $controller = new Controller();

        $url = $controller->getUrl();

        $sql = "SELECT * FROM `book_cat` JOIN `author` ON book_cat.id=author.id
                WHERE id_cat=".$url[1]."
                ORDER BY book_cat.id DESC LIMIT ".$url[2].",".conf::PerPage;

        $query = mysql_query($sql) or die(mysql_error());

        return $this->db_result_to_array($query);
    }



    public function getPage()
    {
        $controller = new Controller();

        $url = $controller->getUrl();

        $arr = array();

        $sql = "SELECT id FROM book_cat
                WHERE id_cat =" . $url[1];# quantity records


        $query = mysql_query($sql) or die(mysql_error());

        $row = mysql_num_rows($query);

        $pages = ceil($row/conf::PerPage);


        if ( $url[2] >= $row) {
            $controller->getError();
            return false;
        }

        for ( $i=0; $i < $pages; $i++ ) {

            $link ='<a href="http://';
            //$link .= Config::HOST;
            $link .= '/';
            $link .= conf::NameSite;
            $link .= '/';
            $link .= $url[0];
            $link .= '/';
            $link .= $url[1];
            $link .= '/';
            $link .= ($i * conf::PerPage);
            $link .= '">|';
            $link .= ($i + 1);
            $link .= '</a>';

            $array[$i] = $link;
        }

        return $array;
    }



    public function getBook($id)
    {
        $sql = "SELECT * FROM `book_cat`
                JOIN `author` ON book_cat.id=author.id
                WHERE book_cat.id=". $id;//$url[3];

        $query = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_row($query);

        $sql1 = "SELECT book_cat.id FROM `book_cat`
                 JOIN `author` ON book_cat.id=author.id
                 ORDER BY id DESC";

        $query1 = mysql_query($sql1) or die(mysql_error());

        $row1 = mysql_result($query1, 0, 'id');

        if ( $id > $row1 ) return false;//$url[2]

        return $row;
    }



    public function getPrice($id)
    {
        $query = "SELECT price FROM books WHERE id = '$id'";

        $result = mysql_query($query);

        if ( $result ) {

            $item_price = mysql_result($result, 0, 'price');

        }

        return $item_price;
    }



    public function insertBusket()
    {
        foreach ( $_SESSION['cart'] as $id => $qty ) {

          if ( empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) ) {

              echo 'Please input to empty fields';

              return false;
          }

          $name =  mysql_real_escape_string(strip_tags(substr(trim($_POST['name']), 0, 20)));

          $email = mysql_real_escape_string(strip_tags(substr(trim($_POST['email']), 0, 20)));

          $phone =  mysql_real_escape_string(strip_tags(substr(trim($_POST['phone']), 0, 15)));

          $address =  mysql_real_escape_string(strip_tags(substr(trim($_POST['address']), 0, 50)));

          $additionally = mysql_real_escape_string(strip_tags(substr(trim($_POST['wishes']), 0, 500)));

          $quantity = $qty;

          $date = time();

          $session_id = session_id();



          $sql = "INSERT INTO orders (
            `name`, `email`, `address`,
            `phone`, `wishes`, `product_id`,
            `quantity`, `date`, `session_id`
          ) VALUES (
            '$name', '$email', '$address',
            '$phone', '$additionally', '$id',
            '$quantity', '$date', '$session_id'
          );";

          $query = mysql_query($sql) or die(mysql_error());

          $_SESSION['cart'][$id] = 0;

          if ( $query == false ) {

              echo 'Error';

              return false;

          }

        }

        $controller = new Controller();

        $_SESSION['total_items'] = 0;

        $_SESSION['total_price'] = '0.00';

        $controller->thankYou();

        return false;
    }



    public function getSearch()
    {
        $search = mysql_real_escape_string(strip_tags(substr($_POST['search'], 0, 100)));

        $sql = "SELECT *
                FROM search
                WHERE author
                LIKE '%$search%'
                OR title
                LIKE '%$search%'
                ORDER BY author
                ASC LIMIT 7";

                $query = mysql_query($sql) or die(mysql_error());

                if ( mysql_num_rows($query) > 0 ) {

                  while ( $row = mysql_fetch_assoc($query) ) {

                    $str = '<span data-id="'.$row['id'].'">';

                    $str .= $row['author'];

                    $str .= " ";

                    $str .= $row['title'];

                    $str .= '/<span><br>';

                    echo $str;

                  }

                } else {

                echo 'не найдено : ';

                }
      }


      // public function sendMail()
      // {
      //     $sql = "SELECT * FROM orders ORDER BY id DESC";
      //
      //     $query = mysql_query($sql) or die(mysql_error());
      //
      //     return $query;
      // }



}
