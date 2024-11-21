<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - EPTRAN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="fixador">
        <div class="header">
            <div class="menu__container">
                <input type="checkbox" class="header__menu-hamburger-botao" id="menu-hamburger-botao">
                <label class="header__menu__rotulo" for="menu-hamburger-botao">
                    <div class="icone header__icone-menu"></div>
                </label>
                <div class="header__menu-hamburger">
                    <a href="eptran.php" class="header__menu-hamburger__item">Pagina Principal</a>
                    <a href="login.php" class="header__menu-hamburger__item">Perfil</a>
                    <a href="categorias.php" class="header__menu-hamburger__item">Jogos</a>
                    <a href="categorias.php" class="header__menu-hamburger__item">Cursos</a>
                    <a href="adm.php" class="header__menu-hamburger__item">Administração</a>
                </div>
            </div>
            <a href="eptran.php" class="header__logo">
                <div class="logo"></div>
            </a>
            <div class="header__menu">
                <div>
                    <div class="header__menu__botoes">
                        <a href="categorias.php" class="header__botao">
                            <h2>Jogos</h2>
                        </a>
                        <a href="login.php" class="header__botao">
                            <h2>Perfil</h2>
                        </a>
                        <a href="categorias.php" class="header__botao">
                            <h2>Cursos</h2>
                        </a>
                        <a href="adm.php" class="header__botao">
                            <h2>Administração</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="header__usuario">
                <input type="checkbox" class="header__menu-usuario-botao" id="menu-usuario">
                <label href="#" class="header__usuario" for="menu-usuario">
                </label>
                <div class="header__menu-usuario">
                    bom dia
                    <button class="botao-logout">
                        Sair da conta
                        <div class="icone botao-logout__icone"></div>
                    </button>
                </div>
            </div>
            <div class="secao-conta">
                <div class="botao-logout header__botao">
                    <div class="icone botao-perfil__icone"></div>
                    <p><?php session_start(); if ($_SESSION != null && array_key_exists($_SESSION['usuario'])) echo $_SESSION['usuario']; else echo "Perfil";?></p>
                </div>   
                <a class="botao-logout header__botao" href="./php/logout.php">
                    <div class="icone botao-logout__icone"></div>
                    <p>Sair da conta</p>
                </a>
            </div>
        </div>
    </header>
   
    <div class="texto">
        <h1>Entre em Contato</h1>
            <p>Para entrar em contato conosco, por favor, ligue para o número abaixo:</p>
           <p> ou entre em contato pelo nosso email: </p>
        </div>
        </div>
    </div>
</body>
</html>
