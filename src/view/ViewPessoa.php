<?php
use \Will\Project\View\Html;
Html::init();
?>

<section class="center">
    <div class="center main">
        <label for="search"><?= $sTitle ?></label>
        <input id="search" placeholder="Pesquisar" onkeyup="search(this)">
        <button class="center" type="pessoa" action="create" onclick="onClickPessoaCreate(this)">Adicionar</button>
    </div>
    <?php foreach ($aPessoas as $oPessoa): ?>
        <div class="center linha_consulta">
            <p class="cpf center">Cpf: <?= $oPessoa->getCpf() ?></p>
            <p class="nome center">Nome: <?= $oPessoa->getNome() ?></p>
            <button class="center" cpf="<?= $oPessoa->getCpf() ?>" nome="<?= $oPessoa->getNome() ?>" type="pessoacontato" action="read" onclick="onClickPessoaContatoRead(this)">Contatos</button>
            <button class="center" cpf="<?= $oPessoa->getCpf() ?>" nome="<?= $oPessoa->getNome() ?>" type="pessoa" action="update" onclick="onClickPessoaUpdate(this)">Editar</button>
            <button class="center" cpf="<?= $oPessoa->getCpf() ?>" nome="<?= $oPessoa->getNome() ?>" type="pessoa" action="delete" onclick="onClickPessoaDelete(this)">Excluir</button>
        </div>
    <?php endforeach; ?>
</section>

<?php
Html::end();
?>