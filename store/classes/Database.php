<?php

class Database
{
    public function __construct()
    {
        $connection = mysql_connect(conf::HOST,
                                    conf::USER,
                                    conf::PASS);

        if (!$connection) {
            return false;
        }

        if (!mysql_select_db(conf::DB)) {
            return false;
        }
        return true;
    }

}
