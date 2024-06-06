<?php

global $wpdb;

$sql  = $wpdb->prepare("SELECT suscriptor FROM " . TABLE_NAMEC . " WHERE idregistro = %d", $id);
$name = $wpdb->get_var($sql);

ob_start();
?>

<h3>¿Estas seguro de eliminar <?= $name ?>?</h3>

<form method="post" action="<?= admin_url('admin-post.php') ?>" class="frm-detail-fruits">
    <input type="hidden" name="id" value="<?= $id ?>">
    <?php wp_nonce_field('contratos-nonce', 'nonce'); ?>
    <input type="hidden" name="action" value="delete_custom_contratos">
    <button type="submit" class="btn btn-danger" class="btn btn-danger"><span class="dashicons dashicons-trash"></span>
        Borrar</button>
    <a href="<?= home_url(SLUG_PAGEC) ?>"><button type="button" class="btn btn-info"><span class="dashicons dashicons-no"></span> Cancelar</button></a>
</form>

<?php
$str_form = ob_get_contents();
ob_end_clean();

return $str_form;
