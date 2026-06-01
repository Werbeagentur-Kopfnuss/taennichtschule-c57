<?php

return array(
	'label' => array(
		'de' => array(
			'CUSTOM - Block - Rezension',
			'Erstellt ein zweispaltiges oder einspaltiges Element einer Rezension.',
		),
		'en' => array(
			'CUSTOM - Review',
			'',
		),
	),
	'types' => array('content'),
	'contentCategory' => 'texts',
	'beTemplate' => 'rsce_be_block_testimonial',
	'standardFields' => array('cssID'),
    'wrapper' => array(
        'type' => 'none',
    ),
	'fields' => array(
		'description1' => array(
			'label' => array('Einstellungen', ''),
			'inputType' => 'group',
		),
		'hasTwoColumns' => array(
			'label' => array(
				'de' => array('Zweispaltig', 'Aktivieren, um die Rezension in zwei Spalten anzuzeigen.'),
			),
			'inputType' => 'checkbox',
			'eval' => array(),
		),
		'description2' => array(
			'label' => array('Rezension', ''),
			'inputType' => 'group',
		),
		'text' => array(
			'label' => array(
				'de' => array('Rezension', 'Geben Sie hier die Rezension in das Textfeld ein.'),
			),
			'eval' => array('mandatory' => true, 'rte' => 'tinyMCE', 'basicEntities'=>true, 'tl_class' => 'widget'),
			'inputType' => 'textarea',
		),
		'author' => array(
			'label' => array(
				'de' => array('Author', 'Geben Sie den Namen des Autors ein, sofern er angezeigt werden soll.'),
			),
			'eval' => array('basicEntities'=>true, 'tl_class' => 'w50 widget'),
			'inputType' => 'text',
		),
	),
);
