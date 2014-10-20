<?php
/**
 * A unique identifier is defined to store the options in the database and 
 * reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, 
 * but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	// Exemplo $themename = 'roots' se este for o Tema Ativo
	// echo $themename;
	// Troco hifen por underline.
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	// print_r( $optionsframework_settings );
	// Array (
	// 	[id] => roots
	// )
}

/**
 * Defines an array of options that will be used to generate the settings page 
 * and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'options_check'),
		'type' => 'heading');

	
	$SEPARADOR = array(
		'name' => __(' • • • • • • • • • • • • • • • • • • • •' . 
		             ' • • • • • • • • • • • • • • • • • • • •', 
		        'options_check'),
		'desc' => __(' ','options_check'),
		'type' => 'info');

	/* - - - - - - - -  Quantidade  - - - - - - - - */
	$options[] = array(
		'name' => __('ID da TAG "chat message"', 'options_check'),
		'desc' => __('Informe ID da TAG "chat message"', 'options_check'),
		'id' => 'chat_message_tag_id',
		'std' => '16',
		'class' => 'mini',
		'type' => 'text');
		

	/* - - - - - - - -  Quantidade  - - - - - - - - */
	$options[] = array(
		'name' => __('Nº de TABS', 'options_check'),
		'desc' => __('Informe a quantidade de TABS', 'options_check'),
		'id' => 'partner_tabs_qtd',
		'std' => '4',
		'class' => 'mini',
		'type' => 'text');
		
  // usar: $partner_tabs_qtd = of_get_option('partner_tabs_qtd', '2');		
		
	/* - - - - - - - -  STYLE para o iFrame  - - - - - - - - */
  $options[] = array(
		'name' => __('STYLE para o iFrame', 'options_check'),
		'desc' => __('STYLE para o iFrame da TAB dos Representantes', 'options_check'),
		'id' => 'partner_iframe_style_code',
		'std' => 'width:100%; height: 400px; overflow: scroll;',
		'type' => 'text');		

  // usar: $partner_iframe_style_code = of_get_option('partner_iframe_style_code', 
  //                           	  'width:100%; height: 400px; overflow: scroll;');	
	  
  // tab_heading_1, tab_heading_2, css_class_1, css_class_2, iframe_url_1, iframe_url_2
	
	$options[] = $SEPARADOR;

	/* - - - - - - - -  TecFil  - - - - - - - - */
	$options[] = array(
		'name' => __('Titulo para TAB da Tecfil', 'options_check'),
		'desc' => __('Titulo para a TAB da Tecfil', 'options_check'),
		'id' => 'tab_heading_1',
		'std' => 'Tecfil',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('class CSS para TAB da Tecfil', 'options_check'),
		'desc' => __('class do CSS para a TAB da Tecfil', 'options_check'),
		'id' => 'css_class_1',
		'std' => 'tab-tecfil',
		'class' => 'mini',
		'type' => 'text');	
	
	$options[] = array(
		'name' => __('URL da Tecfil', 'options_check'),
		'desc' => __('URL para a TAB da Tecfil', 'options_check'),
		'id' => 'iframe_url_1',
		'std' => 'http://www.gruposofape.com.br/tecfil/catalogo/vr_bra/',
		'type' => 'text');

  $options[] = $SEPARADOR;
  
	/* - - - - - - - -  Mann  - - - - - - - - */
	$options[] = array(
		'name' => __('Titulo para TAB da Mann', 'options_check'),
		'desc' => __('Titulo para a TAB da Mann', 'options_check'),
		'id' => 'tab_heading_2',
		'std' => 'Mann',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('class CSS para TAB da Mann', 'options_check'),
		'desc' => __('class do CSS para a TAB da Mann', 'options_check'),
		'id' => 'css_class_2',
		'std' => 'tab-mann',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('URL da Mann', 'options_check'),
		'desc' => __('URL para a TAB da Mann', 'options_check'),
		'id' => 'iframe_url_2',
		'std' => 'http://catalog.mann-filter.com/BR/por',
		'type' => 'text');

	$options[] = $SEPARADOR;

	/* - - - - - - - -  Fram  - - - - - - - - */
	$options[] = array(
		'name' => __('Titulo para TAB da Fram', 'options_check'),
		'desc' => __('Titulo para a TAB da Fram', 'options_check'),
		'id' => 'tab_heading_3',
		'std' => 'Fram',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('class CSS para TAB da Fram', 'options_check'),
		'desc' => __('class do CSS para a TAB da Fram', 'options_check'),
		'id' => 'css_class_3',
		'std' => 'tab-fram',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('URL da Fram', 'options_check'),
		'desc' => __('URL para a TAB da Fram', 'options_check'),
		'id' => 'iframe_url_3',
		'std' => 'http://fram.com.br/fram/',
		'type' => 'text');

	$options[] = $SEPARADOR;

	/* - - - - - - - -  Wega  - - - - - - - - */
	$options[] = array(
		'name' => __('Titulo para TAB da Wega', 'options_check'),
		'desc' => __('Titulo para a TAB da Wega', 'options_check'),
		'id' => 'tab_heading_4',
		'std' => 'Wega',
		'class' => 'mini',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('class CSS para TAB da Wega', 'options_check'),
		'desc' => __('class do CSS para a TAB da Wega', 'options_check'),
		'id' => 'css_class_4',
		'std' => 'tab-wega',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('URL da Wega', 'options_check'),
		'desc' => __('URL para a TAB da Wega', 'options_check'),
		'id' => 'iframe_url_4',
		'std' => 'http://www.filtroswega.com.br/catalogo/busca-geral',
		'type' => 'text');

	$options[] = $SEPARADOR;

	/* - - - - - - - -  FIM  - - - - - - - - */

	$options[] = array(
		'name' => __('ATENÇÃO', 'options_check'),
		'desc' => __('Os valores abaixo serão ignorados','options_check'),
		'type' => 'info');

	$options[] = array(
		'name' => __('. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ' .
		             '. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ', 
		        'options_check'),
		'desc' => __(' ','options_check'),
		'type' => 'info');
			
	/*
	$options[] = array(
		'name' => __('Input Select Small', 'options_check'),
		'desc' => __('Small Select Box.', 'options_check'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'options_check'),
		'desc' => __('A wider select box.', 'options_check'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array); */

	// <div id="section-example_select_categories">...
	$options[] = array(
		'name' => __('Select a Category', 'options_check'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'options_check'),
		'id' => 'select_categories',
		'type' => 'select',
		'options' => $options_categories);

	if ( $options_tags ) {
    $options[] = array(
      'name' => __('Select a Tag', 'options_check'),
      'desc' => __('Passed an array of tags with term_id and term_name', 'options_check'),
      'id' => 'select_tags',
      'type' => 'select',
      'options' => $options_tags);
	}
  
    
  /* 

	$options[] = array(
		'name' => __('Select a Page', 'options_check'),
		'desc' => __('Passed an array of pages with ID and post_title', 'options_check'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);
  */
    
  /* 

	$options[] = array(
		'name' => __('Input Radio (one)', 'options_check'),
		'desc' => __('Radio select with default options "one".', 'options_check'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);
  */
    
  /* 

	$options[] = array(
		'name' => __('Example Info', 'options_check'),
		'desc' => __('This is just some example information you can put in the panel.',
		                 'options_check'),
		'type' => 'info');
  */
    
  /* 

	$options[] = array(
		'name' => __('Input Checkbox', 'options_check'),
		'desc' => __('Example checkbox, defaults to true.', 'options_check'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');
  */
		
  /* FIM DA ABA : Basic Settings */		
		
  /* OUTRA ABA : Advanced Settings */
  
	$options[] = array(
		'name' => __('Advanced Settings', 'options_check'),
		'type' => 'heading');

	

	$options[] = array(
		'name' => __('Colorpicker One', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'colorpicker-1',
		'std' => '',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Colorpicker Two', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'colorpicker-2',
		'std' => '',
		'type' => 'color' );
			
	$options[] = array(
		'name' => __('Colorpicker Three', 'options_check'),
		'desc' => __('No color selected by default.', 'options_check'),
		'id' => 'colorpicker-3',
		'std' => '',
		'type' => 'color' );

	$options[] = array(
		'name' => __('ATENÇÃO', 'options_check'),
		'desc' => __('Os valores abaixo serão ignorados','options_check'),
		'type' => 'info');

	$options[] = array(
		'name' => __('. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ' .
		             '. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ', 
		        'options_check'),
		'desc' => __(' ','options_check'),
		'type' => 'info');
		
	/* •••••••••••••••••••••••••••••••••• */
    
  /* 
  
  $options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'options_check'),
		'desc' => __('Click here and see what happens.', 'options_check'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');
  */
    
  /* 

	$options[] = array(
		'name' => __('Hidden Text Input', 'options_check'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'options_check'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');
  */
    
  /* 

	$options[] = array(
		'name' => __('Uploader Test', 'options_check'),
		'desc' => __('This creates a full size uploader that previews the image.', 'options_check'),
		'id' => 'example_uploader',
		'type' => 'upload');
  */
    
  /* 

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);
  */
    
  /* 

	$options[] = array(
		'name' =>  __('Example Background', 'options_check'),
		'desc' => __('Change the background CSS.', 'options_check'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );
  */
    
  /* 

	$options[] = array(
		'name' => __('Multicheck', 'options_check'),
		'desc' => __('Multicheck description.', 'options_check'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);
  */
    
  /* 
		
	$options[] = array( 'name' => __('Typography', 'options_check'),
		'desc' => __('Example typography.', 'options_check'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );
  */
    
  /* 

	$options[] = array(
		'name' => __('Custom Typography', 'options_check'),
		'desc' => __('Custom typography options.', 'options_check'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );
  */
    
  /* FIM DA ABA : Advanced Settings */
  
  /* OUTRA ABA : Text Editor */
		
	$options[] = array(
		'name' => __('Text Editor', 'options_check'),
		'type' => 'heading' );

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */


	$options[] = array(
		'name' => __('ATENÇÃO', 'options_check'),
		'desc' => __('Os valores abaixo serão ignorados','options_check'),
		'type' => 'info');

	$options[] = array(
		'name' => __('. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ' .
		             '. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ' . 
		             '. . . . . . . . . . . . . . . . . . . . . ', 
		        'options_check'),
		'desc' => __(' ','options_check'),
		'type' => 'info');
		
	/* •••••••••••••••••••••••••••••••••• */
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	$options[] = array(
		'name' => __('Default Text Editor', 'options_check'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  '. 
		      'Read more about wp_editor in <a href="%1$s" target="_blank">' . 
		      'the WordPress codex</a>', 'options_check' ), 
		          'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'media_buttons' => true
	);

	$options[] = array(
		'name' => __('Additional Text Editor', 'options_check'),
		'desc' => sprintf( __( 'This editor includes media button.', 'options_check' ), 
		      'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'editor_media',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	return $options;
}
