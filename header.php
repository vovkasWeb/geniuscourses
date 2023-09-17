<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Geniuscourses
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- <?php   
//get_template_part('partials/part','two');
?> -->
<?php wp_body_open(); ?>

<?php
//esc_attr() - attributes escape
//esc_html() - html escape
//esc_url() - link escape
//wp_kses() - allowed html escape 
//wp_kses_post()

  $name = 'Alex <a href="#" title="test">Socki</a> <strong>aka CRikova</strong>';
  $args = array(
	'a' => array(
		'href' => array(), 
		'title' => array()
	),
	'strong' => array(),
  );
  echo wp_kses_post($name);
?>



