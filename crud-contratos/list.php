<?php
?>
<style>
	#tarifas {
		font-family: Arial, Helvetica, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	#tarifas td,
	#tarifas th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	#tarifas tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	#tarifas tr:hover {
		background-color: #ddd;
	}

	#tarifas th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #04AA6D;
		color: white;
	}

	#tarifas td:nth-child(8) {

		text-align: center;

	}

	#tarifas td:nth-child(2) {

		text-align: left;

	}

	#tarifas td:nth-child(4) {

		text-align: left;

	}

	.frm-detail-fruits label {
		width: 200px;
		display: inline-block;
	}

	.frm-detail-fruits>div {
		margin-bottom: 20px;
	}

	.message {
		border: 1px solid grey;
		padding: 10px 20px;
		margin: 20px auto 30px;
	}
</style>
<?php



$html = '<div><form>
<input type="search" name="search" id="name" placeholder="Buscar..." required>
<input type="submit" value="Buscar">
</form>
</div>

<div>
    <a href="?action=new"><button type="button" class="btn btn-primary"><span class="dashicons dashicons-insert"></span>
            Agregar</button></a>
</div>';

if ($result !== false) {
	if ($result >= 0) {
		$html .= '<div class="message">Los datos se guardaron correctamente</div>';
	} else {
		$html .= '<div class="message">Hubo un error al guardar los cambios</div>';
	}
}


global $wpdb;

$search = isset($_GET['search']) ? $_GET['search'] : '';
$table_name = 'sg_maestro';
$field_search1 = 'suscriptor';
$field_search2 = 'cedula';
$field_search3 = 'numcontrato';
if ($search) {
	$sql = "SELECT * FROM {$table_name}
WHERE $field_search3 = '{$search}' OR $field_search2 = '{$search}' OR $field_search1 LIKE '%{$search}%'";

	$items = $wpdb->get_results($sql);




	foreach ($items as $item) {
		$html .= '<tr>
    <td>' . $item->idregistro . '</td>
    <td>' . $item->suscriptor . '</td>
    <td>' . $item->cedula . '</td>
    <td>' . $item->direccionservicio . '</td>
    <td>' . date_format(date_create($item->fecha_inscripcion), 'd-m-Y') . '</td>
    <td>' . $item->numcontrato . '</td>
    <td>' . $item->tipo . '</td>

    <td style="aling:center;">
        <a href="?action=edit&id=' . $item->idregistro . '"><button type="button" class="btn btn-warning"><span
                    class="dashicons dashicons-edit-page"></span></button> </a>
        <a href="?action=delete&id=' . $item->idregistro . '"><button type="button" class="btn btn-danger"><span
                    class="dashicons dashicons-trash"></span></button></a>
    </td>
</tr>';
	}
}
$template = '<table class="table-data" id="tarifas">
    <tr>
        <th>ID</th>
        <th>Suscriptor</th>
        <th>Cedula</th>
        <th>Direccion</th>
        <th>Inscrito</th>
        <th>Contrato</th>
        <th>Tipo</th>
        <th>Acciones</th>
    </tr>
    {data}
</table>';

return str_replace('{data}', $html, $template);
