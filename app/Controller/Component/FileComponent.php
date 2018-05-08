<?php
App::uses('Component', 'Controller');

class FileComponent extends Component {
    
    public $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'doc', 'docx', 'zip');
    
    public $identifier = '';
    
    public $maxSize = 5242880;
    
    public $route = APP . 'webroot' . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR;

    public function getIdentifier(){
        if($this->identifier == ''){
            return uniqid();
        } else {
            return $this->identifier;
        }
    }

    public function extractExtesion($name){
        return substr(strtolower(strrchr($fileName, '.')), 1);
    }

    public function save($data){

        $name = ($data['name'] == null) ? '' : $data['name'];
        
        $size = ($data['size'] == null) ? 0 : $data['size'];

        $tmp_name = ($data['tmp_name'] == null) ? '' : $data['tmp_name'];

        if($name == '' || $size == 0 || $tmp_name == ''){
            return false;
        }
        
        if (!in_array($this->extractExtesion($name), $this->allowedExtensions)) {
            return false;
        }

        if ($size > $this->maxSize) {
            return false;
        }

        try {
            if(move_uploaded_file($data['tmp_name'], $this->route . $this->getIdentifier() . $data['name'] )) {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}