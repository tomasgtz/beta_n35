<?php

App::uses('Component', 'Controller');

class FileComponent extends Component {

    public $allowedExtensions = array('jpg', 'jpeg', 'gif', 'png', 'pdf', 'doc', 'docx', 'zip');
    public $identifier = '';
    public $maxSize = 5242880;
    public $routeToSave = '';
    public $name = '';
    public $imageNotFound = 'no_image.png';

    public function getIdentifier() {
        if ($this->identifier == '') {
            return uniqid();
        } else {
            return $this->identifier;
        }
    }

    public function extractExtesion($name) {
        return substr(strtolower(strrchr($name, '.')), 1);
    }

    public function save($data) {

        $name = ($data['name'] == null) ? '' : $data['name'];

        $size = ($data['size'] == null) ? 0 : $data['size'];

        $tmp_name = ($data['tmp_name'] == null) ? '' : $data['tmp_name'];

        if ($name == '' || $size == 0 || $tmp_name == '') {
            $this->name = '';
            return false;
        }

        if (!in_array($this->extractExtesion($name), $this->allowedExtensions)) {
            $this->name = '';
            return false;
        }

        if ($size > $this->maxSize) {
            $this->name = '';
            return false;
        }

        $name = $this->getIdentifier() . $data['name'];

        $fullPathFileName = $this->routeToSave . $name;

        try {
            if (move_uploaded_file($data['tmp_name'], $fullPathFileName)) {
                $this->name = $name;
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            $this->name = '';
            return false;
        }
    }

}