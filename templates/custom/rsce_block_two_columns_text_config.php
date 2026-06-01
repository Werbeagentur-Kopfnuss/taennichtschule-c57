<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Block - Zweispaltig - Text & Bild',
            'Erstellt ein zweispaltiges Element mit Text und Bild.',
        ),
        'en' => array(
            'CUSTOM - Text and image in two columns',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_block_two_columns_text',
    'standardFields' => array('cssID'),
    'wrapper' => array(
        'type' => 'none',
    ),
    'fields' => array(
        'description1' => array(
            'label' => array('Überschrift', ''),
            'inputType' => 'group',
        ),
        'headlineRow' => array(
            'label' => array(
                'de' => array('Überschrift', 'Geben Sie die Überschrift ein, die für beide Spalten angezeigt werden soll.'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'tl_class' => 'w50 widget'),
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
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'description2' => array(
            'label' => array('Einstellung', ''),
            'inputType' => 'group',
        ),
        'hasHorizontalCenter' => array(
            'label' => array(
                'de' => array('Linkes und rechtes Element horizontal zentrieren', 'Aktivieren, um beide Elemente horizontal zu zentrieren.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array(),
        ),
        'description3' => array(
            'label' => array('Text', 'Sie können diese Textspalte ausfüllen oder leer lassen, um stattdessen ein Bild zu platzieren oder den frei bleibenden Raum zu nutzen.'),
            'inputType' => 'group',
        ),
        'textLeft' => array(
            'label' => array(
                'de' => array('Text linke Spalte', 'Geben Sie den Text für die linke Spalte ein.'),
            ),
            'eval' => array('rte' => 'tinyMCE', 'basicEntities' => true, 'tl_class' => 'w50 widget'),
            'inputType' => 'textarea',
        ),
        'textRight' => array(
            'label' => array(
                'de' => array('Text rechte Spalte', 'Geben Sie den Text für die rechte Spalte ein.'),
            ),
            'eval' => array('rte' => 'tinyMCE', 'basicEntities' => true, 'tl_class' => 'w50 widget'),
            'inputType' => 'textarea',
        ),
        'description4' => array(
            'label' => array('Bild links', ''),
            'inputType' => 'group',
        ),
        'hasImageLeft' => array(
            'label' => array(
                'de' => array('Bild links', 'Aktivieren, um das Bild links anzuzeigen.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array(),
        ),
        'imageLeftPosition' => array(
            'label' => array(
                'de' => array('Bildposition', 'Wählen Sie aus, ob das Bild oberhalb oder unterhalb des Textes angezeigt werden soll. Wenn kein Text in der Spalte vorhanden ist, hat diese Einstellung keine Auswirkung.'),
            ),
            'inputType' => 'select',
            'dependsOn' => array(
                'field' => 'hasImageLeft',
                'value' => '1',
            ),
            'options' => array(
                'top' => 'Oberhalb vom Text',
                'bottom' => 'Unterhalb vom Text',
            ),
            'eval' => array('tl_class' => 'w50 widget'),
        ),
        'imageLeft' => array(
            'label' => array(
                'de' => array('Bild links', 'Wählen Sie über den Dateipicker das gewünschte Bild aus.'),
            ),
            'inputType' => 'fileTree',
            'dependsOn' => array(
                'field' => 'hasImageLeft',
                'value' => '1',
            ),
            'eval' => array(
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => 'jpg,jpeg,png,gif,svg',
                'tl_class' => 'clr widget'
            ),
        ),
        'imageSizeLeft' => array(
            'label' => array(
                'de' => array('Bildgröße', 'Wählen Sie die passende voreingestellte Bildgröße aus, um das Bild für verschiedene Bildschirmgrößen zu optimieren.'),
            ),
            'inputType' => 'imageSize',
            'dependsOn' => array(
                'field' => 'hasImageLeft',
                'value' => '1',
            ),
            'default' => [0, 0, '_content_element_image_50_standard_site'],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'clr w50 widget'
            ),
        ),
        'imageLeftLightBox' => array(
            'label' => array(
                'de' => array('Großansicht', 'Öffnet die Großansicht des Bildes in einer Lightbox.'),
            ),
            'inputType' => 'checkbox',
            'dependsOn' => array(
                'field' => 'hasImageLeft',
                'value' => '1',
            ),
            'eval' => array('tl_class' => 'clr w50 cbx widget'),
        ),
        'hasImageMetadataLeft' => array(
            'label' => array(
                'de' => array('Metadaten überschreiben', 'Die Metadaten der Datei manuell überschreiben. Ohne Aktivierung werden die Metadaten aus der Dateiverwaltung genutzt.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
            'dependsOn' => array(
                'field' => 'hasImageLeft',
                'value' => '1',
            ),
        ),
        'imageAltLeft' => array(
            'label' => array(
                'de' => array('Alternativer Text für das Bild', 'Der alternative Text („alt“-Attribut) beschreibt den Inhalt und Zweck des Bildes. Er verbessert die Barrierefreiheit, insbesondere für Menschen mit Sehbehinderungen oder für Nutzer, die Bilder nicht laden können.'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'clr w50',
                'mandatory' => true,
            ),
            'dependsOn' => array(
                'field' => 'hasImageMetadataLeft',
                'value' => true,
            ),
        ),
        'description5' => array(
            'label' => array('Bild rechts', ''),
            'inputType' => 'group',
        ),
        'hasImageRight' => array(
            'label' => array(
                'de' => array('Bild rechts', 'Aktivieren, um das Bild rechts anzuzeigen.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array(),
        ),
        'imageRightPosition' => array(
            'label' => array(
                'de' => array('Bildposition', 'Wählen Sie aus, ob das Bild oberhalb oder unterhalb des Textes angezeigt werden soll. Wenn kein Text in der Spalte vorhanden ist, hat diese Einstellung keine Auswirkung.'),
            ),
            'inputType' => 'select',
            'dependsOn' => array(
                'field' => 'hasImageRight',
                'value' => '1',
            ),
            'options' => array(
                'top' => 'Oberhalb vom Text',
                'bottom' => 'Unterhalb vom Text',
            ),
            'eval' => array('tl_class' => 'w50 widget'),
        ),
        'imageRight' => array(
            'label' => array(
                'de' => array('Bild rechts', 'Wählen Sie über den Dateipicker das gewünschte Bild aus.'),
            ),
            'inputType' => 'fileTree',
            'dependsOn' => array(
                'field' => 'hasImageRight',
                'value' => '1',
            ),
            'eval' => array(
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => 'jpg,jpeg,png,gif,svg',
                'tl_class' => 'clr widget'
            ),
        ),
        'imageSizeRight' => array(
            'label' => array(
                'de' => array('Bildgröße', 'Wählen Sie die passende voreingestellte Bildgröße aus, um das Bild für verschiedene Bildschirmgrößen zu optimieren.'),
            ),
            'inputType' => 'imageSize',
            'dependsOn' => array(
                'field' => 'hasImageRight',
                'value' => '1',
            ),
            'default' => [0, 0, '_content_element_image_50_standard_site'],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'clr w50 widget'
            ),
        ),
        'imageRightLightBox' => array(
            'label' => array(
                'de' => array('Großansicht', 'Öffnet die Großansicht des Bildes in einer Lightbox.'),
            ),
            'inputType' => 'checkbox',
            'dependsOn' => array(
                'field' => 'hasImageRight',
                'value' => '1',
            ),
            'eval' => array('tl_class' => 'clr w50 cbx widget'),
        ),
        'hasImageMetadataRight' => array(
            'label' => array(
                'de' => array('Metadaten überschreiben', 'Die Metadaten der Datei manuell überschreiben. Ohne Aktivierung werden die Metadaten aus der Dateiverwaltung genutzt.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
            'dependsOn' => array(
                'field' => 'hasImageRight',
                'value' => '1',
            ),
        ),
        'imageAltRight' => array(
            'label' => array(
                'de' => array('Alternativer Text für das Bild', 'Der alternative Text („alt“-Attribut) beschreibt den Inhalt und Zweck des Bildes. Er verbessert die Barrierefreiheit, insbesondere für Menschen mit Sehbehinderungen oder für Nutzer, die Bilder nicht laden können.'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'clr w50',
                'mandatory' => true,
            ),
            'dependsOn' => array(
                'field' => 'hasImageMetadataRight',
                'value' => true,
            ),
        ),
    ),
);
