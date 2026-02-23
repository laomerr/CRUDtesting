document.addEventListener("DOMContentLoaded", function() {
    const formEditar = document.querySelector('form');

    if (formEditar) {
        formEditar.addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch(urlEditar, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Informações atualizadas com sucesso via AJAX!');
                    window.location.href = '/pesquisar';
                }
            })
            .catch(erro => console.warn('Erro ao atualizar:', erro));
        });
    }
});
