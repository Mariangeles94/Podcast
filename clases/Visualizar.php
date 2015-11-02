<?php

class Visualizar {

    static function verTodos() {
        if (isset($_POST["verTodos"])) {
            $directorio = opendir("usuarios/");
            while ($elemento = readdir($directorio)) {
                if ($elemento != '.' && $elemento != '..') {
                    if (is_dir("usuarios/" . $elemento)) {
                        echo "<li>$elemento</li>";
                    }
                }
            }
        }
    }

    static function verTabla($usuarioBuscar) {
        if (isset($_POST["ver"])) {
            $usuar = "usuarios/" . $usuarioBuscar . "/";
            if ($usuarioBuscar != null && is_dir($usuar)) {
                $a = self::dirToArray($usuar);
                $directorio = $usuar;
                $gestor_dir = opendir($directorio);

                foreach ($a as $k => $v) {
                    $categoria = $k;
                    $va = count($v);
                    foreach ($v as $key => $value) {
                        if (substr($value, 0, 7) !== "Private") {
                            $miArchivo = $usuar . $categoria . "/" . $value;
                            echo"<td>$usuarioBuscar</td> "
                            . "<td>$k</td> "
                            . "<td><audio name='miAudio'controls='controls' loop='loop'><source src='$miArchivo' type='audio/mp3'/></audio></td>"
                            . "</tr>";
                        }
                    }
                }
                $usuarioBuscar = "";
            } else {
                echo "<h1>El usuario no existe</h1>";
            }
        }
    }

    static function dirToArray($dir) {
        $result = array();
        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = self::dirToArray($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }
        return $result;
    }

}
