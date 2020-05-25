<!DOCTYOPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Tienda de Camisetas</title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css" />
    </head>
    <body>
        <div id="container">
            <!-- CEBECERA -->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" /> 
                    <a href="index.php">Tienda de Camisetas</a>
                </div>

            </header>

            <!-- MENU -->
            <?php $categorias = Utils::showCategoria(); ?>
            <nav id="menu" >

                <ul>
                    <li>
                        <a href="<?= base_url ?>">
                            Inicio
                        </a>
                    </li>
                    <?php while ($categoria = $categorias->fetch_object()) : ?>
                        <li>
                            <a href="<?= base_url ?>producto/gestion" >
                                <?= $categoria->nombre ?>
                            </a>
                        </li>        
                    <?php endwhile; ?>
                </ul>             
            </nav>

            <div id="content">