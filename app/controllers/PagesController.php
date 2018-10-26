<?php
namespace cursophp7\app\controllers;

use cursophp7\core\App;
use cursophp7\core\Response;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\repository\AssociatRepository;
use cursophp7\app\repository\ImagenGaleriaRepository;
use cursophp7\app\utils\Utils;

class PagesController
{
    public function index()
    {
        $imagenGaleria = App::getRepository(ImagenGaleriaRepository::class)->findAll();
        $asociados = App::getRepository(AssociatRepository::class)->findAll();
        $categorias = ['category1' => 1, 'category2' => 0, 'category3' => 0];

        Response::renderView('index', 'layout', compact('imagenGaleria', 'asociados', 'categorias'));

    }

    public function about()
    {
        Response::renderView('about', 'layout-with-footer');
    }
    public function blog()
    {
        Response::renderView('blog', 'layout-with-footer');
    }
    public function post()
    {
        Response::renderView('single_post', 'layout-with-footer');
    }

    public function contact()
    {
        $problemas = [];
        $cadenaErrores = "";
        $nombre = "";
        $apellido = "";
        $asunto = "";
        $mensaje = "";
        $email = "";
        if (isset($_POST['boton'])) {
            $nombre = trim(htmlspecialchars($_POST['nombre']));
            $apellido = trim(htmlspecialchars($_POST['apellido']));
            $asunto = trim(htmlspecialchars($_POST['asunto']));
            $mensaje = trim(htmlspecialchars($_POST['mensaje']));
            $email = trim(htmlspecialchars($_POST["email"]));

            if (!empty($nombre) && !empty($asunto) && !empty($email)) {
                $nombre = $nombre;
                $apellido = $apellido;

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email = $email;
                } else {
                    $email = "El email introducido no es correcto";
                }
                $asunto = $asunto;
                $mensaje = $mensaje;

            } else {

                if (empty($nombre)) {
                    array_push($problemas, "No has introducido el nombre");
                }
                if (empty($asunto)) {
                    array_push($problemas, "No has introducido el asunto");
                }
                if (empty($email)) {
                    array_push($problemas, "No has introducido el email");
                }
                $cadenaErrores = implode("<br/>", $problemas);
            }
        }

        Response::renderView('contact', 'layout', compact('problemas', 'cadenaErrores', 'nombre', 'apellido', 'asunto', 'mensaje', 'email'));

    }

}