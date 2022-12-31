<?php
    require_once "business.php";

    function upload_photo()
    {
        $dir = '/var/www/dev/src/web/images/';

        $file = $_FILES['photo'];
        $status = 0;

        if($file != NULL)
        {
            $file_name = basename($file['name']);

            $file_name = time() . $file_name;
            $destiny = $dir . $file_name;

            $tmp_path = $file['tmp_name'];//$file name from checker

            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($file_info,$tmp_path);

            if($mime_type === 'image/jpeg' || $mime_type === 'image/png')
            {
                //echo "poprawny format";
                if($file['size']<=1*1024*1024)
                {
                    if(move_uploaded_file($tmp_path, $destiny))
                    {
                        //echo "Upload przebiegł pomyślnie!\n";
                    }
                }
                else
                {
                    //TODO
                    $status = 1;
                    //plik za duzy
                }
                
            }
            else
            {
                //TODO
                $status += 10;
                //zly format
            }
            if($file['size']>=1*1024*1024)
            {
                $status += 1;
            }
        }
        
        //resize_image_png($file, $dir, $file_name);
        return $status;
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

    function add_waterMark_jpg($photo, $dir, $name)
    {
        $waterMark = $_POST["waterMark"];
        $textcolor = imagecolorallocate($photo, 255, 255, 255);

        $src = $dir . $name;
        $photo = imagecreatefromjpeg($src);

        if($waterMark != "")
        {
            imagestring($photo, 5, 0, 0, 'Hello world!', $textcolor);
        }

        $destiny = $dir . "mini_" . $name;

        imagejpeg($photo, $destiny);
    }

    function store_photo($name, $photo)
    {
        get_db();
        $title = $_POST["title"];
        $author = $_POST["author"];
    }
?>