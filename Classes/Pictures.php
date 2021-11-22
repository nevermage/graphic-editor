<?php

namespace Classes;

use Classes\Database;

class Pictures
{
    public function getAll()
    {
        $pdo = new Database();
        $sql = "select * from `testTask`.`images` order by id desc;";
        $images = $pdo->query($sql);
        return $images;
    }
    public function saveToDatabase($image, $author)
    {
        $pdo = new Database();
        $sql = "INSERT INTO `testTask`.`images` (`image`, `author`, `date`)
        VALUES ('$image', '" . $author . "', date(curdate()));";
        $pdo->query($sql);
    }
}