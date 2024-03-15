const deleteBtn = document.getElementById('deleteBtn');

deleteBtn.addEventListener('click', () => {
    const deleteForm = document.getElementById('deleteForm');

    if (!confirm('¿Deseas borrar el registro?')) {
        return;
    }

    deleteForm.submit();
});