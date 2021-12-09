<?php

namespace Classes;

class Pictures extends Database
{
    public function getAll()
    {
        $sql = "select * from `testTask`.`images` order by id desc;";
        $images = $this->query($sql);
        return $images;
    }
    public function saveToDatabase($image, $author, $svg)
    {
        $sql = "INSERT INTO `testTask`.`images` (`image`, `author`, `date`, `svg`)
        VALUES ('$image', '$author', date(curdate()), '$svg');";
        $this->query($sql);
    }
}