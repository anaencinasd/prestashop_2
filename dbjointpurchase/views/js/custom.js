var selectedProducts = [];

document.getElementById('addProductButton').addEventListener('click', function() {
    var select = document.getElementById('compraconjunta_select');
    var productId = select.value;
    
    
    if (selectedProducts.length >= 3) {
        alert('Ya has seleccionado el máximo de tres productos.');
        return;
    }

    if (productId !== '') {
       
        selectedProducts.push(productId);
        updateSelectedProductsView();
    }
});

document.addEventListener('click', function(event) {
    if (event.target.classList.contains('deleteProductButton')) {
        var productId = event.target.getAttribute('data-productid');
        
        selectedProducts = selectedProducts.filter(function(id) {
            return id !== productId;
        });
        updateSelectedProductsView();
    }
});

function updateSelectedProductsView() {
    var selectedProductsContainer = document.getElementById('selectedProducts');
    var html = '<h4>Productos seleccionados:</h4><ul>';
    selectedProducts.forEach(function(productId) {
        var productName = document.querySelector('#compraconjunta_select option[value="' + productId + '"]').innerText;
        html += '<li>' + productName + ' <button class="deleteProductButton" data-productid="' + productId + '">Eliminar</button></li>';
    });
    html += '</ul>';
    selectedProductsContainer.innerHTML = html;
}
document.getElementById('saveProductsButton').addEventListener('click', function() {
  
    var formData = new FormData();
    formData.append('action', 'saveSelectedProducts');
    formData.append('id_product', productId); 
    console.log(productId)
    formData.append('selectedProducts', JSON.stringify(selectedProducts));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax.php', true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            console.log(xhr.responseText); 
        }
    };
    xhr.send(formData);
});





