function pegar_dados(id, nome) {
    document.getElementById("nome_pessoa").innerHTML = nome;
    document.getElementById("cod_pessoa_input").value = id;
}

document.addEventListener("DOMContentLoaded", function () {
    const inputBusca = document.querySelector('input[name="busca"]');
    const formBusca = document.querySelector("form.d-flex");
    const corpoTabela = document.querySelector("tbody");

    function realizarBusca(valor) {
        fetch(`${urlPesquisar}?busca=${valor}`, {
            headers: { "X-Requested-With": "XMLHttpRequest" },
        })
            .then((response) => response.text())
            .then((html) => {
                corpoTabela.innerHTML = html;
            })
            .catch((error) => console.warn("Erro na busca:", error));
    }

    if (inputBusca) {
        inputBusca.addEventListener("keyup", function () {
            realizarBusca(this.value);
        });
    }

    if (formBusca) {
        formBusca.addEventListener("submit", function (e) {
            e.preventDefault();
            realizarBusca(inputBusca.value);
        });
    }

    const formExcluir = document.getElementById("formExcluir");

    if (formExcluir) {
        formExcluir.addEventListener("submit", function (e) {
            e.preventDefault();
            const id = document.getElementById("cod_pessoa_input").value;
            fetch(urlExcluir, {
                method: "POST",
                body: new FormData(this),
                headers: { "X-Requested-With": "XMLHttpRequest" },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        bootstrap.Modal.getInstance(
                            document.getElementById("exampleModal"),
                        ).hide();
                        document.getElementById("linha-" + id).remove();
                    }
                })
                .catch((error) => console.warn("Erro ao excluir:", error));
        });
    }
});
