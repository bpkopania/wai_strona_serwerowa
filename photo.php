<?php
    require_once "business.php";

    function upload_photo()
    {
        $dir = '/var/www/dev/src/web/images/';

        $file = $_FILES['photo'];
        $file_name = basename($file['name']);

        $destiny = $dir . $file_name;

        $tmp_path = $file['tmp_name'];//$file name form checker

        $file_info = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($file_info,$tmp_path);

        if($mime_type === 'image/jpeg')
        {
            echo "poprawny format";
        }


        if(move_uploaded_file($tmp_path, $destiny))
        {
            echo "Upload przebiegł pomyślnie!\n";
        }
    }

    function store_photo($name, $photo)
    {
        get_db();
        
    }
?>