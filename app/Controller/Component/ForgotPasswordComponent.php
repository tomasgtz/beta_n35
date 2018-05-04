<?php

App::uses('Component', 'Controller');

class ForgotPasswordComponent extends Component {

    private $numberSeconds = 86400;
    public $errorMessages = '';

    public function validToken($tokenCreatedAt) {
        $expired = strtotime($tokenCreatedAt) + $this->numberSeconds;
        $time = strtotime("now");
        return ($time < $expired) ? true : false;
    }

    public function generatePasswordToken() {
        // Generate a random string 100 chars in length.
        $token = '';
        for ($i = 0; $i < 100; $i++) {
            $d = rand(1, 100000) % 2;
            $d ? $token .= chr(rand(33, 79)) : $token .= chr(rand(80, 126));
        }
        if (rand(1, 100000) % 2) {
            $token = strrev($token);
        } else {
            $token = $token;
        }
        // Generate hash of random string
        $hash = Security::hash($token, 'sha256', true);
        for ($i = 0; $i < 20; $i++) {
            $hash = Security::hash($hash, 'sha256', true);
        }
        return $hash;
    }

    public function validateStrengthPassword($password, $confirmPassword) {
        $error = array();
        $contador = 0;
        if ($password !== $confirmPassword) {
            $error[] = 'Las contraseña no coinciden, intente otra vez';
            $this->errorMessages = implode('<br>', $error);
            return false;
        }
        if (strlen($password) < 8) {
            $error[] = 'La contraseña debe tener al menos 8 caracteres';
            $contador++;
        }
        if (!preg_match("#[0-9]+#", $password)) {
            $error[] = 'La contraseña debe contener al menos un número';
            $contador++;
        }
        if (!preg_match("#[a-z]+#", $password)) {
            $error[] = 'La contraseña debe contener al menos una letra';
            $contador++;
        }
        if (!preg_match("#[A-Z]+#", $password)) {
            $error[] = 'La contraseña debe contener al menos una letra mayúscula';
            $contador++;
        }
        if (!preg_match("#\W+#", $password)) {
            $error[] = 'La contraseña debe contener al menos un caracter especial';
            $contador++;
        }
        $this->errorMessages = implode('<br>', $error);
        return ($contador == 0) ? true : false;
    }

}
