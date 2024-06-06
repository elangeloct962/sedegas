<?php
ob_start();
?>
<form method="post" action="<?= admin_url('admin-post.php') ?>" class="frm-detail-fruits">

    <div class="form-group row">
        <label for="suscriptor" class="col-sm-2 col-form-label">Suscriptor</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="suscriptor" id="suscriptor" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="cedula" class="col-sm-2 col-form-label">Cedula</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cedula" id="cedula" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="direccionservicio" class="col-sm-2 col-form-label">Direccion</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="direccionservicio" id="direccionservicio" required value="">
        </div>
    </div>

    <div class="form-group row">
        <label for="sector" class="col-sm-2 col-form-label">Sector</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="sector" id="sector" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="telefonoservicio" class="col-sm-2 col-form-label">Telefono</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="telefonoservicio" id="telefonoservicio" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="tipo" id="tipo" required value="">
        </div>
    </div>
    <div class="form-group row">
        <label for="numcontrato" class="col-sm-2 col-form-label">Contrato</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="numcontrato" id="numcontrato" required value="">
        </div>
    </div>
    <div class="form-group row">

        <div class="form-group row">
            <label for="fecha_inscripcion" class="col-sm-2 col-form-label">Inscritoro</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="fecha_inscripcion" id="fecha_inscripcion" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p20212022" class="col-sm-2 col-form-label">P21y22</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p20212022" id="p20212022" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p2023t1" class="col-sm-2 col-form-label">P2023t1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p2023t1" id="p2023t1" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p2023t2" class="col-sm-2 col-form-label">p2023t2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p2023t2" id="p2023t2" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p2023t3" class="col-sm-2 col-form-label">p2023t3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p2023t3" id="p2023t3" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p2023t4" class="col-sm-2 col-form-label">p2023t4</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p2023t4" id="p2023t4" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p2024t3" class="col-sm-2 col-form-label">p2024t3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p2024t3" id="p2024t3" required value="">
            </div>
        </div>
        <div class="form-group row">
            <label for="p2024t4" class="col-sm-2 col-form-label">p2024t4</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="p2024t4" id="p2024t4" required value="">
            </div>
        </div>


        <div>
            <input type="hidden" name="id" value="0">
            <?php wp_nonce_field('contratos-nonce', 'nonce'); ?>
            <input type="hidden" name="action" value="save_custom_contratos">
            <button type="submit" class="btn btn-success" class="btn btn-primary"><span class="dashicons dashicons-yes-alt"></span> Guardar</button>

        </div>

</form>

<?php
$str_form = ob_get_contents();
ob_end_clean();

return $str_form;
