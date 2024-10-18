document.getElementById('payment-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    var cardNumber = document.getElementById('card-number').value;
    var expiryDate = document.getElementById('expiry-date').value;
    var cvc = document.getElementById('cvc').value;
    
    if (cardNumber && expiryDate && cvc) {
        // Aquí iría la lógica para procesar el pago
        alert('Pago procesado correctamente');
        // Redirigir a la página de confirmación o procesar el pedido
        // window.location.href = 'confirmacion-pedido.php';
    } else {
        alert('Por favor, complete todos los campos de pago');
    }
});