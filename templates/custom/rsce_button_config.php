<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Button - Icon + Label',
            'Dieses RSCE-Custom-Element erzeugt einen individuell konfigurierbaren Button, der wahlweise mit einer Link-Bezeichnung und einem Icon versehen werden kann. Der Button lässt sich flexibel in Inhalte einbinden und ermöglicht eine klare, visuell unterstützte Weiterleitung zu internen oder externen Zielen.',
        ),
        'en' => array(
            'CUSTOM - Button with text and icon',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_button',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Einstellungen', ''),
            'inputType' => 'group',
        ),
        'hasCustomIcon' => array(
            'label' => array(
                'de' => array('Eigenes Icon verwenden', 'Aktivieren Sie diese Option, wenn Sie dem Button ein eigenes Icon zuweisen möchten, anstelle des standardmäßigen Link-Icons.'),
            ),
            'inputType' => 'checkbox',
            'options' => array(
                'isCustomIcon' => 'Eigenes Icon verwenden',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'hasIconLeftRight' => array(
            'label' => array(
                'de' => array('Position des Icons', 'Legen Sie fest, ob das Icon links oder rechts neben dem Button-Text angezeigt wird.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'isLeft' => 'Links',
                'isRight' => 'Rechts',
            ),
            'dependsOn' => array(
                'field' => 'hasCustomIcon',
                'value' => 'isCustomIcon',
            ),
            'default' => 'isLeft',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
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
            'dependsOn' => array(
                'field' => 'hasCustomIcon',
                'value' => 'isCustomIcon',
            ),
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'buttonCenter' => array(
            'label' => array(
                'de' => array('Button zentrieren', 'Aktivieren Sie diese Option, um den Button horizontal innerhalb seines übergeordneten Containers auszurichten. So bleibt der Button immer mittig, unabhängig von der Breite des umgebenden Elements.'),
            ),
            'inputType' => 'checkbox',
            'options' => array(
                'isButtonCenter' => 'Button zentrieren',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'description2' => array(
            'label' => array('Bezeichnung', ''),
            'inputType' => 'group',
        ),
        'buttonText' => array(
            'label' => array(
                'de' => array('Button Text', 'Geben Sie den Text ein, der im Button angezeigt wird. Wählen Sie eine klare und aussagekräftige Bezeichnung, damit auch Screenreader-Nutzerinnen und -Nutzer den Zweck des Buttons eindeutig verstehen (Barrierefreiheit).'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'description3' => array(
            'label' => array('Verlinkung', ''),
            'inputType' => 'group',
        ),
        'linkArt' => array(
            'label' => array(
                'de' => array('Linkart', 'Wählen Sie die Art der Verlinkung: URL, E-Mail oder Telefon. Bei E-Mail und Telefon werden die Protokolle mailto: bzw. tel: automatisch hinzugefügt.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'isUrl' => 'URL',
                'isEmail' => 'E-Mail',
                'isTelefon' => 'Telefon',
            ),
            'default' => 'isUrl',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'url' => array(
            'label' => array(
                'de' => array('Link-Ziel', 'Wählen Sie die Zielseite aus dem Seitenbaum aus, zu der der Button verlinken soll.'),
            ),
            'dependsOn' => array(
                'field' => 'linkArt',
                'value' => 'isUrl',
            ),
            'inputType' => 'url',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 clr widget'),
        ),
        'email' => array(
            'label' => array(
                'de' => array('E-Mail', 'Geben Sie die E-Mail-Adresse ein.'),
            ),
            'dependsOn' => array(
                'field' => 'linkArt',
                'value' => 'isEmail',
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 clr widget'),
        ),
        'telefon' => array(
            'label' => array(
                'de' => array('Telefon', 'Geben Sie die Telefonnummer ein. Erlaubt sind folgende Zeichen: +0123456789-()/ .'),
            ),
            'dependsOn' => array(
                'field' => 'linkArt',
                'value' => 'isTelefon',
            ),
            'inputType' => 'text',
            'eval' => array('rgxp' => 'phone', 'tl_class' => 'w50 clr widget'),
        ),
        'description4' => array(
            'label' => array('Einstellungen', ''),
            'inputType' => 'group',
        ),
        'buttonStyle' => array(
            'label' => array(
                'de' => array('Button Style', 'Wählen Sie aus, welche Stilvariante der Button erhalten soll (Primary, Secondary oder Reduced). Diese Einstellung beeinflusst die visuelle Hervorhebung und hilft dabei, die Bedeutung des Buttons klar zu kommunizieren.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'primary' => 'Primary',
                'secondary' => 'Secondary',
                'reduced' => 'Reduced',
                'only-text-icon' => 'ohne Button-Style nur Link-Text mit Icon',
            ),
            'default' => 'primary',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'buttonAriaLabel' => array(
            'label' => array(
                'de' => array('Aria-Label', 'Geben Sie eine eindeutige und aussagekräftige Beschreibung für Screenreader-Nutzerinnen und -Nutzer ein. Das Aria-Label sollte den Zweck des Buttons klar formulieren, z. B. „Alle Nachrichten anzeigen“. Der Text ist nur für Assistive Technologien sichtbar und verbessert die Barrierefreiheit des Buttons.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
        'description5' => array(
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
            'default' => [0, 0, '_rsce_button_icon'],
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
    ),
);
