function reload() {
    window.location.reload();
}

function search(input) {
    let sValue = input.value.toLocaleLowerCase();
    let aPessoas = document.getElementsByClassName('linha_consulta');
    for (oPessoa of aPessoas) {
        let oCpf = oPessoa.getElementsByClassName('cpf').item(0).innerText.toLocaleLowerCase();
        let oNome = oPessoa.getElementsByClassName('nome').item(0).innerText.toLocaleLowerCase();

        if ((oCpf && oCpf.includes(sValue)) || (oNome && oNome.includes(sValue))) {
            oPessoa.style.display = ''
        } else {
            oPessoa.style.display = 'none'
        }
    }
}

function main() {
    let oLocation = window.location;
    oLocation.replace(oLocation.origin + '/pessoa');
}