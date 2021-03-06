<?php
/**
 * HiiWP: portfolio-css
 *
 * Main CSS file
 *
 * @package     hiiwp
 * @copyright   Copyright (c) 2018, Peter Vigilante
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.3
 */
$hiilite_options = HiiWP::get_options();
if(false): ?><style><?php endif; ?>
/* MASONRY LAYOUT */
.masonry {
	display: block;
	column-gap:0;
	-moz-column-gap:0;
	column-width: 17em;
}
.masonry.columns-1 { columns: 1; }
.masonry.columns-2 { columns: 2; }
.masonry.columns-3 { columns: 3; }
.masonry.columns-4 { columns: 4; }

.masonry img {
    min-width: 100%;
}
.masonry article{
	-webkit-column-break-inside: avoid;
    page-break-inside: avoid;
    break-inside: avoid;
}

/* BOXED LAYOUT */
.boxed { align-items: flex-start; }
.boxed.columns-1 > .flex-item { flex: 1 1 100%; width: 100%; }
.boxed.columns-2 > .flex-item { flex: 1 1 50%; width: 50%; }
.boxed.columns-3 > .flex-item { flex: 1 1 33.33%; width: 33.33%; }
.boxed.columns-4 > .flex-item { flex: 1 1 25%; width: 25%; }

.boxed .landscape {
	height: 100%;
    max-width: none;
    width: auto;
}
.boxed .portrait {
	height: auto;
}

.full-width > .flex-item,
.full-width img { width: 100%; }

.boxed .blog-article h4 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.boxed .blog-article p {
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    font-size: 0.9em;
}


.layout-boxed {
	display:flex;
	flex-direction:row;
	flex-wrap:wrap;	
}

ul.portfolio_terms {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: space-evenly;
    width: 100%;
    text-align: center;
}

ul.portfolio_terms li {
    display: inline-block;
    flex: 1 1 auto;
    position: relative;
}

ul.portfolio_terms li:hover ul.portfolio_child_terms {
    width: 100%;
    background: white;
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
    max-height: 100%;
    opacity: 1;
}

ul.portfolio_terms ul.portfolio_child_terms li a {
    color: #252525;
}

ul.portfolio_child_terms {
    max-height: 0;
    position: absolute;
    transition: all 400ms;
    opacity: 0;
    display: flex;
    justify-content: space-evenly;
    width: 0;
    left: 0;
    right: 0;
    margin: auto;
    overflow: hidden;
}

.portfolio_filter {
    border-bottom: 1px solid;
}



.col-count-1 {
	column-count:1;
	-moz-column-count:1;
}
.col-count-2 {
	column-count:2;
	-moz-column-count:2;
}
.col-count-3 {
	column-count:3;
	-moz-column-count:3;
}
.col-count-4 {
	column-count:4;
	-moz-column-count:4;
}

ul.portfolio_terms li a {
    line-height: 3;
}
.portfolio-masonry-item .content-box {
	display: flex;
    flex-direction: row;
    justify-content: space-between;
}
.portfolio-masonry-item .content-box h6 {
	align-self: center;
}
.portfolio-masonry-item .content-box .cat-img-small {
	min-width:30px;
	width:30px;
	height:30px;	
}


.portfolio-piece {
	padding: <?php echo Hii::$options['portfolio_add_padding']; ?>;
	min-width: 250px;
	transition: all 1s;
}
.portfolio-piece.col-3 {
	max-width: 25%;
}
@media (max-width:1100px){
	.portfolio-piece.col-3,
	.portfolio-piece.col-4 {
		max-width: 33.33%;
	}
}
@media (max-width:768px){
	.portfolio-piece.col-3,
	.portfolio-piece.col-4 {
		max-width: 50%;
	}
}
@media (max-width:500px){
	.portfolio-piece.col-3,
	.portfolio-piece.col-4 {
		max-width: 100%;
	}
}
.portfolio-piece-image {
	transition: all 1s;
}
.portfolio-piece img {
	display: block;
	transition: all 1s;
}
.portfolio-piece-content {
	border-style: solid;
}
.portfolio-piece .content-box {
	box-shadow: inset 0 0 1px rgba(0,0,0,0.1);
}
.portfolio-piece .portfolio-item-title {
	margin: auto 0 0 0;
}
.portfolio_row .post_meta {
	position: absolute;
    width: 100%;
    bottom: 10px;
    text-align: center;
}
.portfolio_row .post_meta h3 {
	margin: 2px;
	background: rgba(255,255,255,0.8);
	display: inline-block;
	padding: 5px;
}
.portfolio_row .post_meta small {
	margin: 2px;
    background: rgba(255,255,255,0.8);
    display: inline-block;
    padding: 5px;
}
<?php
if(Hii::$options['portfolio_template'] == 'split') {
?>
.single-portfolio .portfolio-gallery {
	padding:1em;
	background:<?php echo Hii::$options['portfolio_background']; ?>;	
}
<?php
}
?>
.single-portfolio .portfolio-gallery {
	background:#fff;
}
.single-portfolio .port-img img,
.single-portfolio .portfolio-gallery .port-img img {
	width:100%;	
}
.single-portfolio .portfolio-gallery .project-comments {
	padding:1em;	
}
.project-info {
	padding:1em;
	min-width:300px;
	background:<?php echo Hii::$options['portfolio_panel_background']; ?>;		
	color:<?php echo Hii::$options['portfolio_info_colors']['text']; ?>;		
}
.project-info .row {
	display:flex;	
}
.project-info h1,
.project-info h2,
.project-info h3,
.project-info h4,
.project-info h5,
.project-info h6 {
	color:<?php echo Hii::$options['portfolio_info_colors']['title']; ?>;		
}
.project-info a {
	color:<?php echo Hii::$options['portfolio_info_colors']['link']; ?>;		
}
.project-info a:hover {
	color:<?php echo Hii::$options['portfolio_info_colors']['hover']; ?>;		
}
.project-info .project-title {
	justify-content: space-between;	
	align-items: center;
}
.project-info .project-title h1 {
	font-weight:bold;
	font-size:1.2em;
}

.portfolio-piece figure {
	overflow:hidden;
	position: relative;
}
.square .portfolio-piece-image,
.portfolio-piece-image.square {
	position: relative;
	height: 0;
	overflow: hidden;
	padding-top: 100%;
}
.square .portfolio-piece-image img,
.portfolio-piece-image.square img {
	position: absolute;
    min-width: 100%;
    min-height: 100%;
    left: 50%;
    top: 50%;
    width: auto;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
}

.portfolio-piece.image-left .portfolio-piece-wrapper {
    display: flex;
}
.portfolio-piece.image-left .portfolio-piece-wrapper .portfolio-piece-image,
.portfolio-piece.image-left .portfolio-piece-wrapper .portfolio-piece-content {
    min-width: 50%;
}
.portfolio-piece.image-left .portfolio-piece-image.square {
    padding-top: 50%;
}

.portfolio-piece.image-behind .portfolio-piece-wrapper {
    position: relative;
    overflow: hidden;
}
.portfolio-piece.image-behind .portfolio-piece-content {
    position: absolute;
    bottom: -100%;
    transition: all 0.4s;
	opacity: 0;
    display: flex;
    flex-direction: column;
}
.portfolio-piece.image-behind:hover .portfolio-piece-content {
	bottom:0;
	opacity: 1;
}

.project-info .project-icon {
	width:50px;
	flex:1 1 50px;
	min-width:0;
}
.project-info .cat-icon {
	border-radius:50%;	
	padding-top:5px;
	padding-right:10px;
}
.project-info .project-group {
	display:block;	
}
.project-info .project-group,
.project-info .project-social {
	margin-top:2em;	
}
.project-info .project-social {
	display: block;
}
.project-info .project-social a .fa {
	color:<?php echo Hii::$options['portfolio_info_colors']['link']; ?>;	
	margin-right: 0.5em;
}
.project-info .project-author {
	margin-top:3em;	
}
.project-info .author-icon {
	padding-top:5px;
	padding-right:10px;
}
.project-info .author-icon img {
	border-radius:50%;	
}
.project-info .project-author h4 {
	text-transform: none;
	font-size:1.1em;
	font-weight:bold;
	color:<?php echo Hii::$options['portfolio_info_colors']['text']; ?>;
}
.project-info .project-author small {
	margin-bottom:1em;	
}
.project-info .project-description {
	margin-top:1em;	
}
@media (max-width:912px){	
	.portfolio-gallery, .project-info {
		width:100%;
		flex:1 1 100%;	
	}
}