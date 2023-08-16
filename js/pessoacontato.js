async function onClickPessoaContatoRead (oBotao) {
    let sCpf = oBotao.getAttribute('cpf');
    let oLocation = window.location;
    oLocation.replace(oLocation.origin + '/pessoacontato?cpf=' + sCpf);
}

async function onClickPessoaContatoCreate (oBotao) {
    let sCpf = oBotao.getAttribute('cpf');

    await Swal.fire({
        title: 'Incluir Contato da Pessoa',
        html:
            '<label for="tipo">Tipo</label>' +
            '<select id="tipo" class="swal2-input"><option value="Telefone">Telefone</option><option value="e-Mail">e-Mail</option></select>' + 
            '<br>' + 
            '<label for="desc">Descrição</label>' +
            '<input id="desc" maxlength="100" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            let sTipo = document.getElementById("tipo").value;
            let sDesc = document.getElementById("desc").value;
            if (sTipo && sDesc) {
                return {sTipo: sTipo, sDesc: sDesc};
            }
            return false;
        }
    }).then(async resolve => {
        if (resolve && resolve.value) {
            let { sTipo, sDesc } = resolve.value;

            let oFormData = new FormData();
            oFormData.append("cpf", sCpf);
            oFormData.append("tipo", sTipo);
            oFormData.append("desc", sDesc);

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

async function onClickPessoaContatoUpdate (oBotao) {
    let iId = oBotao.getAttribute('id');
    let sTipo = oBotao.getAttribute('tipo');
    let sDesc = oBotao.getAttribute('desc');

    await Swal.fire({
        title: 'Editar dados do contato',
        html:
            '<label for="tipo">Tipo</label>' +
            '<select disabled id="tipo" class="swal2-input"><option value="Telefone">Telefone</option><option value="e-Mail">e-Mail</option></select>' + 
            '<br>' + 
            '<label for="desc">Descrição</label>' +
            '<input value="' + sDesc + '" id="desc" maxlength="100" class="swal2-input">',
        focusConfirm: false,
        preConfirm: () => {
            let sDesc = document.getElementById("desc").value;
            return sDesc;
        }
    }).then(async resolve => {
        if (resolve && resolve.value) {
            let sDesc = resolve.value;

            let oFormData = new FormData();
            oFormData.append("id", iId);
            oFormData.append("tipo", sTipo);
            oFormData.append("desc", sDesc);

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

async function onClickPessoaContatoDelete (oBotao) {
    let sId = oBotao.getAttribute('id');
    let sDesc = oBotao.getAttribute('desc');

    await Swal.fire(
        '',
        'Realmente deseja excluir o contato ' + sDesc + '?',
        'question'
    ).then(async resolve => {
        if (resolve && resolve.isConfirmed) {
            let oFormData = new FormData();
            oFormData.append("id", sId);

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