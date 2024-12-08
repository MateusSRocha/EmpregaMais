async function opcoesEmpresas(text) {
    let resultados = document.querySelector("div.search-item-result");
    if (text.length >= 2) {
        const dados = await fetch("public/api/pesquisarEmpresas.php?texto=" + text);
        const resposta = await dados.json();

        resultados.style.display = "block";
        resultados.innerHTML = "";
        resposta.forEach(element => {
            resultados.innerHTML += "<a href='pesquisaEmpresa.php&pesquisa=" + element[0] + "' class='link_pes'><p>" + element[0] + "</p></a>"
        });
    } else {
        resultados.style.display = "none";
    }
}

function procuraEmpresas() {
    let texto = document.querySelector("#procura").value;
    window.location.href = "pesquisaEmpresa.php&pesquisa=" + texto;
}