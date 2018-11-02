<?php

namespace cursophp7\app\controllers;

use cursophp7\core\App;
use cursophp7\core\Response;
use cursophp7\core\helpers\FlashMessage;
use cursophp7\app\repository\UsuarioRepository;
use cursophp7\app\exceptions\ValidationException;


class AuthController
{

    public function login()
    {
        $errores = FlashMessage::get('login-error', []);
        $username = FlashMessage::get('username');
        Response::renderView('login', 'layout', compact('errores', 'username'));
    }

    public function checkLogin()
    {
        try{
            if (!isset($_POST['username'])
            || empty($_POST['username'])
            || !isset($_POST['password'])
            || empty($_POST['password']))

            throw new ValidationException("Debes introducir el usuario y el password");

        FlashMessage::set('username', $_POST['username']);

        $usuario = App::getRepository(UsuarioRepository::class)->findOneBy([
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            ]
        );

        if(!is_null($usuario))
        {
            $_SESSION['loguedUser'] = $usuario -> getId();
            FlashMessage::unset('username');
            App::get('router') -> redirect('');
        }

        throw new ValidationException('El usuario y el password introducido no existen');

        }catch(ValidationException $validationException)
        {
            FlashMessage::set('login-error', [$validationException->getMessage()]);
            App::get('router')->redirect('login');
        }
       
    }

    public function logout()
    {
        if(isset($_SESSION['loguedUser']))
        {
            $_SESSION['loguedUser'] = null;
            unset($_SESSION['loguedUser']);
        }

        App::get('router')->redirect('login');
    }

}