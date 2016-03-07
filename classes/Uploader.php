<?php

class Uploader {

    const EMPTY_FILE = 100;
    const NOT_SUPPORTED = 101;
    const UNKNOWN_ERROR = 102;
    private $error;

    const ERROS = array(
        UPLOAD_ERR_OK => "No errors",
        UPLOAD_ERR_INI_SIZE => "File is too large.",
        UPLOAD_ERR_FORM_SIZE => "File is too large.",
        UPLOAD_ERR_PARTIAL => "Upload failed",
        UPLOAD_ERR_NO_FILE => "No file",
        Uploader::EMPTY_FILE => 'Empty file.',
        Uploader::NOT_SUPPORTED => 'File uploaded is not supported.',
        Uploader::UNKNOWN_ERROR => 'Unknown Error'
    );

    function __construct() {

    }

    public static function attach_file($file,$path,$fileName){

          if(!$file || empty($file) || !is_array($file) ){
              return Uploader::EMPTY_FILE ;
          }

          if($file['error'] != 0){
              return $file['error'];
          }

          $temp = $file['tmp_name'];
        //  $filename = basename($file['name']);
          $type = $file['type'];

      //    $size = $file['size'];


          //$allowed = array("image/png","image/jpeg","image/gif");
          $allowed = array("image/jpeg");
          if(!in_array($type, $allowed)){
            return Uploader::NOT_SUPPORTED;
          }
          switch($type){
            case "image/png" : $extn = ".png";break;
            case "image/jpeg" : $extn = ".jpg";break;
             case "image/gif" : $extn = ".gif";break;
          }
          /*$dimens = getimagesize($temp);
          if($dimens[0] != $dimens[1]){

          }*/

          $target = $fileName.$extn;
          $upload_dir = $path;
          if(move_uploaded_file($temp, $upload_dir."/".$target)){
              return 0;
          }

          return Uploader::UNKNOWN_ERROR;

    }

    function error(){
      return $this->error;
    }

    function errorMsg(){
      return Uploader::ERRORS[$this->error];
    }

}

 ?>
