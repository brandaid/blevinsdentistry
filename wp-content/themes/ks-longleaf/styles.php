<style>
#top-bar {
	background: <?php echo get_theme_mod( 'top-bar-header-color' ); ?>;
}
/** Buttons **/
.btn-primary {
	background: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
#secondary h3 {
	background: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
	color: #fff !important;
}
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active {
	background: <?php echo get_theme_mod( 'prim-btn-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'prim-btn-hover' ); ?>;
}
.btn-default .fa-circle,
#main-content .btn-default i {
	color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
.fboxes-round-under .pic-container {
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}

.btn-info {
	background: <?php echo get_theme_mod( 'second-button-color' ); ?>;
	border-color: <?php echo get_theme_mod( 'second-button-color' ); ?>;
}
.btn-info:hover,
.btn-info:focus,
.btn-info:active {
	background: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
}
#page .open > .dropdown-toggle.btn-primary {
	background: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'sec-btn-hover' ); ?>;
}

.need-answers .glyphicon,
#close-box {
	background: <?php echo get_theme_mod( 'second-button-color' ); ?>;
}

.btn-success {
	background: <?php echo get_theme_mod( 'ter-button-color' ); ?>;
	border-color: <?php echo get_theme_mod( 'ter-button-color' ); ?>;
}
.btn-success:hover,
.btn-success:focus,
.btn-success:active {
	background: <?php echo get_theme_mod( 'ter-button-color-hover' ); ?>;
	border-color: <?php echo get_theme_mod( 'ter-button-color-hover' ); ?>;
}
#bottom-call-out {
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
#bottom-call-out:after {
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?> transparent;
}

#open-box,
#appointment-button {
	background-color: <?php echo get_theme_mod( 'second-button-color' ); ?>;
}
#open-box:hover,
#appointment-button:hover {
	background-color: <?php echo get_theme_mod( 'secone-button-color-hover' ); ?>;
}
#header-form.featured-box {
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}


/** Header Tags **/
#page h1,
#page h2,
#page .headline {
	color: <?php echo get_theme_mod( 'h1-color' ); ?>;
}
#page h1 small,
#page h3,
#page h4,
#page h5,
#page h6,
.modal-content h3,
#page .headline span {
	color: <?php echo get_theme_mod( 'h2-color' ); ?>;
}
.modal-content h3 i {
	color: <?php echo get_theme_mod( 'h1-color' ); ?>;
}

.home #page .navbar {
	border-top: 5px solid <?php echo get_theme_mod( 'h1-color' ); ?>;
}

.fbox-wrapper img.img-circle {
	border: 5px solid <?php echo get_theme_mod( 'h2-color' ); ?>;
}
#feature-boxes a:hover img {
	border-color: <?php echo get_theme_mod( 'h1-color' ); ?>;
}

#page .btn-default {
	box-shadow: inset 0 0 0 0 <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
#page .btn-default:hover {
	box-shadow: inset 0 100px 0 0 <?php echo get_theme_mod( 'prim-button-color' ); ?>;
	color: #fff;
	border-color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}
.navbar-wrapper .btn-default {
	color: <?php echo get_theme_mod( 'prim-button-color' ); ?>;
	border: 1px solid <?php echo get_theme_mod( 'prim-button-color' ); ?>;
}

/** Content Links **/
a {
	color: <?php echo get_theme_mod( 'a-color' ); ?>;
}
a:hover {
	color: <?php echo get_theme_mod( 'ah-color' ); ?>;
}
</style>