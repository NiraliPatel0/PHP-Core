<?php
#
# Name: Nirali Patel
#
#
class FilesMgmt {
    
    # remove directory : param: directory path return : true, if failed return : false
    function delDir($path){
        try {
            // change directory mode dir
            @chmod($path,0777);

            // remove directory
            if(@rmdir($path)){
                return true;
            }else{
                return false;
            }
        } catch(Exception $e){
            echo $e;
            return false;
        }   
    }

    # make directory : param: path, directory name, return : true, if failed return : false
    function makeDir($path,$dirname){
        try {
            // make directory
            if(@mkdir($path.$dirname)){
                return true;
            }else{
                return false;
            }

        } catch(Exception $e){
            echo $e;
            return false;
        }   
    }

    # rename directory : param: base directory, old name of directory, new name of directory, return : true, if failed return : false
    function renameDir($path, $oldName,$newName){
        try {
            // change directory mode 
            @chmod($path,0777);

            # change directory name: old name to new name
            if(@rename($path.$oldName,$path.$newName)){
                return true;
            } else {
                return false;
            }
        } catch(Exception $e){
            echo $e;
            return false;
        }   
    }

    # param : directory path, return: list of files / false
    function getDirList($basePath){
        try {
            $files = scandir($basePath);
            return $files;
        } catch(Exception $e){
            echo $e;
            return false;
        }   
    }

    # $_FILES param name = FILE, parameter : $_FILES, path, return: true/false
    function fileUpload($file,$path){
        try {
            if(move_uploaded_file($file['FILE']['tmp_name'] , '$path'.$file['FILE']['name'])){
                return true;
            } else {
                return false;
            }
        } catch(Exception $e){
            echo $e;
            return false;
        }
    }

    # delete multiple files, param: base directory path.
    function delAllFiles($path){
        
        try {
            // change directory mode dir
            chmod($path,777);
            # get lists
            $dir=@opendir($path);
            while($file=readdir($dir)){ //read dir each files.
                # remove file
                @unlink($path.$file);   
            }
            return true;
        } catch(Exception $e){
            echo $e;
            return false;
        }
    }

    # delete single file, param: path, filename return: true/false
    function delFile($path,$filename){
        try {
            // change directory mode dir
            chmod($path,777);
            # remove file
            @unlink($path.$filename);   
            return true;
        } catch(Exception $e){
            echo $e;
            return false;
        }
    }
    
}
