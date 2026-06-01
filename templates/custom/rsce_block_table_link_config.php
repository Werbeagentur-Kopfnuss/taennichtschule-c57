<?php

return array(
	'label' => array(
		'de' => array(
			'CUSTOM - Block - Seitenteaser - Link & Tabelle',
			'Erstellt einen Content-Block, bestehend aus einer Tabelle und einem Link zu einer Unterseite. Ideal für Teaser- oder Übersichtselemente, die in Tabellenform dargestellt werden sollen. Verwenden Sie dieses Element, um Inhalte kompakt zu strukturieren und auf weiterführende Seiten zu verweisen.',
		),
		'en' => array(
			'KOPFNUSS – Block with Link and Table for Subpage',
			'Creates a content block consisting of a table and a link to a subpage. Ideal for teaser or overview elements that should be presented in a tabular layout. Use this element to structure content in a compact way and to link to further information pages.',
		),
	),
	'types' => array('content'),
	'contentCategory' => 'texts',
	'beTemplate' => 'rsce_be_block_table_link',
	'standardFields' => array('cssID'),
	'fields' => array(
		'description1' => array(
			'label' => array('Einstellungen', ''),
			'inputType' => 'group',
		),
		'hasBorder' => array(
			'label' => array(
				'de' => array('Rahmen', 'Wählen Sie aus, ob der Block mit einem Rahmen dargestellt wird.'),
			),
			'inputType' => 'checkbox',
			'eval' => array('tl_class' => 'w50 widget',),
		),
		'hasBackgroundColor' => array(
            'label' => array(
                'de' => array('Hintergrundfarbe', 'Wählen Sie aus, ob das Element eine Hintergrundfarbe erhalten soll.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
		),
		'hasBackgroundIcon' => array(
            'label' => array(
                'de' => array('Hintergrundicon', 'Wählen Sie aus, ob das Element ein Hintergrundicon erhalten soll.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
		),
		'description2' => array(
			'label' => array('Bezeichnung', ''),
			'inputType' => 'group',
		),
		'headline' => array(
			'label' => array(
				'de' => array('Überschrift', 'Text, der als Hauptüberschrift dieses Elements angezeigt wird.'),
			),
			'inputType' => 'text',
			'eval' => array('basicEntities'=>true, 'mandatory' => true, 'tl_class' => 'w50 widget'),
		),
		'headlineOrder' => array(
			'label' => array(
				'de' => array('Überschriftenebene', 'Wählen Sie die passende Überschriftenebene entsprechend der Seitenhierarchie aus. Dies ist wichtig für die Barrierefreiheit und SEO.'),
			),
			'inputType' => 'select',
			'options' => array(
				'h2' => 'h2',
				'h3' => 'h3',
				'h4' => 'h4',
			),
			'default' => 'h3',
			'eval' => array('mandatory' => true,  'tl_class' => 'w50 widget',),
		),
		'subheadline' => array(
			'label' => array(
				'de' => array('Unterüberschrift', 'Text, der als zusätzliche Überschrift unterhalb der Hauptüberschrift angezeigt wird. Die Unterüberschrift ist kleiner und dezenter formatiert und dient ausschließlich der inhaltlichen Ergänzung - sie sollte kein neues, eigenständiges Thema einführen.'),
			),
			'inputType' => 'text',
			'eval' => array('basicEntities'=>true, 'tl_class' => 'w50', 'allowHtml' => true),
		),
		'description3' => array(
			'label' => array('Tabelle', ''),
			'inputType' => 'group',
		),
		'table' => array(
			'label' => array(
				'de' => array('Tabelle', 'Erstellen Sie eine neue Tabelle mit Textinhalten'),
			),
			'inputType' => 'tableWizard',
			'eval' => array('basicEntities'=>true, 'mandatory' => true, 'tl_class' => 'clr widget'),
		),
		'captionTable' => array(
			'label' => array(
				'de' => array('Tabellenüberschrift (Caption)', 'Kurze, präzise Überschrift für die Tabelle. Beschreibt den Inhalt der Tabelle und erleichtert Nutzer*innen sowie Screenreadern das Verständnis. In diesem Fall wird die Tabellenüberschrift versteckt und nur für Screenreader bereitgestellt.'),
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50 widget',),
		),
		'description4' => array(
			'label' => array('Link zur Detailseite', ''),
			'inputType' => 'group',
		),
		'hasLink' => array(
			'label' => array(
				'de' => array('Soll der erstellte Block auf eine Detailseite verlinken?', ''),
			),
			'inputType' => 'checkbox',
			'options' => array(
				'isLink' => 'Link erstellen',
			),
			'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
		),
		'url' => array(
			'label' => array(
				'de' => array('Link-Ziel', 'Wählen Sie die Zielseite aus dem Seitenbaum aus, zu der der Teaser verlinken soll.'),
			),
			'dependsOn' => array(
				'field' => 'hasLink',
				'value' => 'isLink',
			),
			'inputType' => 'url',
			'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget'),
		),
		'linkAriaLabel' => array(
			'label' => array(
				'de' => array('Aria-Label', 'Geben Sie eine eindeutige und aussagekräftige Beschreibung für Screenreader-Nutzerinnen und -Nutzer ein. Das Aria-Label sollte den Zweck des Links klar formulieren, z. B. „Weitere Infos zum Angebot ‚Mach dich locker‘ für Klassen 1–2“. Der Text ist nur für Assistive Technologien sichtbar und verbessert die Barrierefreiheit des Buttons.'),
			),
			'dependsOn' => array(
				'field' => 'hasLink',
				'value' => 'isLink',
			),
			'inputType' => 'text',
			'eval' => array('tl_class' => 'w50 widget',),
		),
	),
);
