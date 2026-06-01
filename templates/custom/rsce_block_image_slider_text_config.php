<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Block - Bild / Slider & Text',
            'Erstellt ein Blockelement, dem optional ein Icon und ein Überschrift mit Beschreibungstext hinzugefügt werden kann.',
        ),
        'en' => array(
            'CUSTOM - Text with or without icon',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_block_image_slider_text',
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
            'label' => array('Bild', ''),
            'inputType' => 'group',
        ),
        'images' => array(
            'label' => array(
                'de' => array('Bilder', 'Wählen Sie ein Bild oder mehrere Bilder für die Ausgabe bzw. Slideshow.'),
            ),
            'inputType' => 'fileTree',
            'eval' => array(
                'multiple' => true,
                'fieldType' => 'checkbox',
                'filesOnly' => true,
                'extensions' => 'jpg,jpeg,png,gif,svg',
                'orderField' => 'orderSRC',
                'isGallery' => true,
                'tl_class' => 'clr widget'
            ),
        ),
        'imageSize' => array(
            'label' => array(
                'de' => array('Bildgröße', 'Wählen Sie die passende voreingestellte Bildgröße aus, um das Bild für verschiedene Bildschirmgrößen zu optimieren.'),
            ),
            'inputType' => 'imageSize',
            'default' => [0, 0, '_rsce_block_image_slider_text_image'],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'clr w50 widget'
            ),
        ),
        'autoplay' => array(
            'label' => array('Autoplay', 'Slideshow automatisch abspielen.'),
            'inputType' => 'checkbox',
            'eval' => array(
                'tl_class' => 'w50 m12',
            ),
        ),

        'autoplayDelay' => array(
            'label' => array('Autoplay-Verzögerung (ms)', 'Zeit zwischen den Slides (Standard: 5000 ms).'),
            'inputType' => 'text',
            'default' => '5000',
            'eval' => array(
                'rgxp' => 'natural',
                'tl_class' => 'w50',
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
