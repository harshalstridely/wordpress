<?php
$strata_qode_toolbar = strata_qode_return_toolbar_variable();

if ( isset( $strata_qode_toolbar ) ) { ?>
	<div id="panel" class="default" style="margin-left: -222px;">
		<div id="panel-admin">
			<h5><?php esc_html_e( 'Theme Options', 'strata' ); ?></h5>
			<div class="panel-admin-box">
				<div class="accordion_toolbar">
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Header Type ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_header_type" class="choose_option">
							<li data-value="normal"><?php esc_html_e( 'Normal', 'strata' ); ?></li>
							<li data-value="big"><?php esc_html_e( 'Big', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Header Top Menu ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_header_top_menu" class="choose_option">
							<li data-value="yes"><?php esc_html_e( 'Yes', 'strata' ); ?></li>
							<li data-value="no"><?php esc_html_e( 'No', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Smooth Scroll ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_smooth_scroll" class="choose_option">
							<li data-value="yes"><?php esc_html_e( 'Yes', 'strata' ); ?></li>
							<li data-value="no"><?php esc_html_e( 'No', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Boxed Layout ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_boxed" class="choose_option">
							<li data-value="boxed"><?php esc_html_e( 'Yes', 'strata' ); ?></li>
							<li data-value=""><?php esc_html_e( 'No', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Choose Background ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_background">
							<li data-value="background1"><?php esc_html_e( 'Background 1', 'strata' ); ?></li>
							<li data-value="background2"><?php esc_html_e( 'Background 2', 'strata' ); ?></li>
							<li data-value="background3"><?php esc_html_e( 'Background 3', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Choose Pattern ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_pattern">
							<li data-value="pattern11"><?php esc_html_e( 'Retina Wood', 'strata' ); ?></li>
							<li data-value="pattern12"><?php esc_html_e( 'Retina Wood Grey', 'strata' ); ?></li>
							<li data-value="pattern1"><?php esc_html_e( 'Transparent', 'strata' ); ?></li>
							<li data-value="pattern3"><?php esc_html_e( 'Cubes', 'strata' ); ?></li>
							<li data-value="pattern4"><?php esc_html_e( 'Diamond', 'strata' ); ?></li>
							<li data-value="pattern5"><?php esc_html_e( 'Escheresque', 'strata' ); ?></li>
							<li data-value="pattern10"><?php esc_html_e( 'Whitediamond', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Colors ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<div id="tootlbar_colors">
							<ul>
								<li><div class="color active color1" data-color="#00aeef" style="background-color:#00aeef;"><span><?php esc_html_e( 'Blue', 'strata' ); ?></span></div></li>
								<li><div class="color color2" data-color="#ff0000" style="background-color:#ff0000;"><span><?php esc_html_e( 'Red', 'strata' ); ?></span></div></li>
								<li><div class="color color3" data-color="#8560a8" style="background-color:#8560a8;"><span><?php esc_html_e( 'Purple', 'strata' ); ?></span></div></li>
								<li><div class="color color4" data-color="#f7941d" style="background-color:#f7941d;"><span><?php esc_html_e( 'Orange', 'strata' ); ?></span></div></li>
								<li><div class="color color5" data-color="#bfc9d7" style="background-color:#bfc9d7;"><span><?php esc_html_e( 'Gray', 'strata' ); ?></span></div></li>
								<li><div class="color color6" data-color="#343434" style="background-color:#343434;"><span><?php esc_html_e( 'Black', 'strata' ); ?></span></div></li>
							
							</ul>
						</div>
					</div>
					<p class="accordion_toolbar_header tooltip_holder"><?php esc_html_e( 'Tooltips on/off ', 'strata' ); ?><span class="tooltip_marker"></span> <i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_tooltips" class="choose_option">
							<li data-value="yes"><?php esc_html_e( 'On', 'strata' ); ?></li>
							<li data-value="no"><?php esc_html_e( 'Off', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Header style ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_header_color" class="choose_option">
							<li data-value="white"><?php esc_html_e( 'White', 'strata' ); ?></li>
							<li data-value="dark"><?php esc_html_e( 'Dark/Transparent', 'strata' ); ?></li>
						</ul>
					</div>
					<p class="accordion_toolbar_header"><?php esc_html_e( 'Footer type ', 'strata' ); ?><i class="fa fa-angle-right"></i></p>
					<div class="accordion_toolbar_content">
						<ul id="tootlbar_footer_type" class="choose_option">
							<li data-value="regular"><?php esc_html_e( 'Regular', 'strata' ); ?></li>
							<li data-value="unfold"><?php esc_html_e( 'Unfold', 'strata' ); ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<a class="open" href="#"><span><i class="fa fa-cog"></i></span></a>
	</div>
<?php } ?>