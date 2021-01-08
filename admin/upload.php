<?php 

if (empty($_FILES['image'])){
    exit('必须上传文件');
}

$image = $_FILES['image'];

if ($image['error'] !== UPLOAD_ERR_OK) {
    exit('上传失败');
}

$ext = pathinfo($image['name'], PATHINFO_EXTENSION);
$target = $_SERVER['DOCUMENT_ROOT'] . '/pet/images/img-' . uniqid() . '.' . $ext;

if (! move_uploaded_file($image['tmp_name'], $target)) {
    exit('上传失败');
}

echo substr($target,27);

