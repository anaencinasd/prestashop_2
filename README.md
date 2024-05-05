# README - Módulo de Compra Conjunta DB

## Resumen

El módulo de Compra Conjunta DB permite a los clientes comprar productos juntos según su historial de compras conjuntas. Sin embargo, existe un requisito para mejorar esta funcionalidad al permitir que los clientes seleccionen manualmente productos relacionados para cada producto, con un máximo de 3 productos relacionados por producto. Este README proporciona una visión general de los pasos seguidos para agregar esta funcionalidad al módulo.

## Pasos



 **Mejora del Módulo:**
   - Se desarrolló una nueva versión del módulo para incorporar la función de selección manual.
   - Se creó un nuevo hook `hookDisplayAdminProductsExtra` para permitir a los clientes agregar productos relacionados desde la página del producto en el back office.

 **Interfaz del Back Office:**
   - Se añadió funcionalidad para que los clientes seleccionen manualmente productos relacionados desde la página del producto en el back office.
  
  **Modificaciones en la Base de Datos:**
   - Se creó una nueva tabla en la base de datos para almacenar la relación entre productos y sus productos relacionados seleccionados manualmente para la venta.

 **Implementación en el Frontend:**
   - Se implementó la funcionalidad en el frontend utilizando JavaScript para manejar la selección de productos relacionados.
   - Se utilizaron solicitudes AJAX para almacenar los productos relacionados seleccionados en la base de datos.
   - Se implementó un renderizado condicional para mostrar los productos relacionados:
     - Si el producto existe en la tabla `ps_dbjoint_products_custom` como `id_product`, se muestran las personalizaciones asociadas realizadas por el cliente.
     - Si no, el módulo muestra los resultados de manera habitual.

## Mejoras Futuras
- Mejorar la ruta visual e intuitiva a la funcionalidad `hookDisplayAdminProductsExtra` en el back office mediante la modificación del nombre de la pestaña y la ruta.
- Mejorar la interfaz de usuario (UI/UX) del proceso de selección de productos relacionados para hacerlo más amigable.
- Implementar funciones adicionales como opciones de filtrado o selección masiva de productos relacionados para agilizar el proceso de selección manual.
- Optimizar las consultas a la base de datos para un mejor rendimiento, especialmente cuando se manejan un gran número de productos y productos relacionados.

## Contribuyente

- Email: ana.encinasdiaz@gmail.com


