<?php
session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// login simples
if($usuario == "admin" && $senha == "1234"){

    // cria sessão
    $_SESSION['usuario'] = $usuario;

    // cria cookie
    setcookie(
        "usuario",
        $usuario,
        time() + 90000,
        "/"
    );
}

header("Location: ../index.php");
exit;
?>