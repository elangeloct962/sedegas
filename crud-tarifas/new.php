<?php
ob_start();
?>
<form method="post" action="<?= admin_url('admin-post.php') ?>" class="frm-detail-fruits">

    <div class="form-group row">
        <label for="descricioServicio" class="col-sm-2 col-form-label">Descricion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="descricioServicio" id="descricioServicio" required value="">
        </div>
    </div>

    <div class="form-group row">
        <label for="tipoServicio" class="col-sm-2 col-form-label">Tipo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="tipoServicio" id="tipoServicio" required value="">
        </div>
    </div>

    <div class="form-group row">
        <label for="condicionSevicio" class="col-sm-2 col-form-label">Condicion</label>
        <div class="col-sm-10">
            <select class="form-control" name="condicionSevicio" id="condicionSevicio">
                <option value="1">FIJO</option>
                <option value="2">ESPECIAL</option>
            </select>
        </div>
    </div>


    <div class="form-group row">
        <label for="vigenciaSrart" class="col-sm-2 col-form-label">Desde</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="vigenciaSrart" id="vigenciaSrart" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="vigenciaEnd" class="col-sm-2 col-form-label">Hasta</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="vigenciaEnd" id="vigenciaEnd" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="montoPagar" class="col-sm-2 col-form-label">Monto</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="montoPagar" id="montoPagar" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="titulo" id="titulo" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="Comentario" class="col-sm-2 col-form-label">Observacion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Comentario" id="Comentario" required value="">
        </div>
    </div>



    <div>
        <input type="hidden" name="id" value="0">
        <?php wp_nonce_field('tarifas-nonce', 'nonce'); ?>
        <input type="hidden" name="action" value="save_custom_tarifas">
        <button type="submit" class="btn btn-success" class="btn btn-primary"><span
                class="dashicons dashicons-yes-alt"></span> Guardar</button>

    </div>
</form>

<?php
$str_form = ob_get_contents();
ob_end_clean();

return $str_form;