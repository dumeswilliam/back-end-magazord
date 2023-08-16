<?php
use \Will\Project\View\Html;
Html::init();
?>

<section class="center">
    <div class="center main">
        <label for="search"><?= $sTitle ?></label>
        <button class="center" cpf="<?= $sCpf ?>" type="pessoacontato" action="create" onclick="onClickPessoaContatoCreate(this)">Adicionar</button>
        <button class="center" onclick="main()">Voltar</button>
    </div>
    <?php foreach ($aContatos as $oContato): ?>
        <div class="center linha_consulta">
            <p class="id center">Id: <?= $oContato->getId() ?></p>
            <p class="tipo center">Tipo: <?= $oContato->getTipo() ?></p>
            <p class="desc center">Descrição: <?= $oContato->getDescricao() ?></p>
            <button class="center" id="<?= $oContato->getId() ?>" desc="<?= $oContato->getDescricao() ?>" tipo="<?= $oContato->getTipo() ?>" type="pessoacontato" action="update" onclick="onClickPessoaContatoUpdate(this)">Editar</button>
            <button class="center" id="<?= $oContato->getId() ?>" desc="<?= $oContato->getDescricao() ?>" tipo="<?= $oContato->getTipo() ?>" type="pessoacontato" action="delete" onclick="onClickPessoaContatoDelete(this)">Excluir</button>
        </div>
    <?php endforeach; ?>
</section>

<?php
Html::end();
?>