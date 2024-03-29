<?php
	$layout_radio = get_sub_field( 'layout_radio' );
	$title = get_sub_field( 'title' );
	$logo = get_sub_field( 'logo' );
	$type = get_sub_field( 'type' );
	$under = get_sub_field( 'under' );
	$subtitles = get_sub_field( 'subtitles' );
	$subtitles_class = 'typing-subtitle';
	$bg_type = get_sub_field( 'background_type' );
	$bg_image = get_sub_field( 'background_image' );
	$bg_video = get_sub_field( 'background_video' );
	$bg_slideshow = get_sub_field( 'background_slideshow_images' );
	$bg_slideshow_autoplay_speed = get_sub_field( 'background_slideshow_autoplay_speed' );
	$bg_slideshow_navs = get_sub_field( 'background_slideshow_navs' );
	$bg_color = get_sub_field( 'background_color' );
	$bg_gradient_color1 = get_sub_field( 'background_gradient_color1' );
	$bg_gradient_color2 = get_sub_field( 'background_gradient_color2' );
	$bg_mask_type = get_sub_field( 'background_mask_type' );
	$bg_mask_color = get_sub_field( 'background_mask_color' );
	$bg_mask_color1 = get_sub_field( 'background_mask_color1' );
	$bg_mask_color2 = get_sub_field( 'background_mask_color2' );
	$bg_mask_opacity = get_sub_field( 'background_mask_opacity' );
	$background_grained = get_sub_field( 'background_grained' );
	$section_id = get_sub_field( 'section_id' );

	if ( $under == 2 ) {
		$subtitles_class = 'typing-bread';
	}

	$bg_mask_style = false;
	if ( $bg_mask_type != 0 ) {
		$bg_mask_style = 'opacity: ' . $bg_mask_opacity . ';';

		if ( $bg_mask_type == 1 ) {
			$bg_mask_style .= 'background-color: ' . $bg_mask_color . ';';
		}
		if ( $bg_mask_type == 2 ) {
			$bg_mask_style .= 'background-image: linear-gradient(to bottom, ' . $bg_mask_color1 . ', ' . $bg_mask_color2 . ');';
		}
	}
?>

<!-- Section Started -->
<div class="section started<?php if ( $bg_type ) : ?> background-enabled<?php endif; ?><?php if( $layout_radio == '2' ) : ?> layout-creative<?php endif; ?><?php if( $layout_radio == '3' ) : ?> personal<?php endif; ?><?php if( $layout_radio == '0' ) : ?> section-title<?php endif; ?>" <?php if ( $section_id ) : ?>id="section-<?php echo esc_attr( $section_id ); ?>"<?php endif; ?>>
	
	<?php if ( $bg_type == 0 ) : ?>
	<div class="video-bg">
		<div class="video-bg-mask"></div>
		<?php if ( $background_grained ) : ?><div class="video-bg-texture" id="grained_container"></div><?php endif; ?>
	</div>

	<?php elseif ( $bg_type == 1 ) : ?>
	<div class="video-bg jarallax">
		<?php if ( $bg_image ) : ?><img class="jarallax-img" src="<?php echo esc_url( $bg_image ); ?>" alt="<?php echo esc_attr( $title ); ?>"><?php endif; ?>
		<div class="video-bg-mask" <?php if ( $bg_mask_style ) : ?>style="<?php echo esc_attr( $bg_mask_style ); ?>"<?php endif; ?>></div>
		<?php if ( $background_grained ) : ?><div class="video-bg-texture" id="grained_container"></div><?php endif; ?>
	</div>

	<?php elseif ( $bg_type == 2 ) : ?>
	<div id="<?php echo esc_attr( $section_id ); ?>-video-bg" class="video-bg jarallax-video" data-jarallax-video="mp4:<?php echo esc_url( $bg_video ); ?>" data-volume="0">
		<?php if ( $bg_mask_style ) : ?><div class="video-bg-mask" style="<?php echo esc_attr( $bg_mask_style ); ?>"></div><?php endif; ?>
		<?php if ( $background_grained ) : ?><div class="video-bg-texture" id="grained_container"></div><?php endif; ?>
	</div>

	<?php elseif ( $bg_type == 3 ) : ?>
	<div class="video-bg" style="background-color: <?php echo esc_attr( $bg_color ); ?>;">
		<?php if ( $background_grained ) : ?><div class="video-bg-texture" id="grained_container"></div><?php endif; ?>
	</div>

	<?php elseif ( $bg_type == 4 ) : ?>
	<div class="video-bg" style="background-image: linear-gradient(to bottom, <?php echo esc_attr( $bg_gradient_color1 ); ?>, <?php echo esc_attr( $bg_gradient_color2); ?>);">
		<?php if ( $background_grained ) : ?><div class="video-bg-texture" id="grained_container"></div><?php endif; ?>
	</div>

	<?php elseif ( $bg_type == 5 ) : ?>
	<?php if ( $bg_slideshow ) : ?>
	<div class="video-bg">
		<div class="started-carousel">
			<div class="swiper-container" data-autoplaytime="<?php echo esc_attr( $bg_slideshow_autoplay_speed ); ?>">
				<div class="swiper-wrapper">
					<?php $i=0; foreach( $bg_slideshow as $slide ) : $i++; ?>
					<div class="swiper-slide <?php if ( $i == 1 ) : ?>first<?php endif; ?>">
						<?php if ( $slide['image'] ) : ?><div class="main-img" style="background-image: url(<?php echo esc_url( $slide['image'] ); ?>);"></div><?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<div class="video-bg-mask" <?php if ( $bg_mask_style ) : ?>style="<?php echo esc_attr( $bg_mask_style ); ?>"<?php endif; ?>></div>
		<?php if ( $background_grained ) : ?><div class="video-bg-texture" id="grained_container"></div><?php endif; ?>
	</div>
	<?php if ( $bg_slideshow_navs ) : ?>
	<div class="swiper-nav">
		<a class="prev swiper-button-prev fas fa-long-arrow-alt-left"></a>
		<a class="next swiper-button-next fas fa-long-arrow-alt-right"></a>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	<?php endif; ?>

	<div class="centrize full-width">
		<div class="vertical-center">
			<div class="started-content">
				<?php if( $layout_radio == '3' ) : ?>
					<?php if ( $logo ) : ?><div class="logo" style="background-image: url(<?php echo esc_url( $logo['url'] ); ?>);"></div><?php endif; ?>
				<?php endif; ?>
				<?php if ( $title ) : ?>
				<h1 class="h-title"><?php echo wp_kses_post( $title ); ?></h1>
				<?php endif; ?>
				<?php if ( $under ) : ?>
				<div class="h-subtitles">
					<div class="h-subtitle <?php echo esc_attr( $subtitles_class ); ?>">
						<?php if ( $under == 1 ) : ?>
							<?php if ( $subtitles ) : ?>
								<?php foreach ( $subtitles as $item ) { ?>
									<p><?php echo wp_kses_post( $item['text'] ); ?></p>
								<?php } ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ( $under == 2 ) : ?>
							<?php cvio_breadcrumb(); ?>
						<?php endif; ?>
					</div>
					<?php if ( $under == 1 ) : ?>
						<span class="typed-subtitle" data-tspeed="500" data-tdelay="5000"></span>
					<?php endif; ?>
					<?php if ( $under == 2 ) : ?>
						<span class="typed-bread"></span>
					<?php endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>

	<a href="#" class="mouse_btn" style="display: none;"><span class="icon fas fa-chevron-down"></span></a>
</div>