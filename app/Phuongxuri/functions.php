<?php


function cate_parent($data, $parent =0,$str="--")
{

    foreach ($data as $key => $val) {
        $id = $val["id"];
        $name = $val["name"];
        if ($val["prarent_id"]==$parent) {
            echo "<option value='$id'>$str $name</option>";
            cate_parent($data,$id,$str."--");
        }
    }
}
?>
