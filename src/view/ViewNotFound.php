<?php
use \Will\Project\View\Html;
Html::init();
?>

<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops... 404',
        text: 'Página não encontrada!',
        confirmButtonText: 'Voltar'
    }).then(result => {
        let oLocation = window.location;
        oLocation.replace(oLocation.origin + '/pessoa');
    });
</script>

<?php
Html::end();
?>