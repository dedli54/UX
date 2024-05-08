document.addEventListener('DOMContentLoaded', function() {
    var abrirModal = document.getElementById('abrirModal');
    var modal = document.getElementById('miModal');
    var cerrarModal = document.getElementById('cerrarModal');

    abrirModal.addEventListener('click', function() {
        modal.style.display = 'block';
    });

    cerrarModal.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    });
});
