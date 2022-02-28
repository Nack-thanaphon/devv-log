<?php

if (isset($_FILES['files']) && !empty($_FILES['files'])) {
    $no_files = count($_FILES["files"]['name']);
    $fn = '';
    for ($i = 0; $i < $no_files; $i++) {
        // $_FILES["files"]["name"][$i] = preg_replace('/{{\s*(.+?\.(?:jpg|png|gif|jpeg))\s*}}/i', '', $_FILES["files"]["name"][$i]);
        // echo $_FILES["files"]["name"][$i];

        $arr = (explode(".", $_FILES["files"]["name"][$i]));
        // echo print_r($arr);
        $count = count($arr);
        $_FILES["files"]["name"][$i] = 'a.' . $arr[$count - 1];
        if ($arr[$count - 1] != 'png') {
            if ($arr[$count - 1] != 'jpg') {
                if ($arr[$count - 1] != 'jpeg') {
                    if ($arr[$count - 1] != 'pdf') {
                        if ($arr[$count - 1] != 'doc') {
                            if ($arr[$count - 1] != 'docx') {
                                echo 'error file not match';
                                return;
                            }
                        }
                    }
                }
            }
        }
        if ($_FILES["files"]["error"][$i] > 0) {
            // echo print_r($_FILES);
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            if (file_exists('../../images/news' . $_FILES["files"]["name"][$i])) {
                echo '../../images/news/' . $_FILES["files"]["name"][$i];
            } else {
                //change name
                $name = $_FILES["files"]["name"][$i];
                $tmp = $_FILES["files"]["tmp_name"][$i];
                $path = '../../uploads/images/';
                list($txt, $ext) = explode(".", $name);
                $milliseconds = round(microtime(true) * 1000);
                $new_file_name = $milliseconds . $i . "." . $ext;




                if (move_uploaded_file($tmp, $path . $new_file_name)) {
                    chmod($path . $new_file_name, 0777);
                    echo $path . $new_file_name;
                } else {
                    echo "Sorry, there was an error uploading your file. " . $path . $new_file_name;
                }



                $fn = dirname(__FILE__) . '/' . $fn . '' . $new_file_name . ",";
            }
        }
    }
} else {
    echo 'Please choose at least one file';
}