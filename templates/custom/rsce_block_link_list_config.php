<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Block - Linkliste',
            'Es wird eine Liste von Links ausgegeben',
        ),
        'en' => array(
            'CUSTOM - Link list',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_block_link_list',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Einstellungen', ''),
            'inputType' => 'group',
        ),
        'labelNav' => array(
            'label' => array(
                'de' => array('ARIA-Label Linkliste', 'Text für das ARIA-Label der gesamten Linkliste. Dieses Label wird von Screenreadern vorgelesen und sollte den Zweck oder Inhalt der Linkliste eindeutig beschreiben. Nur ausfüllen, wenn die Linkliste ohne dieses Label nicht klar verständlich wäre.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 clr widget'),
        ),
        'hasCustomIcon' => array(
            'label' => array(
                'de' => array('Eigenes Icon verwenden', 'Aktivieren Sie diese Option, wenn Sie dem Link ein eigenes Icon zuweisen möchten, anstelle des standardmäßigen Link-Icons.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
        ),
        'description2' => array(
            'label' => array('Überschrift', ''),
            'inputType' => 'group',
        ),
        'headline' => array(
            'label' => array(
                'de' => array('Überschrift', 'Text, der als Überschrift für die Linkliste angezeigt wird.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50',),
        ),
        'headlineOrder' => array(
            'label' => array(
                'de' => array('Überschriftenebene', 'Wählen Sie die passende Überschriftenebene entsprechend der Seitenhierarchie aus. Dies ist wichtig für die Barrierefreiheit und SEO.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
            ),
            'default' => 'h2',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
        'description3' => array(
            'label' => array('Icon', ''),
            'inputType' => 'group',
            'dependsOn' => array(
                'field' => 'hasCustomIcon',
                'value' => true,
            ),
        ),
        'iconArt' => array(
            'label' => array(
                'de' => array('Art des Icons', 'Wählen Sie aus, ob das Icon als SVG oder als Bild aus der Dateiverwaltung eingebunden wird.'),
            ),
            'inputType' => 'select',
            'dependsOn' => array(
                'field' => 'hasCustomIcon',
                'value' => true,
            ),
            'options' => array(
                'isIconFileSvg' => 'SVG als inserttag oder raw',
                'isIconImage' => 'Icon als Bild aus Dateiverwaltung',
            ),
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'svg' => array(
            'label' => array(
                'de' => array('Icon (SVG)', 'Binden Sie ein Icon über Contao-InsertTags ein, z. B. {{file::icon-name}}.'),
            ),
            'inputType' => 'textarea',
            'eval' => array('mandatory' => true, 'allowHtml' => true, 'tl_class' => 'w50 clr widget',),
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
                'mandatory' => true,
                'tl_class' => 'clr',
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
            'default' => [0, 0, '_rsce_block_link_list_icon'],
            'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
            'reference' => &$GLOBALS['TL_LANG']['MSC'],
            'eval' => array(
                'rgxp' => 'digit',
                'includeBlankOption' => true,
                'tl_class' => 'w50 clr widget',
                'mandatory' => true
            ),
            'dependsOn' => array(
                'field' => 'iconArt',
                'value' => 'isIconImage',
            ),
        ),
        'links' => array(
            'label' => array(
                'de' => array('Linkliste', 'Erstellen Sie einen neuen Link'),
            ),
            'elementLabel' => array(
                'de' => '%s. link',
                'en' => '%s. link',
            ),
            'inputType' => 'list',
            'minItems' => 0,
            'maxItems' => 10,
            'fields' => array(
                'linkUrl' => array(
                    'label' => array(
                        'de' => array('Link', 'Wählen Sie einen Link aus oder geben sie einen Link mit https:// ein.'),
                    ),
                    'inputType' => 'url',
                    'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget'),
                ),
                'isLinkBlank' => array(
                    'label' => array(
                        'de' => array('Link öffnet neues Fenster', 'Aktivieren Sie diese Option, wenn der Link in einem neuen Browserfenster bzw. Tab geöffnet werden soll. Nutzen Sie diese Einstellung sparsam und nur dann, wenn das Verlassen der aktuellen Seite für die Nutzer*innen unerwartet oder nachteilig wäre.'),
                    ),
                    'inputType' => 'checkbox',
                    'eval' => array('tl_class' => 'w50 widget',),
                ),
                'linkName' => array(
                    'label' => array(
                        'de' => array('Link-Bezeichnug', 'Text für die Bezeichnung des Links. Dieser dient als zugänglicher Linktext und muss das Ziel des Links eindeutig und verständlich beschreiben. So können Nutzerinnen – insbesondere Screenreader-Nutzerinnen – sofort erkennen, wohin der Link führt.'),
                    ),
                    'inputType' => 'text',
                    'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget'),
                ),
                'linkHeadline' => array(
                    'label' => array(
                        'de' => array('Link-Überschrift', 'Überschrift, die oberhalb des Links angezeigt wird.'),
                    ),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50 clr widget'),
                ),
                'hasLinkQrCode' => array(
                    'label' => array(
                        'de' => array('QR-Code als Bild anzeigen', 'Aktivieren Sie diese Option, wenn Sie zusätzlich zum Link einen QR-Code als Bild anzeigen möchten.'),
                    ),
                    'inputType' => 'checkbox',
                    'eval' => array('tl_class' => 'w50 clr widget',),
                ),
                'qrImage' => array(
                    'label' => array(
                        'de' => array('QR-Code auswählen', 'Wählen Sie über den Dateipicker dan QR-Code hoch. Verwenden Sie ein gut lesbares und kontrastreiches QR-Code-Bild, damit es zuverlässig gescannt werden kann. Achten Sie darauf, dass der QR-Code zum verlinkten Inhalt führt und dieser eindeutig erkennbar ist.'),
                    ),
                    'inputType' => 'fileTree',
                    'eval' => array(
                        'fieldType' => 'radio',
                        'filesOnly' => true,
                        'extensions' => 'jpg,jpeg,png,gif,svg',
                        'mandatory' => true,
                        'tl_class' => 'clr',
                    ),
                    'dependsOn' => array(
                        'field' => 'hasLinkQrCode',
                        'value' => true,
                    ),
                ),
                'qrImageSize' => array(
                    'label' => array(
                        'de' => array('Bildgröße', 'Wählen Sie die passende voreingestellte Bildgröße aus, um das Bild für verschiedene Bildschirmgrößen zu optimieren.'),
                    ),
                    'inputType' => 'imageSize',
                    'default' => [0, 0, 16],
                    'options' => \Contao\System::getContainer()->get('contao.image.sizes')->getAllOptions(),
                    'reference' => &$GLOBALS['TL_LANG']['MSC'],
                    'eval' => array(
                        'rgxp' => 'digit',
                        'includeBlankOption' => true,
                        'tl_class' => 'w50 clr widget',
                        'mandatory' => true
                    ),
                    'dependsOn' => array(
                        'field' => 'hasLinkQrCode',
                        'value' => true,
                    ),
                ),
            ),
        ),
    ),
);
