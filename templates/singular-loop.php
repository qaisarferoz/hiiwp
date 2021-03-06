<?php
/**
 * HiiWP Template: singular-loop
 *
 * @package     hiiwp
 * @copyright   Copyright (c) 2018, Peter Vigilante
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
switch (get_post_type($post)) {
	case get_theme_mod( 'portfolio_slug', 'portfolio' ):
		get_template_part('templates/portfolio-single', 'loop');
		break;
	case 'team':
		get_template_part('templates/team_member', 'loop');
		break;
	case 'menu':
		get_template_part('templates/menu_item', 'loop');
		break;
	case 'post':
		get_template_part('templates/post', 'loop');
		break;
	default:
		get_template_part('templates/page', 'loop');
}

										
?>