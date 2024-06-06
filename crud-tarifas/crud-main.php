<?php
const SLUG_PAGE  = 'lista-tarifas'; //slug de la página en donde se mostrará la tabla
const TABLE_NAME = 'sg_listaservcios'; // nombre de la tabla

// Show list or forms

//SELECT codServicio, descricioServicio, tipoServicio, condicionSevicio, 
//vigenciaSrart, vigenciaEnd, montoPagar, titulo, Comentario FROM 
//sg_listaservcios WHERE 1
add_filter('the_content', 'sedegas_list_tarifas_data');

function sedegas_list_tarifas_data($content)
{
	$custom = '';

	if (is_page(SLUG_PAGE)) {
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
add_action('admin_post_nopriv_save_custom_tarifas', 'process_save_custom_tarifas');
add_action('admin_post_save_custom_tarifas', 'process_save_custom_tarifas');

function process_save_custom_tarifas()
{
	global $wpdb;

	verify_nonce();
	verify_user();

	$id              = intval($_POST['id']);
	$data            = [];

	//$data['codServicio']    = sanitize_text_field($_POST['codServicio']);
	$data['tipoServicio']    = sanitize_text_field($_POST['tipoServicio']);
	$data['descricioServicio']    = sanitize_text_field($_POST['descricioServicio']);
	$data['condicionSevicio']    = sanitize_text_field($_POST['condicionSevicio']);
	$data['vigenciaSrart']    = sanitize_text_field($_POST['vigenciaSrart']);
	$data['vigenciaEnd']    = sanitize_text_field($_POST['vigenciaEnd']);
	$data['montoPagar']    = (float) ($_POST['montoPagar']);
	$data['titulo']    = sanitize_text_field($_POST['titulo']);
	$data['Comentario']    = sanitize_text_field($_POST['Comentario']);
	$result = false;
	if ($id > 0) {
		$result = $wpdb->update(TABLE_NAME, $data, ['codServicio' => $id]);
	} elseif ($id === 0) {
		$result = $wpdb->insert(TABLE_NAME, $data);
	}

	wp_redirect(home_url(SLUG_PAGE) . '?result=' . $result);
	exit;
}


// Process Save
add_action('admin_post_nopriv_delete_custom_tarifas', 'process_delete_custom_tarifas');
add_action('admin_post_delete_custom_tarifas', 'process_delete_custom_tarifas');

function process_delete_custom_tarifas()
{
	global $wpdb;

	verify_nonce();
	verify_user();

	$id = intval($_POST['id']);

	$result = false;
	if ($id > 0) {
		$wpdb->delete(TABLE_NAME, ['codServicio' => $id]);
	}
	wp_redirect(home_url(SLUG_PAGE));
	exit;
}


function verify_nonce()
{
	if (!wp_verify_nonce($_POST['nonce'] ?? '', 'tarifas-nonce')) {
		wp_redirect(home_url(SLUG_PAGE) . '?result=-1');
		exit;
	}
}

function verify_user()
{
	$user = wp_get_current_user();
	$allowed_roles = array('editor', 'administrator', 'author');
	if (count(array_intersect($allowed_roles, $user->roles)) === 0) {
		wp_redirect(home_url(SLUG_PAGE) . '?result=-1');
		exit;
	}
}