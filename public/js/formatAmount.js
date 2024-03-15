// Función para reformatear un número con coma a uno con punto como separador decimal
function reformatearNumero (numero) {
    // Eliminar cualquier carácter que no sea un número o un punto
    var numeroReformateado = numero.replace(/[^0-9.]/g, '');

    // Limitar la cantidad de decimales a dos
    var partes = numeroReformateado.split('.');
    if (partes.length > 1) {
        partes[1] = partes[1].slice(0, 2); // Limitar a dos decimales
        numeroReformateado = partes.join('.');
    }

    // Asegurarse de que solo hay un punto como separador decimal
    var puntos = numeroReformateado.split('.').length - 1;
    if (puntos > 1) {
        // Si hay más de un punto, eliminar los puntos adicionales
        numeroReformateado = numeroReformateado.replace(/\./g, (match, offset, string) => {
            return offset ? '' : match;
        });
    }
    return numeroReformateado;
}

// Obtener el input
var inputNumero = document.getElementById('amount');

// Agregar un listener para el evento input
inputNumero.addEventListener('input', (event) => {
    // Obtener el valor actual del input
    var valor = event.target.value;

    // Reformatear el número
    var numeroReformateado = reformatearNumero(valor);

    // Actualizar el valor del input con el número reformateado
    event.target.value = numeroReformateado;
});