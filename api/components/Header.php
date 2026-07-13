<?php   
    require_once __DIR__ . '/../config.php';
    include COMPONENTS_PATH . 'imgPerfil.php';
?>

<header id="header">
    <a href="<?= BASE_URL ?>/visao" id="logo">click!</a>
    <div>
        <input type="text" name="pesquisa" id="pesquisa">
        <?php 
            if ($logado) {
                ?>
                <img src=
                    <?php
                        echo BASE_URL . "/public/imgs/" . $imgPerfil["img_perfil"];
                    ?>
                 onClick="toggleMenu()" class="profileImg">
                <div id="menu">
                    <h3>Bem vindo, <?=$imgPerfil["nome"]?></h3>
                
                    <a href="<?= BASE_URL ?>/visao/perfil.php?usuario=<?=$imgPerfil["username"]?>" class="editarperfil">
                        <i class="fa-solid fa-user"></i>
                        Meu Perfil
                    </a>
                    <a href="<?= BASE_URL ?>/processadores/processar-loggout.php?token=<?=md5(session_id())?>" class="deslogar">Sair</a>
                </div>
                <?php
            } else {
                ?>
                <div class="conta">
                    <a href="<?= BASE_URL ?>/visao/login.php">Entrar</a>
                    <a href="<?= BASE_URL ?>/visao/cadastro.php">Criar conta</a>
                </div>
                <?php
            }
        

        ?>
    </div>  
</header>