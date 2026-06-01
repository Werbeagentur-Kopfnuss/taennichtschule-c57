<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Icon - Label / Badge',
            'Ein kompaktes Element aus Icon und Text – ideal für kurze Hinweise, Labels oder Badge-Darstellungen.',
        ),
        'en' => array(
            'CUSTOM - Icon & label / badge',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_icon_label_badge',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Einstellungen', 'Wählen Sie die passenden Einstellungen aus.'),
            'inputType' => 'group',
        ),
        'iconHasText' => array(
            'label' => array(
                'de' => array('Icon hat Beschreibung', 'Bitte auswählen, damit zum Icon eine Beschreibung angezeigt wird.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr cbx widget',),
        ),
        'hasIconLeftRight' => array(
            'label' => array(
                'de' => array('Position des Icons', 'Legen Sie fest, ob das Icon links oder rechts neben dem Element-Text angezeigt wird.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'isLeft' => 'Links',
                'isRight' => 'Rechts',
            ),
            'default' => 'isLeft',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
            'dependsOn' => array(
                'field' => 'iconHasText',
                'value' => true,
            ),
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
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'elementStyle' => array(
            'label' => array(
                'de' => array('Element Style', 'Wählen Sie aus, welche Stilvariante das Element erhalten soll (Primary oder Hervorgehoben). Diese Einstellung beeinflusst die visuelle Darstellung.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'primary' => 'Primary',
                'accent' => 'Hervorgehoben',
                'only-text-icon' => 'ohne Button-Style nur Link-Text mit Icon',
            ),
            'default' => 'primary',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'elementCenter' => array(
            'label' => array(
                'de' => array('Element zentrieren', 'Aktivieren Sie diese Option, um das Element horizontal innerhalb seines übergeordneten Containers auszurichten. So bleibt das Element immer mittig, unabhängig von der Breite des umgebenden Elements.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'w50 clr widget',),
        ),
        'description2' => array(
            'label' => array('Icon', ''),
            'inputType' => 'group',
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
            'default' => [0, 0, '_rsce_icon_label_badge_icon'],
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
        'hasImageMetadata' => array(
            'label' => array(
                'de' => array('Metadaten überschreiben', 'Die Metadaten der Datei manuell überschreiben. Ohne Aktivierung werden die Metadaten aus der Dateiverwaltung genutzt.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array('tl_class' => 'clr w50 widget',),
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
        'imageTitle' => array(
            'label' => array(
                'de' => array('Bildtitel', 'Geben Sie hier den Titel des Bildes ein (title-Attribut). Dieser Text wird als zusätzlicher Hinweis angezeigt, wenn Nutzer mit der Maus über das Bild fahren.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50',),
            'dependsOn' => array(
                'field' => 'hasImageMetadata',
                'value' => true,
            ),
        ),
        'description3' => array(
            'label' => array('Bezeichnung', ''),
            'inputType' => 'group',
            'dependsOn' => array(
                'field' => 'iconHasText',
                'value' => true,
            ),
        ),
        'text' => array(
            'label' => array(
                'de' => array('Icon Bezeichnung', 'Tragen Sie hier die Bezeichnung des Icons ein.'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'tl_class' => 'w50 clr widget', 'allowHtml' => true,),
            'dependsOn' => array(
                'field' => 'iconHasText',
                'value' => true,
            ),
        ),
        'description4' => array(
            'label' => array('Barrierefreiheit', ''),
            'inputType' => 'group',
        ),
        'elementAriaLabel' => array(
            'label' => array(
                'de' => array('Aria-Label', 'Geben Sie eine eindeutige und aussagekräftige Beschreibung für Screenreader-Nutzerinnen und -Nutzer ein. Das Aria-Label sollte den Zweck des Elements klar formulieren. Der Text ist nur für Assistive Technologien sichtbar und verbessert die Barrierefreiheit des Buttons.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
    ),
);
