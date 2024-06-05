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
</style>
<?php
global $wpdb;

$items = $wpdb->get_results("SELECT * FROM " . TABLE_NAME);

$html = '<div>
			<a href="?action=new">Nueva fruta</a>
		</div>';

if ($result !== false) {
	if ($result >= 0) {
		$html .= '<div class="message">Los datos se guardaron correctamente</div>';
	} else {
		$html .= '<div class="message">Hubo un error al guardar los cambios</div>';
	}
}


// nombre de los campos de la tabla
foreach ($items as $item) {
	$html .= '<tr>
				<td>' . $item->id . '</td>
				<td>' . $item->name . '</td>
				<td>' . $item->variety . '</td>
				<td>' . $item->type . '</td>
				<td>' . date_format(date_create($item->date), 'd-m-Y') . '</td>
				<td>' . $item->comment . '</td>
				<td>
					<a href="?action=edit&id=' . $item->id . '">Editar</a>
					<a href="?action=delete&id=' . $item->id . '">Borrar</a>
				</td>
			</tr>';
}

$template = '<table class="table-data"  id="customers">
			          <tr>
			            <th>ID</th>
			            <th>Nombre</th>
			            <th>Variedad</th>
			            <th>Tipo</th>
			            <th>Fecha</th>
			            <th>Comentarios</th>
			            <th>Acciones</th>
			          </tr>
			          {data}
			        </table>';

return str_replace('{data}', $html, $template);