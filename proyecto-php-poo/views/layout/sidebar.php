
<!-- BARRA LATERAL -->

<aside id="lateral">
    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])): ?>
            <h3>Entrar a la Web</h3>
            <?php if (isset($_SESSION['error_login'])) : ?>
                <strong class='error_login'> 
                    <?= $_SESSION['error_login'] ?>
                </strong>
            <?php endif; ?>
            <form action="<?= base_url ?>usuario/login" method="POST" >
                <label for="email">Email</label>
                <input name="email" type="email">
                <label for="password">Contraseña</label>
                <input name="password" type="password">
                <input type="submit" value="Enviar">
            </form>
            <ul>
                <li><a href="<?=base_url?>usuario/register">Nuevo Registro</a></li>
            </ul>
        <?php else:?>
           <h3>Bienvenido, <?= $_SESSION['identity']->nombre; ?> <?= $_SESSION['identity']->apellidos; ?></h3>
        <?php Utils::deleteSession("error_login");?> 
        <ul>
            <li><a href="#">Mis Pedidos</a></li>
            <?php if (isset($_SESSION['admin'])): ?>
                <li><a href="<?=base_url?>producto/gestion">Gestionar Productos</a></li>
                <li><a href="<?=base_url?>pedido/index">Gestionar Pedidos</a></li>
                <li><a href="<?=base_url?>categoria/index">Gestionar Categorias</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])): ?>
                <li><a href="<?=base_url?>usuario/logout">Cerrar sesión</a></li>
            <?php endif; ?>
        </ul>
        <?php endif; ?>
    </div>
</aside>

<!-- CONTENIDO CENTRA -->
<div id="central">