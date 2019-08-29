<?php


if($_FILES){

	$img = $_FILES['image'];

	$destino = compressImage($img['tmp_name'], 'imgs/nova.jpg', 50);

    echo "<img src='".$destino."' />";
}


function compressImage($source_path, $destination_path, $quality) {
    $info = getimagesize($source_path);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source_path);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source_path);
    }

    imagejpeg($image, $destination_path, $quality);

    return $destination_path;
}
