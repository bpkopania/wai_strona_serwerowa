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
                    move_uploaded_file($tmp_path, $destiny);
                    if($mime_type === 'image/jpeg')
                    {
                        resize_image_jpg($file, $dir, $file_name);
                        add_waterMark_jpg($file, $dir, $file_name);
                    }
                    else
                    {
                        resize_image_png($file, $dir, $file_name);
                    }
                }
                else
                {
                    $status = 1;
                    //plik za duzy
                }
                
            }
            else
            {
                $status += 10;
                //zly format
            }
            if($file['size']>=1*1024*1024)
            {
                $status += 1;
                //plik za duzy
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
        $im = imagecreate(100, 30);
        $textcolor = imagecolorallocate($im, 255, 255, 255);

        $src = $dir . $name;
        $photo = imagecreatefromjpeg($src);

        if($waterMark != "")
        {
            imagestring($photo, 5, 0, 0, $waterMark, $textcolor);
        }

        $destiny = $dir . "mark_" . $name;

        imagejpeg($photo, $destiny);
    }

    function store_photo($name, $photo)
    {
        $db = get_db();
        $title = $_POST["title"];
        $author = $_POST["author"];

        $data=[
            'name' => $name,
            'title' => $title,
            'author' => $author
        ];
        $db->photos->insertOne($data);
    }
?>