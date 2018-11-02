<?php
namespace cursophp7\app\controllers;

use cursophp7\core\App;
use cursophp7\core\Response;
use cursophp7\app\utils\File;
use cursophp7\app\entity\ImagenGaleria;
use cursophp7\core\helpers\FlashMessage;
use cursophp7\app\exceptions\AppException;
use cursophp7\app\exceptions\FileException;
use cursophp7\app\exceptions\QueryException;
use cursophp7\app\repository\AssociatRepository;
use cursophp7\app\exceptions\ValidationException;
use cursophp7\app\repository\CategoriaRepository;
use cursophp7\app\repository\ImagenGaleriaRepository;


class ImagenGaleriaController
{
    public function galeria()
    {
        $descripcion = '';
        $imagenes = App::getRepository(ImagenGaleriaRepository::class)->findAll();
        $categorias = App::getRepository(CategoriaRepository::class)->findAll();
        
        $errores = FlashMessage::get('errores',[]); 
        $mensaje =  FlashMessage::get('mensaje'); 
        $descripcion = FlashMessage::get('descripcion'); 
        $categoriaSeleccionada =  FlashMessage::get('categoriaSelecionada'); 

        Response::renderView('galeria', 'layout', compact('imagenes', 'categorias', 'descripcion','errores','categoriaSeleccionada', 'mensaje'));
    }

    public function guardaImagen()
    {
        try {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            FlashMessage::set('descripcion',$descripcion);
            $_SESSION['descripcion'] = $descripcion;
            $categoria = trim(htmlspecialchars($_POST['categoria']));

            if (empty($categoria)) {
                throw new ValidationException("No se ha recibido la categoria");
            }
            FlashMessage::set('categoriaSeleccionada',$categoria);

            $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
            $imagen = new File("imagen", $tiposAceptados);

            $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

            $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
            $imgRepository = App::getRepository(ImagenGaleriaRepository::class);
            $imgRepository->guarda($imagenGaleria);

            $message = "Se ha guardado una nueva imagen" . $imagenGaleria->getNombre();
            App::get('logger')->add($message);

            FlashMessage::set('mensaje',$message);
            FlashMessage::unset('descripcion');
            FlashMessage::unset('categoriaSeleccionada');

           $mensajeEmail = "Se ha guardado una nueva imagen" . $imagenGaleria->getNombre();

          /*  App::get('mail')->send(
                'nuevaImagen',
                'jorgemartiinez19@gmail.com',
                'Jorge',
                $mensajeEmail
            );
           */

        } catch (FileException $fileException) {
            FlashMessage::set('errores' , [$fileException->getMessage()]);
        }catch (ValidationException $validationException) {
            FlashMessage::set('errores' , [$validationException->getMessage()]);
        }

        App::get('router')->redirect('imagenes-galeria');

    }

    public function show ($id)
    {
        $imagen = App::getRepository(ImagenGaleriaRepository::class)->find($id);
        Response::renderView('show-imagen-galeria','layout',compact('imagen'));
    }
}