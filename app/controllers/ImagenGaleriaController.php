<?php
namespace cursophp7\app\controllers;

use cursophp7\core\App;
use cursophp7\core\Response;
use cursophp7\app\utils\File;
use cursophp7\app\entity\ImagenGaleria;
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
        Response::renderView('galeria', 'layout', compact('imagenes', 'categorias', 'descripcion'));
    }

    public function guardaImagen()
    {
        try {
            $descripcion = trim(htmlspecialchars($_POST['descripcion']));
            $categoria = trim(htmlspecialchars($_POST['categoria']));

            if (empty($categoria)) {
                throw new ValidationException("No se ha recibido la categoria");
            }
            $tiposAceptados = ['image/jpeg', 'image/png', 'image/gif'];
            $imagen = new File("imagen", $tiposAceptados);

            $imagen->saveUploadFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);
            $imagen->copyFile(ImagenGaleria::RUTA_IMAGENES_GALLERY, ImagenGaleria::RUTA_IMAGENES_PORTFOLIO);

            $imagenGaleria = new ImagenGaleria($imagen->getFileName(), $descripcion, $categoria);
            $imgRepository = App::getRepository(ImagenGaleriaRepository::class);
            $imgRepository->guarda($imagenGaleria);

            $message = "Se ha guardado una nueva imagen" . $imagenGaleria->getNombre();
            App::get('logger')->add($message);

        } catch (FileException $fileException) {
            die($fileException->getMessage());
        } catch (QueryException $queryException) {
            die($queryException->getMessage());
        } catch (ValidationException $validationException) {
            die($validationException->getMessage());
        } catch (AppException $appException) {
            die($appException->getMessage());
        }

        App::get('router')->redirect('imagenes-galeria');

    }


}