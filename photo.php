<?php
    require_once "business.php";

    function upload_photo()
    {
        $dir = '/var/www/dev/src/web/images/';

        $file = $_FILES['photo'];
        
        if($file != NULL)
        {
            $file_name = basename($file['name']);

            $destiny = $dir . $file_name;

            $tmp_path = $file['tmp_name'];//$file name from checker

            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($file_info,$tmp_path);

            if($mime_type === 'image/jpeg' || $mime_type === 'image/png')
            {
                //echo "poprawny format";
                if(move_uploaded_file($tmp_path, $destiny))
                {
                    //echo "Upload przebiegł pomyślnie!\n";
                }
            }
        }
        
        //resize_image($file, $dir, $file_name);
    }

    function resize_image_png($photo, $dir, $name)
    {
        $src = $dir . $name;
        $photo = imagecreatefrompng($src);

        $miniPhoto = imagescale(
            $photo,
            200,
            125
        );

        $destiny = $dir . "mini_" . $name;

        imagepng($miniPhoto, $destiny);
    }

    function resize_image_jpg($photo, $dir, $name)
    {
        $src = $dir . $name;
        $photo = imagecreatefromjpeg($src);

        $miniPhoto = imagescale(
            $photo,
            200,
            125
        );

        $destiny = $dir . "mini_" . $name;

        imagejpeg($miniPhoto, $destiny);
    }

    function add_waterMark($photo, $dir, $name)
    {
        $waterMark = $_POST["waterMark"];
        $textcolor = imagecolorallocate($photo, 255, 255, 255);
        if($waterMark != "")
        {
            imagestring($photo, 5, 0, 0, 'Hello world!', $textcolor);
        }
    }

    function store_photo($name, $photo)
    {
        get_db();
        
    }
?>