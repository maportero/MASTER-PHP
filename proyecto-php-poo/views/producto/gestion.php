<h1>Gestion de Productos</h1>
<a class='button button-small' href='<?= base_url?>producto/crear'>
    Crear Producto   
</a>

<table >
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
    </tr>
<?php while ($prod = $productos->fetch_object()): ?>
    <tr>
            <td><?= $prod->id ?></td>
            <td><?= $prod->nombre ?></td>
            <td><?= $prod->precio ?></td>
            <td><?= $prod->stock ?></td>
    </tr>
<?php endwhile; ?>

</table>
