function submitDeleteForm () {
    const deleteForm = document.getElementById('deleteForm');

    if (!confirm('¿Deseas borrar el registro?')) {
        return;
    }

    deleteForm.submit();
}