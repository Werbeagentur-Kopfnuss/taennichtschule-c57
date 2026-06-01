<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Block - Überschrift & Icon & Text',
            'Erstellt ein Blockelement, dem optional ein Icon und ein Überschrift mit Beschreibungstext hinzugefügt werden kann.',
        ),
        'en' => array(
            'CUSTOM - Text with or without icon',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_block_icon_text',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Einstellungen', 'Wählen Sie die passenden Optionen für dieses Element aus.'),
            'inputType' => 'group',
        ),
        'hasHeadline' => array(
            'label' => array(
                'de' => array('Überschrift', 'Aktivieren Sie diese Option, wenn das Element eine Überschrift enthalten soll.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
        'hasIcon' => array(
            'label' => array(
                'de' => array('Bild oder Icon anzeigen', 'Wählen Sie aus, ob ein Bild oder ein Icon angezeigt werden soll.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
        'iconArt' => array(
            'label' => array(
                'de' => array('Art des Icons', 'Wählen Sie aus, ob das Icon als SVG oder als Bild aus der Dateiverwaltung eingebunden wird.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'isIconFileSvg' => 'SVG als inserttag oder raw',
                'isIconImage' => 'Icon als Bild aus Dateiverwaltung',
            ),
            'default' => 'isIconFileSvg',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
            'dependsOn' => 'hasIcon',
        ),
        'iconPosition' => array(
            'label' => array(
                'de' => array('Position des Icons', 'Legen Sie fest, ob das Icon links, rechts oder oberhalb des Textes angezeigt wird.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'left' => 'Links',
                'right' => 'Rechts',
                'top' => 'Oben',
            ),
            'default' => 'top',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
            'dependsOn' => 'hasIcon',
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
        'description2' => array(
            'label' => array('Icon', ''),
            'inputType' => 'group',
            'dependsOn' => 'hasIcon',
        ),
        'svg' => array(
            'label' => array(
                'de' => array('Icon (SVG)', 'Binden Sie ein Icon über Contao-InsertTags ein, z. B. {{file::icon-name}}.'),
            ),
            'inputType' => 'textarea',
            'eval' => array('mandatory' => true, 'allowHtml' => true, 'tl_class' => 'w50 widget',),
            'dependsOn' => array(
                'field' => 'iconArt',
                'value' => 'isIconFileSvg',
            ),
        ),
        'image' => array(
            'label' => array(
                'de' => array('Icon', 'Wählen Sie über den Dateipicker das gewünschte Bild aus.'),
            ),
            'inputType' => 'fileTree',
            'eval' => array(
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => 'jpg,jpeg,png,gif,svg',
                'tl_class' => 'clr widget'
            ),
            'dependsOn' => array(
                'field' => 'iconArt',
                'value' => 'isIconImage',
            ),
        ),
        'imageSize' => array(
            'label' => array(
                'de' => array('Bildgröße', 'Wählen Sie die passende voreingestellte Bildgröße aus, um das Bild für verschiedene Bildschirmgrößen zu optimieren.'),
            ),
            'inputType' => 'imageSize',
            'default' => [0, 0, '_rsce_block_icon_text_icon'],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'clr w50 widget'
            ),
            'dependsOn' => array(
                'field' => 'iconArt',
                'value' => 'isIconImage',
            ),
        ),
        'hasImageMetadata' => array(
            'label' => array(
                'de' => array('Metadaten überschreiben', 'Die Metadaten der Datei manuell überschreiben. Ohne Aktivierung werden die Metadaten aus der Dateiverwaltung genutzt.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
            'dependsOn' => array(
                'field' => 'iconArt',
                'value' => 'isIconImage',
            ),
        ),
        'imageAlt' => array(
            'label' => array(
                'de' => array('Alternativer Text für das Bild', 'Der alternative Text („alt“-Attribut) beschreibt den Inhalt und Zweck des Bildes. Er verbessert die Barrierefreiheit, insbesondere für Menschen mit Sehbehinderungen oder für Nutzer, die Bilder nicht laden können.'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'clr w50',
                'mandatory' => true,
            ),
            'dependsOn' => array(
                'field' => 'hasImageMetadata',
                'value' => true,
            ),
        ),
        'description3' => array(
            'label' => array('Inhalt', ''),
            'inputType' => 'group',
        ),
        'headline' => array(
            'label' => array(
                'de' => array('Überschrift', 'Geben Sie den Titel ein, der als Überschrift im Element angezeigt werden soll.'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'mandatory' => true, 'tl_class' => 'w50 widget',),
            'dependsOn' => 'hasHeadline',
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
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
            'dependsOn' => 'hasHeadline',
        ),
        'text' => array(
            'label' => array(
                'de' => array('Text', 'Tragen Sie hier den Beschreibungstext für das Element ein.'),
            ),
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'rte' => 'tinyMCE', 'tl_class' => 'clr widget',),
        ),
    ),
);
