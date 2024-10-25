<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
CSF::createMetabox('sanas_metabox',array(
	'title'		=> esc_html__('Metabox Options','sanas'),
	'post_type'	=> array('sanas_card'),
	'show_restore'=> true,
	'context'	=> 'advanced',
));
CSF::createSection('sanas_metabox',array(
	'title'		=> esc_html__('canvas Image','sanas'),
	'icon'		=> 'fas fa-arrow-up',
	'fields'	=> array(
        array(
			'id'		=> 'sanas_front_canavs_image',
			'title'		=> esc_html__('Front Image Data','sanas'),
			'type'		=> 'textarea',
		),
		 array(
			'id'		=> 'sanas_back_canavs_image',
			'title'		=> esc_html__('Back Image Data','sanas'),
			'type'		=> 'textarea',  
		),
	),
));
CSF::createSection('sanas_metabox',array(
	'title'		=> esc_html__('Upload Front Image','sanas'),
	'icon'		=> 'fas fa-arrow-up',
	'fields'	=> array(
		array(
			'id'		=> 'sanas_upload_front_Image',
			'title'		=> esc_html__('Upload Fornt Image','sanas'),
			'type'		=> 'media',
			'preview'=> true,
			'preview_size'=> 'full',
		),
	),
));
CSF::createSection('sanas_metabox',array(
	'title'		=> esc_html__('Upload Back Image','sanas'),
	'icon'		=> 'fas fa-arrow-up',
	'fields'	=> array(
		array(
			'id'		=> 'sanas_upload_back_Image',
			'title'		=> esc_html__('Upload Back Image','sanas'),
			'type'		=> 'media',
			'preview'=> true,
			'preview_size'=> 'full',
		),
	),
));
CSF::createSection('sanas_metabox',array(
	'title'		=> esc_html__('Card Back Ground','sanas'),
	'icon'		=> 'fas fa-arrow-up',
	'fields'	=> array(
		array(
			'id'		=> 'sanas_bg_color',
			'title'		=> esc_html__('Card BG Color','sanas'),
			'type'		=> 'color',
		),
	),
));