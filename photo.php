<?php
    require_once "business.php";

    function upload_photo()
    {
        //TODO
        //remember to change before prod
        // chmod 777 -R /var/www/*
        //zrobic zanim zacznie sie oddawac
        $dir = '/var/www/prod/src/web/images/';

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
                        add_waterMark_jpg($file, $dir, $file_name);
                    }
                    store_photo($file_name,$file);
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

    function add_waterMark_png($photo, $dir, $name)
    {
        $waterMark = $_POST["waterMark"];
        $im = imagecreate(100, 30);
        $textcolor = imagecolorallocate($im, 255, 255, 255);

        $src = $dir . $name;
        $photo = imagecreatefrompng($src);

        if($waterMark != "")
        {
            imagestring($photo, 5, 0, 0, $waterMark, $textcolor);
        }

        $destiny = $dir . "mark_" . $name;

        imagepng($photo, $destiny);
    }

    function store_photo($name, $photo)
    {
        $db = get_db();
        $title = $_POST["title"];
        $author = $_POST["author"];

        $data=[
            'name' => $name,
            'title' => $title,
            'author' => $author,
            'private' => false
        ];
        $db->photos->insertOne($data);
    }

    function get_all_photos()
    {
        $db = get_db();
        $photos = $db->photos->find();
        return $photos;
    }

    function get_paged_photos($page)
    {
        $db = get_db();

        $pageSize = 3   ;

        $opts = [
        'skip' => ($page - 1) * $pageSize,
        'limit' => $pageSize
        ];
        $photos = $db->photos->find([], $opts);
        
        return $photos;
    }

    function delete_photos()
    {
        $db = get_db_admin();
        $db->photos->drop();
    }
?>