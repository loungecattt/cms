<?php

if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $fileTmpName = $_FILES['image']['tmp_name'];
    $name = md5_file($fileTmpName);
    $extension = image_type_to_extension($image[2]);
    $format = str_replace('jpeg', 'jpg', $extension);
    move_uploaded_file($fileTmpName, __DIR__ . '/upload/' . $name . $format);
}