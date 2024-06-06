<?php
const SLUG_PAGEC  = 'listar-contratos'; //slug de la página en donde se mostrará la tabla
const TABLE_NAMEC = 'sg_maestro'; // nombre de la tabla


add_filter('the_content', 'sedegas_list_contratos_data');

function sedegas_list_contratos_data($content)
{
	$custom = '';

	if (is_page(SLUG_PAGEC)) {
		$id     = $_GET['id'] ?? 0;
		$action = $_GET['action'] ?? '';

		if ($action == 'new') {
			$custom = require('new.php');
		} elseif ($id && $action == 'edit') {
			$custom = require('edit.php');
		} elseif ($id && $action == 'delete') {
			$custom = require('delete.php');
		} else {
			$result = $_GET['result'] ?? false;
			$custom = require('list.php');
		}
	}

	return $content . $custom;
}

// Process Save
add_action('admin_post_nopriv_save_custom_contratos', 'process_save_custom_contratos');
add_action('admin_post_save_custom_contratos', 'process_save_custom_contratos');

function process_save_custom_contratos()
{
	global $wpdb;

	verify_nonce_contratos();
	verify_user_contratos();

	$id              = intval($_POST['id']);
	$data            = [];

	$data['suscriptor']    = sanitize_text_field($_POST['suscriptor']);
	$data['cedula']    = sanitize_text_field($_POST['cedula']);
	$data['direccionservicio']    = sanitize_text_field($_POST['direccionservicio']);
	$data['sector']    = sanitize_text_field($_POST['sector']);
	$data['telefonoservicio']    = sanitize_text_field($_POST['telefonoservicio']);
	$data['tipo']    = sanitize_text_field($_POST['tipo']);
	$data['numcontrato']    = sanitize_text_field($_POST['numcontrato']);
	$data['fecha_inscripcion']    = sanitize_text_field($_POST['fecha_inscripcion']);
	$data['numero']    = sanitize_text_field($_POST['numero']);
	$data['p20212022']    = (float) ($_POST['p20212022']);
	$data['p2023t1']    = (float) ($_POST['p2023t1']);
	$data['p2023t2']    = (float) ($_POST['p2023t2']);
	$data['p2023t3']    = (float) ($_POST['p2023t3']);
	$data['p2023t4']    = (float) ($_POST['p2023t4']);
	$data['p2024t1']    = (float) ($_POST['p2024t1']);
	$data['p2024t2']    = (float) ($_POST['p2024t2']);
	$data['p2024t3']    = (float) ($_POST['p2024t3']);
	$data['p2024t4']    = (float) ($_POST['p2024t4']);



	$result = false;
	if ($id > 0) {
		$result = $wpdb->update(TABLE_NAMEC, $data, ['idregistro' => $id]);
	} elseif ($id === 0) {
		$result = $wpdb->insert(TABLE_NAMEC, $data);
	}

	wp_redirect(home_url(SLUG_PAGEC) . '?result=' . $result);
	exit;
}


// Process Save
add_action('admin_post_nopriv_delete_custom_contratos', 'process_delete_custom_contratos');
add_action('admin_post_delete_custom_contratos', 'process_delete_custom_contratos');

function process_delete_custom_contratos()
{
	global $wpdb;

	verify_nonce_contratos();
	verify_user_contratos();

	$id = intval($_POST['id']);

	$result = false;
	if ($id > 0) {
		$wpdb->delete(TABLE_NAMEC, ['idregistro' => $id]);
	}
	wp_redirect(home_url(SLUG_PAGEC));
	exit;
}


function verify_nonce_contratos()
{
	if (!wp_verify_nonce($_POST['nonce'] ?? '', 'contratos-nonce')) {
		wp_redirect(home_url(SLUG_PAGEC) . '?result=-1');
		exit;
	}
}

function verify_user_contratos()
{
	$user = wp_get_current_user();
	$allowed_roles = array('editor', 'administrator', 'author');
	if (count(array_intersect($allowed_roles, $user->roles)) === 0) {
		wp_redirect(home_url(SLUG_PAGEC) . '?result=-1');
		exit;
	}
}
