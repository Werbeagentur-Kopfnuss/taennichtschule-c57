<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Seitenteiler - parallax',
            'Es wird ein Bild mit Parallax-Effekt erstellt.',
        ),
        'en' => array(
            'CUSTOM - Image parallax',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_parallax_image',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Bild', ''),
            'inputType' => 'group',
        ),
        'image' => array(
            'label' => array(
                'de' => array('Bild', 'Wählen Sie über den Dateipicker das gewünschte Bild aus.'),
            ),
            'inputType' => 'fileTree',
            'eval' => array(
                'fieldType' => 'radio',
                'filesOnly' => true,
                'extensions' => 'jpg,jpeg,png,gif,svg',
                'mandatory' => true,
                'tl_class' => 'clr',
            ),
        ),
        'imageSize' => array(
            'label' => array(
                'de' => array('Bildgröße', ''),
                'en' => array('Image size', ''),
            ),
            'inputType' => 'imageSize',
            'default' => [0, 0, 3],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'w50 clr widget',
            ),
        ),
        'hasImageMetadata' => array(
            'label' => array(
                'de' => array('Metadaten überschreiben', 'Die Metadaten der Datei überschreiben, sonst werden die vergeben Daten aus der Dateiverwaltung verwendet.'),
                'en' => array('Overwrite metadata', 'Overwrite the metadata of the file, otherwise the assigned data from the file manager will be used.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'clr w50 widget',),
        ),
        'imageAlt' => array(
            'label' => array(
                'de' => array('Alternative Text für Bild', 'Der Zweck des "alt" Tags besteht darin, die Zugänglichkeit und Benutzerfreundlichkeit einer Webseite zu verbessern, insbesondere für Menschen mit Sehbehinderungen oder für Benutzer, die Bilder nicht anzeigen können (z. B. aufgrund einer langsamen Internetverbindung).'),
                'en' => array('Alternative text for image', 'The purpose of the "alt" tag is to improve the accessibility and usability of a website, especially for people with visual impairments or for users who cannot view images (e.g. due to a slow internet connection).'),
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
        'imageTitle' => array(
            'label' => array(
                'de' => array('Bildtitel', 'Hier können Sie den Titel des Bildes eingeben (title-Attribut).'),
                'en' => array('Image title', 'Here you can enter the title of the image (title attribute).'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50',),
            'dependsOn' => array(
                'field' => 'hasImageMetadata',
                'value' => true,
            ),
        ),
        'description3' => array(
            'label' => array('Einstellungen', ''),
            'inputType' => 'group',
            'dependsOn' => array(
                'field' => 'iconhasText',
                'value' => true,
            ),
        ),
        'parallaxDirection' => array(
            'label' => array(
                'de' => array('Richtung des Parallax-Effekt', 'In welche Richtung soll der Parallax-Effekt verlaufen?'),
                'en' => array('Direction of the parallax effect', 'In which direction should the parallax effect move?'),
            ),
            'inputType' => 'select',
            'options' => array(
                'up' => 'Nach oben',
                'down' => 'Nach unten',
            ),
            'default' => 'down',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'parallaxOffset' => array(
            'label' => array(
                'de' => array('Vertikale Verschiebung', 'Geben Sie die Verschiebung des Parallax-Bildes in Pixel ein. Positive Werte verschieben das Bild nach unten, negative Werte nach oben.'),
                'en' => array('Vertical Offset', 'Enter the vertical shift of the parallax image in pixels. Positive values shift the image downwards, negative values upwards.'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'rgxp' => 'int',
                'tl_class' => 'w50 clr widget',
            ),
            'default' => '0',
        ),
        'parallaxAmount' => array(
            'label' => array(
                'de' => array('Parallax-Bewegungsanteil', 'Mit diesem Wert bestimmst du, wie stark sich das Bild beim Scrollen bewegt – also wie groß der sichtbare Parallax-Effekt ist. Werte von 0 - 1 sind sinnvoll.'),
                'en' => array('Parallax movement amount', 'With this value, you define how strongly the image moves while scrolling – in other words, how pronounced the visible parallax effect is. Values between 0 and 1 are recommended.'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'rgxp' => 'digit',
                'minval' => 0,
                'maxval' => 1,
                'tl_class' => 'w50 clr widget',
            ),
            'default' => '0.5',
        ),
    ),
);
