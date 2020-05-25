<h1>Crear Producto</h1>
<dir class="form_container">
    <form action="<?= base_url ?>producto/save" method="POST">
        <label for="nombre" >Nombre</label>
        <input type="text" name="nombre" required/>
        <label for="nombre" >Descripcion</label>
        <textarea  name="descripcion" ></textarea>
        <label for="categoria" >Categoria</label>
        <?php $categorias = Utils::showCategoria(); ?>
        <select name="categoria" required="">
            <?php while ($cat = $categorias->fetch_object()) : ?>
                <option value="<?= $cat->id; ?>"><?= $cat->nombre; ?></option>
            <?php endwhile; ?>
        </select>
        <label for="precio" >Precio</label>
        <input type="number" name="precio" required/>
        <label for="stock" >Stock</label>
        <input type="number" name="stock" required/>
        <label for="oferta" >Oferta</label>
        <input type="number" name="oferta" required/>
        <label for="imagen" >Imagen</label>
        <input type="file" name="imagen"/>
        <input type="submit" value="Guardar"/>
    </form>
</dir>>