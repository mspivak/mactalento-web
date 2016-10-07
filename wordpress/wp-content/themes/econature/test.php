<?php
/**
 * @package 		WordPress
 * @subpackage 	EcoNature
 * @version		1.0.0
 * 
 * Template Name: Test
 * Created by GD
 * 
 */
 
namespace Mactalento;

$cmsms_option = cmsms_get_global_options();

get_header();

/* begin mauro's code */


require 'rms/Jobs.php';

echo '<pre>';

echo '<hr>';
echo "<h1>Oportunidad</h1>";
print_r(Jobs::oportunidad(1));

echo '<hr>';
echo "<h1>Todas</h1>";
print_r(Jobs::all()); /* las que esten publicadas/activas */

/* end */

get_footer();

