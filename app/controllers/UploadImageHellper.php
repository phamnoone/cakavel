<?php 
class UploadImageHellper {
    public $namefile = '' ;
    public $messimg = '';

    function __construct($_namefile){
      $this->namefile = $_namefile;
    }
    function upLoadFile(){
          $str = substr( ''. $_FILES[''.$this->namefile]['name'],  strlen(''. $_FILES[''.$this->namefile]['name'])-3, strlen(''. $_FILES[''.$this->namefile]['name']));
          if ($str == 'peg'){
              $str = 'jpeg';
          }
          $allowtypes  = array('jpg', 'png', 'jpeg', 'gif');
          if (!empty($_FILES[''.$this->namefile])) {
              if ($_FILES[''.$this->namefile]['error'] > 0) {
                  $this->messimg = 'UpLoad không thành công !';
              } else{
                    if (in_array($str,$allowtypes )) {   
                        move_uploaded_file($_FILES[''.$this->namefile]['tmp_name'], './public/images/'.$_FILES[''.$this->namefile]['name']);
                    } else {
                          $this->messimg = 'Chỉ được upload các định dạng JPG, PNG, JPEG, GIF';
                      }
                }
          } else{
                $this->messimg =  'Bạn chưa chọn file upload';
            }
      
    }
}

?>