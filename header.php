<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://github.com/dezinezync/elytra-blog
 *
 * @package Elytra
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover"/>
    <meta name="supported-color-schemes" content="light dark" />

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<base href="https://blog.elytra.app/">
	<link rel="preconnect" href="https://elytra.app"/>

	<meta name="description" content="${data && data.description ? data.description : ''}" />
	<meta name="generator" content="ES6Views" />
	<meta name="url" content="https://blog.elytra.app" />
	<link rel="author" href="https://elytra.app/humans.txt" />
	<meta name="google-site-verification" content="yTpTDWvC3d5iOiEuhTGGNl3Z6Mvi2j89s7zf8eZFseQ" />
	<link rel="icon" href="https://elytra.app/public/images/Icon-App-20x20@2x.png" sizes="20x20" type="image/png"/>
	<link rel="icon" href="https://elytra.app/public/images/Icon-App-29x29@2x.png" sizes="29x29" type="image/png"/>
	<link rel="icon" href="https://elytra.app/public/images/Icon-App-40x40@2x.png" sizes="40x40" type="image/png"/>
	<link rel="icon" href="https://elytra.app/public/images/Icon-App-60x60@2x.png" sizes="60x60" type="image/png" />
	<meta name="apple-itunes-app" content="app-id=id1173774272,affiliate-data=11lxRN" />
	<link rel="apple-touch-icon" sizes="180x180" href="https://elytra.app/public/images/Icon-App-60x60@3x.png" />
	<meta name="pinterest" content="nopin" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="container">
		<h1><a href="/">Elytra Blog</a></h1>
		<h2><?php echo get_option('blogdescription'); ?></h2>
	</div>
</header>
<main id="main" class="site-main">
