<?php

class CrearDatos {

    static function creo() {
//////////////////Crear carpeta usuario////////////////////////
        $mensaje = null;
        $usuario = Request::post("usuario");
        $ruta = "usuarios/";
        $directorio = $ruta . $usuario;
        if (!is_dir($directorio)) {
            $crear = mkdir($directorio, 0777, true);
            if ($crear) {
                $mensaje.= "Bienvenido " . $usuario . "<br/>";
            } else {
                $mensaje.= "Usuario no creado<br/>";
            }
        }

//////////////////Crear carpeta categoria////////////////////////    
        $categoria = Request::post("categoria");
        $ruta2 = "usuarios/" . $usuario . "/";
        $directorio2 = $ruta2 . $categoria;
        if (!is_dir($directorio2)) {
            $crear2 = mkdir($directorio2, 0777, true);
            if ($crear2) {
                $mensaje.= "Categoria " . $categoria . " creada <br/>";
            }
        }
//////////////////subir archivo////////////////////////
        $variable = new FileUpload("file");
        $variable->setDestino($directorio2 . "/");
        $nombreOrigen = $variable->getNombre();
        if (isset($_POST["privado"])) {
            $variable->setNombre("Private" . $usuario . "_" . $categoria . "_" . $nombreOrigen);
        }
        if (!isset($_POST["privado"])) {
            $variable->setNombre($usuario . "_" . $categoria . "_" . $nombreOrigen);
        }
        $variable->setPolitica(FileUpload::RENOMBRAR);
        if ($variable->upload()) {
            $mensaje.= "Archivo subido correctamente <br/>";
        } else {
            $mensaje.= "Fallo al subir el archivo<br/>";
        }
        return $mensaje;
    }

}
