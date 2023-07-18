<?php 
defined('DIR_PAGE_DETAILS_GALLERY_FILE') || define('DIR_PAGE_DETAILS_GALLERY_FILE', $_SERVER["DOCUMENT_ROOT"].'/');
    function gallery_image($image_new_file, $content) {
        $path = '';
        $directories = explode('/', dirname($image_new_file));
        foreach ($directories as $directory) {
            $path = $path . '/' . $directory;
            if (!is_dir(DIR_PAGE_DETAILS_GALLERY_FILE . $path)) {
                @mkdir(DIR_PAGE_DETAILS_GALLERY_FILE . $path, 0777,true);
            }
        }
        $fp = fopen(DIR_PAGE_DETAILS_GALLERY_FILE.$image_new_file,"wb");
        fwrite($fp,$content);
        fclose($fp);
        return;
    }

    function remove_file($file_path) {
        $common_file_ext= 'frontend/cache/';
        // $path_file = DIR_PAGE_DETAILS_GALLERY_FILE.$common_file_ext.$file_path;
        // echo $path_file;
        // if(!unlink($path_file)) {
        // echo ("Could not remove $path_file");
        // }else{
        //     echo "<br>Removed.";
        // }
        $path_folder = DIR_PAGE_DETAILS_GALLERY_FILE.$common_file_ext.$file_path;
        echo dirname($path_folder);

        (is_dir("$path_folder")) ? delTree("$path_folder") : unlink("$path_folder");
        // return rmdir($dir);

    }

    $common_file_ext= 'frontend/cache/';
    $image_new_file1 = 'hotels/list/demo1.php';
    $image_new_file2 = 'hotels/list/demo2.php';
    $rm_image_new_file = 'hotels/list';

    
    $content = "Hello demo";
    echo $common_file_ext.$image_new_file1."<br>";
    gallery_image($common_file_ext.$image_new_file1, $content);
    gallery_image($common_file_ext.$image_new_file2, $content);
    remove_file($rm_image_new_file);

 ?>