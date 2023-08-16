async function onClickPessoaCreate (oBotao) {
    await Swal.fire({
        title: 'Incluir dados da Pessoa',
        html:
            '<label for="cpf">CPF</label>' +
            '<input id="cpf" minlength="11" maxlength="11" class="swal2-input">' +
            '<br>' + 
            '<label for="nome">Nome</label>' +
            '<input id="nome" maxlength="200" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            let sCpf = document.getElementById("cpf").value;
            let sNome = document.getElementById("nome").value;
            if (/[0-9]/.test(sCpf) && sCpf.length == 11 && sNome) {
                return {sCpf: sCpf, sNome: sNome};
            }
            return false;
        }
    }).then(async resolve => {
        if (resolve && resolve.value) {
            let { sCpf, sNome } = resolve.value;

            let oFormData = new FormData();
            oFormData.append("cpf", sCpf);
            oFormData.append("nome", sNome);

            let sType = oBotao.getAttribute('type');
            let sAction = oBotao.getAttribute('action');
            let oLocation = window.location;
            
            let sUrl = `${oLocation.origin}/${sType}/${sAction}`;
            await fetch(sUrl, {
                method: 'post',
                body: oFormData
            }).then(resolve => {
                if (resolve) {
                    reload();
                }
            })
        }
    });
}

async function onClickPessoaUpdate (oBotao) {
    let sCpf = oBotao.getAttribute('cpf');
    let sNome = oBotao.getAttribute('nome');

    await Swal.fire({
        title: 'Editar dados da Pessoa',
        html:
            '<label for="cpf">CPF</label>' +
            '<input disabled id="cpf" minlength="11" maxlength="11" value="' + sCpf + '" class="swal2-input">' +
            '<br>' + 
            '<label for="nome">Nome</label>' +
            '<input id="nome" maxlength="200" value="' + sNome + '" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            let sCpf = document.getElementById("cpf").value;
            let sNome = document.getElementById("nome").value;
            if (/[0-9]/.test(sCpf) && sCpf.length == 11 && sNome) {
                return {sCpf: sCpf, sNome: sNome};
            }
            return false;
        }
    }).then(async resolve => {
        if (resolve && resolve.value) {
            let { sCpf, sNome } = resolve.value;

            let oFormData = new FormData();
            oFormData.append("cpf", sCpf);
            oFormData.append("nome", sNome);

            let sType = oBotao.getAttribute('type');
            let sAction = oBotao.getAttribute('action');
            let oLocation = window.location;
            
            let sUrl = `${oLocation.origin}/${sType}/${sAction}`;
            await fetch(sUrl, {
                method: 'post',
                body: oFormData
            }).then(resolve => {
                if (resolve) {
                    reload();
                }
            })
        }
    });
}

async function onClickPessoaDelete (oBotao) {
    let sCpf = oBotao.getAttribute('cpf');
    let sNome = oBotao.getAttribute('nome');

    await Swal.fire(
        '',
        'Realmente deseja excluir a pessoa ' + sNome + '?',
        'question'
    ).then(async resolve => {
        if (resolve && resolve.isConfirmed) {

            let oFormData = new FormData();
            oFormData.append("cpf", sCpf);

            let sType = oBotao.getAttribute('type');
            let sAction = oBotao.getAttribute('action');
            let oLocation = window.location;
            
            let sUrl = `${oLocation.origin}/${sType}/${sAction}`;
            await fetch(sUrl, {
                method: 'post',
                body: oFormData
            }).then(resolve => {
                if (resolve) {
                    reload();
                }
            })
        }
    });
}