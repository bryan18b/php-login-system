<?php
session_start();

// recria sessão pelo cookie
if(!isset($_SESSION['usuario']) && isset($_COOKIE['usuario'])){
    $_SESSION['usuario'] = $_COOKIE['usuario'];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body{
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f0f0;
        }

        .box{
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        input{
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        button{
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">

<?php if(isset($_SESSION['usuario'])){ ?>

    <h2>Bem-vindo</h2>

    <p>
        Usuário:
        <?php echo $_SESSION['usuario']; ?>
    </p>

    <button onclick="logout()">
        Sair
    </button>

    <script>
        // salva no localStorage
        localStorage.setItem(
            "usuario",
            "<?php echo $_SESSION['usuario']; ?>"
        );

        console.log(localStorage.getItem("usuario"));

        function logout(){
            localStorage.removeItem("usuario");
            window.location.href = "pages/logout.php";
        }
    </script>

<?php } else { ?>

    <h2>Login</h2>

    <form action="pages/login.php" method="POST">

        <input 
            type="text" 
            name="usuario" 
            placeholder="Usuário"
            required
        >

        <input 
            type="password" 
            name="senha" 
            placeholder="Senha"
            required
        >

        <button type="submit">
            Entrar
        </button>

    </form>

    <script>
        // verifica localStorage
        let usuario = localStorage.getItem("usuario");

        if(usuario){
            console.log("Usuário salvo:", usuario);
        }
    </script>

<?php } ?>

</div>

</body>
</html>