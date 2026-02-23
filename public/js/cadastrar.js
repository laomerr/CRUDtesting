document.addEventListener("DOMContentLoaded", function () {
    const formCadastro = document.querySelector("form");

    if (formCadastro) {
        formCadastro.addEventListener("submit", function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            fetch(urlCadastrar, {
                method: "POST",
                body: formData,
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        alert("Empresa cadastrada com sucesso via AJAX!");
                        window.location.href = "/home";
                    }
                })
                .catch((erro) => console.warn("Erro ao salvar:", erro));
        });
    }
});
