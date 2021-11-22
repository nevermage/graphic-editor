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
        $z = json_decode(file_get_contents('php://input'), true);
        if ($z['svg'] == 1) {
            //create svg from $image file that given to parameter that now in folder
            //after that $image shoud take 'path to new created svg file'

        }
        $pdo = new Database();
        $sql = "INSERT INTO `testTask`.`images` (`image`, `author`, `date`)
        VALUES ('$image', '" . $author . "', date(curdate()));";
        $pdo->query($sql);
    }
}