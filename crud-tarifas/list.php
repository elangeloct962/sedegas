<?php
?>
<style>
#customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td,
#customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even) {
    background-color: #f2f2f2;
}

#customers tr:hover {
    background-color: #ddd;
}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #04AA6D;
    color: white;
}

#customers td:nth-child(8) {

    text-align: center;

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
global $wpdb;

$items = $wpdb->get_results("SELECT * FROM " . TABLE_NAME);

$html = '<div>
			<a href="?action=new"><button type="button" class="btn btn-primary"><span class="dashicons dashicons-insert"></span> Agregar</button></a>
		</div>';

if ($result !== false) {
	if ($result >= 0) {
		$html .= '<div class="message">Los datos se guardaron correctamente</div>';
	} else {
		$html .= '<div class="message">Hubo un error al guardar los cambios</div>';
	}
}

//<span class='dashicons dashicons-edit-page'>
//<span class='dashicons dashicons-trash'>
// nombre de los campos de la tabla
//	<td>' . $item->titulo . '</td>
//<td>' . $item->Comentario . '</td>
foreach ($items as $item) {
	$html .= '<tr>
				<td>' . $item->codServicio . '</td>
				<td>' . $item->descricioServicio . '</td>
				<td>' . $item->tipoServicio . '</td>
				<td>' . $item->condicionSevicio . '</td>
				<td>' . date_format(date_create($item->vigenciaSrart), 'd-m-Y') . '</td>
				<td>' . date_format(date_create($item->vigenciaEnd), 'd-m-Y') . '</td>
				<td>' . $item->montoPagar . '</td>
			
				<td style="aling:center;">
					<a href="?action=edit&id=' . $item->codServicio . '"><button type="button" class="btn btn-warning"><span class="dashicons dashicons-edit-page"></span></button> </a>
					<a href="?action=delete&id=' . $item->codServicio . '"><button type="button" class="btn btn-danger"><span class="dashicons dashicons-trash"></span></button></a>
				</td>
			</tr>';
}
// codServicio, descricioServicio, tipoServicio, condicionSevicio, 
//vigenciaSrart, vigenciaEnd, montoPagar, titulo, Comentario/
//<th>Titulo</th>
//<th>Observacion</th>
$template = '<table class="table-data"  id="customers">
			          <tr>
			            <th>ID</th>
			            <th>Descripcion</th>
			            <th>Tipo</th>
			            <th>Condicion</th>
			            <th>Desde</th>
						<th>Hasta</th>
			            <th>Monto</th>
					

			            <th>Acciones</th>
			          </tr>
			          {data}
			        </table>';

return str_replace('{data}', $html, $template);