<?php 
            if(!empty($_GET['file2'])){
                $filename = basename($_GET['file2']);
                $filepath = 'uploadvideos/' .$filename;
                if(!empty($filename) && file_exists($filepath)){
                    //Define headers
                    header("Cache-Control: public");
                    header("Content-Description: File Transfer");
                    header("Content-Disposition attachment; filenname=$filename");
                    header("Content-Type: application/zip");
                    header("Content-Transfer-Encoding: binary");

                    readfile($filepath);
                    exit;
                }
                else{
                    echo "<h2><b>This file does not exist</b></h2>";
                    echo "<script>window.location.href='index.php';</script>";
                }
            }else{
                echo "<script>window.location.href='index.php';</script>";

            }

?>