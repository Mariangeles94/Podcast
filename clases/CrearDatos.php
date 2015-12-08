<?php

class CrearDatos {

    static function creo() {
//////////////////Crear carpeta usuario////////////////////////
        $mensaje = null;
        $usuario = Request::post("usuario");
        $ruta = "usuarios/";
        $directorio = $ruta . $usuario;
        if($usuario != ""){
        if (!is_dir($directorio)) {
            $crear = mkdir($directorio, 0777, true);
            if ($crear) {
                $mensaje.= "Bienvenido " . $usuario . "<br/>";
            } 
        }else {
                $mensaje.= "Hola " . $usuario . "<br/>";
            }
        }else{
            $mensaje.= "Usuario vacio <br/>";
        }

//////////////////Crear carpeta categoria////////////////////////    
        $categoria = Request::post("categoria");
        $ruta2 = "usuarios/" . $usuario . "/";
        $directorio2 = $ruta2 . $categoria;
        if($usuario != ""){
            if (!is_dir($directorio2)) {
                mkdir($directorio2, 0777, true);
                $mensaje.= "Categoria " . $categoria . " creada <br/>";
            }
        }else{
            $mensaje= "Usuario vacio <br/>";
        }
//////////////////subir archivo////////////////////////
        $variable = new FileUpload("file");
        $variable->setDestino($directorio2 . "/");
        $nombreOrigen = $variable->getNombre();
        $variable->setNombre($usuario . "_" . $categoria . "_" . $nombreOrigen);
        
        $variable->setPolitica(FileUpload::RENOMBRAR);
        if ($variable->upload() && $usuario != "") {
            $mensaje.= "Archivo subido correctamente <br/>";
        } else {
            $mensaje.= "Fallo al subir el archivo<br/>";
        }
        return $mensaje;
    }

}
