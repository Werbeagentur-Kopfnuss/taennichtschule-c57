<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Block - Seitenteaser - Bild & Text',
            'Teaser-Element zur ansprechenden Darstellung von Seiten mit Bild, Text und Verlinkung',
        ),
        'en' => array(
            'CUSTOM - Page teaser with hover image',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_block_page_teaser_standard',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Überschrift', ''),
            'inputType' => 'group',
        ),
        'pagename' => array(
            'label' => array(
                'de' => array('Titel des Teasers', 'Geben Sie den Titel ein, der als Überschrift im Teaser angezeigt werden soll.'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'headlineorder' => array(
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
        ),
        'description2' => array(
            'label' => array('Verlinkung', ''),
            'inputType' => 'group',
        ),
        'url' => array(
            'label' => array(
                'de' => array('Link-Ziel', 'Wählen Sie die Zielseite aus dem Seitenbaum aus, zu der der Teaser verlinken soll.'),
            ),
            'inputType' => 'url',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget'),
        ),
        'description3' => array(
            'label' => array('Bild', ''),
            'inputType' => 'group',
        ),
        'image' => array(
            'label' => array(
                'de' => array('Bild', 'Wählen Sie über den Dateipicker das gewünschte Bild aus.'),
            ),
            'inputType' => 'fileTree',
            'eval' => array(
                'mandatory' => true,
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => 'jpg,jpeg,png,gif,svg',
                'tl_class' => 'clr widget'
            ),
        ),
        'imageSize' => array(
            'label' => array(
                'de' => array('Bildgröße', 'Wählen Sie die passende voreingestellte Bildgröße aus, um das Bild für verschiedene Bildschirmgrößen zu optimieren.'),
            ),
            'inputType' => 'imageSize',
            'default' => [0, 0, '_rsce_block_page_teaser_standard_teaser_image'],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'clr w50 widget'
            ),
        ),
        'hasImageMetadata' => array(
            'label' => array(
                'de' => array('Metadaten überschreiben', 'Die Metadaten der Datei manuell überschreiben. Ohne Aktivierung werden die Metadaten aus der Dateiverwaltung genutzt.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
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
        'description4' => array(
            'label' => array('Text', ''),
            'inputType' => 'group',
        ),
        'teaser' => array(
            'label' => array(
                'de' => array('Textfeld', 'Geben Sie hier den Teasertext für die Seitenvorschau ein.'),
            ),
            'eval' => array('rte' => 'tinyMCE', 'tl_class' => 'clr widget',),
            'inputType' => 'textarea',
        ),
        'description5' => array(
            'label' => array('Einstellungen', ''),
            'inputType' => 'group',
        ),
        'hasBackgroundColor' => array(
            'label' => array(
                'de' => array('Hintergrundfarbe', 'Wählen Sie aus, ob das Element eine Hintergrundfarbe erhalten soll.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
        ),
        'hasLink' => array(
            'label' => array(
                'de' => array('Link unter dem Text anzeigen?', ''),
            ),
            'inputType' => 'checkbox',
            'options' => array(
                'isLink' => 'Link anzeigen',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'hasButton' => array(
            'label' => array(
                'de' => array('Button unter dem Text anzeigen?', ''),
            ),
            'inputType' => 'checkbox',
            'options' => array(
                'isButton' => 'Button anzeigen',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
            'dependsOn' => array(
                'field' => 'hasLink',
                'value' => 'isLink',
            ),
        ),
        'hasLinkDescription' => array(
            'label' => array(
                'de' => array('Linktext: Manuelle Eingabe überschreibt die automatische Vergabe.', ''),
            ),
            'inputType' => 'checkbox',
            'options' => array(
                'isLinkDescription' => 'Linktext manuell vergeben',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
            'dependsOn' => array(
                'field' => 'hasLink',
                'value' => 'isLink',
            ),
        ),
        'linkDescription' => array(
            'label' => array(
                'de' => array('Link-Bezeichnung', 'Geben Sie einen beschreibenden Linktext ein, der das Ziel klar benennt (z. B. „Mehr über unser Schulprogramm erfahren"). Dies verbessert die Barrierefreiheit für Screenreader-Nutzer*innen.'),
            ),
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget'),
            'dependsOn' => array(
                'field' => 'hasLinkDescription',
                'value' => 'isLinkDescription',
            ),
        ),
    ),
);
