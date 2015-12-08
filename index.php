<?php
require './clases/AutoCarga.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Podcast</title>
        <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    </head>
    <body>
        <div id="content">
            <div id="log">
                <form  action="index.php" method="post" enctype="multipart/form-data" class="form-container">
                    <div class="form-title"><h2>Sign up</h2></div>
                    <label class="form-title">User</label><input class="form-field" type="text" name="usuario" /><br/><br/>
                    <label class="form-title">Categoria </label>
                    <select name="categoria" class="form-field">
                        <option value="Rock">Rock</option>
                        <option value="Pop">Pop</option>
                        <option value="Rap">Rap</option>
                        <option value="Reggae">Reggae</option>
                        <option value="Clasica">Clasica</option>
                        <option value="Salsa">Salsa</option>
                        <option value="Punk">Punk</option>
                        <option value="Jazz">Jazz</option>
                        <option value="Dance">Dance</option>
                        <option value="Tecno">Tecno</option> 
                        <option value="Country">Country</option> 
                        <option value="Blues">Blues</option> 
                        <option value="R&B">R&B</option> 
                        <option value="Opera">Opera</option> 
                        <option value="House">House</option> 
                    </select>
                    <input type="file" name="file" /><br/><br/>
                    <input type="submit" value="login" name="login" class="submit-button" />

                </form>
                <div id="subir">
                    <?php
                    if (isset($_POST["login"])) {
                        echo "<h3>" . CrearDatos::creo() . "</h3>";
                    }
                    ?>

                </div>
            </div>
            <div id="bus">
                <form  action="index.php" method="post"
                       enctype="multipart/form-data">
                    <label class="form-title">Buscar usuario</label><input class="form-field" type="text" name="buscar" /><br/><br/>
                    <input id="ver" type="submit" value="Buscar" name="ver" class="submit-button" /><br/><br/>
                    <input id="ver" type="submit" value="Ver todos" name="verTodos" class="submit-button" /><br/><br/>
                </form>


                <?php if (isset($_POST["ver"])) { ?>
                    <div class="tabla">
                        <table>
                            <tr>
                                <td>Usuario</td>
                                <td>Categoria</td>
                                <td>File</td>
                            </tr>
                            <?php
                            Visualizar::verTabla(Request::post("buscar"));
                            ?>
                        </table>
                    </div>
                <?php } ?>
                <?php if (isset($_POST["verTodos"])) { ?>
                    <div id="tabla2">
                        <ul id="lista">
                            <h2>Todos los usuarios</h2>
                            <?php
                            Visualizar::verTodos();
                            ?>
                        </ul>
                    </div>
                <?php } ?>
                <div id="out">
                    <a class="loginout" href="phploginout.php">Logout</a>
                </div>
            </div>
        </div>
    </body>
</html>
