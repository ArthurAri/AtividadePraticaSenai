<?php
    if (empty($_POST["gravar"])){
        echo '<script>
        alert("Nenhuma entrada recebida");
            window.location.href="../signin.php";
        </script>';
    }

    include ('dbconnect.php');
    session_start();

    $usuario = $_POST["usuario"];
    $gravar = $_POST["gravar"];
    $senha = $_POST["senha"];
    
    if ($gravar == "login"){
        $get = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = '$senha'";
        $executar_get = $conn->query($get) or throw mysqli_error("Not found");
        $row = $executar_get->fetch_assoc();

        if (mysqli_num_rows($executar_get) > 0){
            $_SESSION['usuario'] = $row['usuario'];
            $_SESSION['id'] = $row["id"];
            $_SESSION['nome'] = $row["nome"];
            $_SESSION['email'] = $row["email"];
            echo "Logar com " . $row['email'];
            header("Location: ../eptran.php");
        }
        else{
            echo '<script>
                alert("Usuário ou senha incorreto");
                window.location.href="../signin.php";
            </script>';
        }
    }
?>