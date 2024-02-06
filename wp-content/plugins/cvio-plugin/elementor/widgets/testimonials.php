<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Cvio Testimonials Widget.
 *
 * @since 1.0
 */
class Cvio_Testimonials_Widget extends Widget_Base {

	public function get_name() {
		return 'cvio-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'cvio-plugin' );
	}

	public function get_icon() {
		return 'eicon-parallax';
	}

	public function get_categories() {
		return [ 'cvio-category' ];
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'title_tab',
			[
				'label' => esc_html__( 'Title', 'cvio-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'cvio-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'cvio-plugin' ),
				'default'     => esc_html__( 'Title', 'cvio-plugin' ),
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Title Tag', 'cvio-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'h2',
				'options' => [
					'h1'  => __( 'H1', 'cvio-plugin' ),
					'h2' => __( 'H2', 'cvio-plugin' ),
					'div' => __( 'DIV', 'cvio-plugin' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_tab',
			[
				'label' => esc_html__( 'Items', 'cvio-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image', [
				'label' => esc_html__( 'Image', 'cvio-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Name', 'cvio-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter name', 'cvio-plugin' ),
				'default'	=> esc_html__( 'Enter name', 'cvio-plugin' ),
			]
		);

		$repeater->add_control(
			'subname', [
				'label'       => esc_html__( 'Subname', 'cvio-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter subname', 'cvio-plugin' ),
				'default'	=> esc_html__( 'Enter subname', 'cvio-plugin' ),
			]
		);

		$repeater->add_control(
			'desc', [
				'label'       => esc_html__( 'Description', 'cvio-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter description', 'cvio-plugin' ),
				'default'	=> esc_html__( 'Enter description', 'cvio-plugin' ),
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Testimonials Items', 'cvio-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'options_tab',
			[
				'label' => esc_html__( 'Settings', 'cvio-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'navigation',
			[
				'label' => esc_html__( 'Enable Navigation', 'cvio-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'cvio-plugin' ),
				'label_off' => __( 'Off', 'cvio-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'pagination',
			[
				'label' => esc_html__( 'Enable Pagination', 'cvio-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'cvio-plugin' ),
				'label_off' => __( 'Off', 'cvio-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'loop',
			[
				'label' => esc_html__( 'Enable Loop', 'cvio-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'cvio-plugin' ),
				'label_off' => __( 'Off', 'cvio-plugin' ),
				'return_value' => 'yes',
				'default' => 'false',
			]
		);

		$this->add_control(
			'slidesview',
			[
				'label'       => esc_html__( 'Slides Per View', 'cvio-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '2', 'cvio-plugin' ),
				'default'	=> esc_html__( '2', 'cvio-plugin' ),
			]
		);

		$this->add_control(
			'spacebetween',
			[
				'label'       => esc_html__( 'Space Between Slides', 'cvio-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '30', 'cvio-plugin' ),
				'default'	=> esc_html__( '30', 'cvio-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label'     => esc_html__( 'Title', 'cvio-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Color', 'cvio-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .section .content .title .title_inner' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .section .content .title .title_inner',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Items', 'cvio-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_name_color',
			[
				'label'     => esc_html__( 'Name Color', 'cvio-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .reviews-item .name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_name_typography',
				'label'     => esc_html__( 'Name Typography', 'cvio-plugin' ),
				'selector' => '{{WRAPPER}} .reviews-item .name',
			]
		);

		$this->add_control(
			'item_subname_color',
			[
				'label'     => esc_html__( 'Subname Color', 'cvio-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .reviews-item .company' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_subname_typography',
				'label'     => esc_html__( 'Subname Typography', 'cvio-plugin' ),
				'selector' => '{{WRAPPER}} .reviews-item .company',
			]
		);

		$this->add_control(
			'item_desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'cvio-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .reviews-item .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_desc_typography',
				'label'     => esc_html__( 'Description Typography', 'cvio-plugin' ),
				'selector' => '{{WRAPPER}} .reviews-item .text',
			]
		);

		$this->end_controls_section();
	}


	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'basic' );
		?>

		<!-- Section Testimonials -->
		<div class="section testimonials">
			<div class="content">

				<?php if ( $settings['title'] ) : ?>
				<<?php echo esc_attr( $settings['title_tag'] ); ?> class="title">
					<div class="title_inner">
						<span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
							<?php echo wp_kses_post( $settings['title'] ); ?>
						</span>
					</div>
				</<?php echo esc_attr( $settings['title_tag'] ); ?>>
				<?php endif; ?>

				<?php if ( $settings['items'] ) : ?>
				<div class="reviews-carousel">
					<div class="swiper-container" data-slidesview="<?php echo esc_attr( $settings['slidesview'] ); ?>" data-spacebetween="<?php echo esc_attr( $settings['spacebetween'] ); ?>" data-loop="<?php echo esc_attr( $settings['loop'] ); ?>">
						<div class="swiper-wrapper">

							<?php foreach ( $settings['items'] as $index => $item ) :
						    $item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
						    $this->add_inline_editing_attributes( $item_name, 'basic' );

						    $item_subname = $this->get_repeater_setting_key( 'subname', 'items', $index );
						    $this->add_inline_editing_attributes( $item_subname, 'basic' );

						    $item_desc = $this->get_repeater_setting_key( 'desc', 'items', $index );
						    $this->add_inline_editing_attributes( $item_desc, 'advanced' );
						    ?>
							<div class="swiper-slide">
								<div class="reviews-item content-box">
									<?php if ( $item['image'] ) : $image = wp_get_attachment_image_url( $item['image']['id'], 'cvio_160xAuto' ); ?>
									<div class="image">
										<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
									</div>
									<?php endif; ?>
									<div class="info">
										<div class="name">
											<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
												<?php echo wp_kses_post( $item['name'] ); ?>
											</span>
										</div>
										<div class="company">
											<span <?php echo $this->get_render_attribute_string( $item_subname ); ?>>
												<?php echo wp_kses_post( $item['subname'] ); ?>
											</span>
										</div>
									</div>
									<?php if( $item['desc'] ) : ?>
									<div class="text">
										<div <?php echo $this->get_render_attribute_string( $item_desc ); ?>>
											<?php echo wp_kses_post( $item['desc'] ); ?>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
							<?php endforeach; ?>

						</div>
					</div>

					<!-- navigation -->
					<div class="swiper-nav">
						<?php if ( $settings['navigation'] == 'yes' && $settings['navigation'] ) : ?>
						<a class="prev swiper-button-prev fas fa-long-arrow-alt-left"></a>
						<?php endif; ?>
						<?php if ( $settings['pagination'] == 'yes' && $settings['pagination'] ) : ?>
						<div class="swiper-pagination"></div>
						<?php endif; ?>
						<?php if ( $settings['navigation'] == 'yes' && $settings['navigation'] ) : ?>
						<a class="next swiper-button-next fas fa-long-arrow-alt-right"></a>
						<?php endif; ?>
					</div>

				</div>
				<?php endif; ?>

			</div>
		</div>

		<?php
	}

	/**
	 * Render widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<#
		view.addInlineEditingAttributes( 'title', 'basic' );
		#>

		<!-- Section Testimonials -->
		<div class="section testimonials">
			<div class="content">

				<# if ( settings.title ) { #>
				<div class="title">
					<div class="title_inner">
						<span {{{ view.getRenderAttributeString( 'title' ) }}}>
							{{{ settings.title }}}
						</span>
					</div>
				</div>
				<# } #>

				<# if ( settings.items ) { #>
				<div class="reviews-carousel">
					<div class="swiper-container" data-slidesview="{{{ settings.slidesview }}}" data-spacebetween="{{{ settings.spacebetween }}}" data-loop="{{{ settings.loop }}}">
						<div class="swiper-wrapper">

							<# _.each( settings.items, function( item, index ) {

						    var item_name = view.getRepeaterSettingKey( 'name', 'items', index );
						    view.addInlineEditingAttributes( item_name, 'basic' );

						    var item_subname = view.getRepeaterSettingKey( 'subname', 'items', index );
						    view.addInlineEditingAttributes( item_subname, 'basic' );

						    var item_desc = view.getRepeaterSettingKey( 'desc', 'items', index );
						    view.addInlineEditingAttributes( item_desc, 'advanced' );

						    #>
							<div class="swiper-slide">
								<div class="reviews-item content-box">
									<# if ( item.image ) { #>
									<div class="image">
										<img src="{{{ item.image.url }}}" alt="{{{ item.name }}}">
									</div>
									<# } #>
									<div class="info">
										<div class="name">
											<span {{{ view.getRenderAttributeString( item_name ) }}}>
												{{{ item.name }}}
											</span>
										</div>
										<div class="company">
											<span {{{ view.getRenderAttributeString( item_subname ) }}}>
												{{{ item.subname }}}
											</span>
										</div>
									</div>
									<div class="text">
										<div {{{ view.getRenderAttributeString( item_desc ) }}}>
											{{{ item.desc }}}
										</div>
									</div>
								</div>
							</div>
							<# }); #>

						</div>
					</div>
					<div class="swiper-nav">
						<# if ( settings.navigation == 'yes' && settings.navigation ) { #>
						<a class="prev swiper-button-prev fas fa-long-arrow-alt-left"></a>
						<# } #>
						<# if ( settings.pagination == 'yes' && settings.pagination ) { #>
						<div class="swiper-pagination"></div>
						<# } #>
						<# if ( settings.navigation == 'yes' && settings.navigation ) { #>
						<a class="next swiper-button-next fas fa-long-arrow-alt-right"></a>
						<# } #>
					</div>
				</div>
				<# } #>

			</div>
		</div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Cvio_Testimonials_Widget() );
