
<div class="panel">
    <h3>Añadir productos para venta conjunta</h3>
    <p>Esta funcionalidad te permitirá determinar qué productos quieres que se propongan para su venta conjunta</p>
    <label for="compraconjunta_select">Seleccionar producto:</label>
    <select id="compraconjunta_select" name="compraconjunta_select">
        <option value="">- Selecciona productos para compra relacionada -</option>
        {foreach $products as $product}
            <option value="{$product.id_product}">{$product.name}</option>
        {/foreach}
    </select>
    <button id="addProductButton">Agregar Producto para venta relacionada</button> 
    <button id="saveProductsButton">Mostrar estos productos para venta recomendada</button>

    <div id="selectedProducts">
    {if $selectedProducts}
        <h4>Productos seleccionados:</h4>
        <ul>
            {foreach $selectedProducts as $productId}
                {assign var='productInfo' value=Product::getProduct($productId)}
                <li>{$productInfo.name} <button class="deleteProductButton" data-productid="{$productId}">Eliminar</button></li>
            {/foreach}
        </ul>
            

                

    {else}
        <p>No hay productos seleccionados.</p>
    {/if}
</div>

    <script src="{$module_dir}views/js/custom.js"></script>

</div>