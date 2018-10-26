<?php
namespace cursophp7\app\controllers;

use cursophp7\core\App;
use cursophp7\core\Response;
use cursophp7\app\utils\File;
use cursophp7\app\entity\Associat;
use cursophp7\app\entity\FileException;
use cursophp7\app\entity\QueryException;
use cursophp7\app\entity\ValidationException;
use cursophp7\app\repository\AssociatRepository;

class AsociadosController
{

    public function asociado()
    {
        $descripcion = '';
        $associats = App::getRepository(AssociatRepository::class)->findAll();
        Response::renderView('associats', 'layout', compact('associats', 'descripcion'));
    }

    public function guardaAsociado()
    {
        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nombre = trim(htmlspecialchars($_POST['nombre']));

                $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
                $imagen = new File("imagen", $tiposAceptados);

                $imagen->saveUploadFile(Associat::RUTA_IMAGENES_ASOCIADOS);

                $descripcion = trim(htmlspecialchars($_POST['descripcion']));

                $associat = new Associat($nombre, $imagen->getFileName(), $descripcion);

                App::getRepository(AssociatRepository::class)->guarda($associat);

                $mensajeConfirmacion = 'Datos Enviados';

                $message = "Se ha guardado un nuevo asociado " . $associat->getNombre();
                App::get('logger')->add($message);

                $associats = App::getRepository(AssociatRepository::class)->findAll();

            }
        } catch (FileException $fileException) {
            $errores[] = $fileException->getMessage();
        } catch (QueryException $queryException) {
            $errores[] = $queryException->getMessage();
        } catch (QueryException $appException) {
            $errores[] = $appException->getMessage();
        } catch (ValidationException $validationException) {
            $errores[] = $validationException->getMessage();
        }
        App::get('router')->redirect('asociados');
    }


}

?>