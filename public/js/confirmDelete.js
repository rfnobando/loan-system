function confirmDelete () {
    return confirm('¿Desea borrar el registro?');
}

const deleteButtons = document.querySelectorAll('.delete-btn');

deleteButtons.forEach((deleteBtn) => {
    deleteBtn.onclick = confirmDelete;
});
