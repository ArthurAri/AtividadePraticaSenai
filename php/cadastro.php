<?php
    if (empty($_POST["gravar"])){
        echo "Nenhuma entrada recebida.";
        return;
    }

    include ('dbconnect.php');

    $usuario = $_POST["usuario"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $gravar = $_POST["gravar"];

    echo "<br>" . $usuario;
    echo "<br>" . $nome;
    echo "<br>" . $email;
    echo "<br>" . $senha;
    echo "<br>" . $gravar;


    if ($gravar == "cadastrar"){
        $insert = "INSERT INTO Professores(id, nome, email, senha) 
        VALUES('$usuario', '$nome', '$email', '$senha')";
        $executar_insert = mysqli_query($conn, $insert);

        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['id'] = $id;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        
        echo "Cadastro Concluido";
        header("Location: ../eptran.php");
    }
    if ($gravar == "alterar"){
        $update = "UPDATE usuarios SET nome = '$nome', usuario = '$usuario', email = '$email', senha = '$senha' WHERE id = '$id'";
        $executar_update = mysqli_query($conn, $update);
        if ($executar_update){
            echo "Alteração concluída";
        } else {
            echo "Erro na alteração: " . mysqli_error($conn);
        }
    }
?>