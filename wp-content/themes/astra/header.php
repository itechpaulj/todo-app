<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>

<?php $current_user = wp_get_current_user();?>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php 
if ( apply_filters( 'astra_header_profile_gmpg_link', true ) ) {
	?>
	 <link rel="profile" href="https://gmpg.org/xfn/11"> 
	
	 <?php
} 
?>

<?php wp_head(); ?>

<?php astra_head_bottom(); ?>

</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>

<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_attr( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div

<?php

	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',

		)
	);
	
	?>
>

	<?php
	astra_header_before();
	?>
	
	<?php
	astra_header();
	?>
	
	<?php
	astra_content_before();
	?>

	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
<input type="hidden" id="role" value="<?= $current_user->roles[0] ?? ""  ?>"  />
<script>
	let profileAccount = document.querySelector(`[data-id="db334a4"]`);
	let role = document.getElementById('role').value;
	let getAccountBtn = document.getElementById('acc-btn')
	let getTodoMessageBtn = document.getElementById('todo-message');
	
	profileAccount.style.display = "";
	if(getAccountBtn || getTodoMessageBtn){
		getAccountBtn.style.display = 'relative';
		getTodoMessageBtn.style.display = 'relative';
		if (role === "") {
			console.log('clicked')
			getAccountBtn.style.display = 'none';
			getAccountBtn.remove();

			getTodoMessageBtn.style.display = 'none';
			getTodoMessageBtn.remove();
		} 

	}

</script>