<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Block - Teammitglied',
            'Dieses Element zeigt ein Teammitglied mit allen relevanten Informationen an, wie Name, Position, Telefonnummer, E-Mail und weitere Kontakt- oder Profildetails.',
        ),
        'en' => array(
            'CUSTOM - Team Member',
            '',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_block_team',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Bild', ''),
            'inputType' => 'group',
        ),
        'hasImage' => array(
            'label' => array(
                'de' => array('Bild anzeigen', 'Aktivieren, um das Profilbild anzuzeigen.'),
            ),
            'inputType' => 'checkbox',
            'eval' => array(),
        ),
        'image' => array(
            'label' => array(
                'de' => array('Profilbild', 'Wählen Sie ein Profilbild für das Teammitglied aus. Dieses Bild wird in der Teamansicht angezeigt und sollte das Mitglied klar und ansprechend darstellen.'),
            ),
            'dependsOn' => array(
                'field' => 'hasImage',
                'value' => '1',
            ),
            'inputType' => 'fileTree',
            'eval' => array(
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
            'dependsOn' => array(
                'field' => 'hasImage',
                'value' => '1',
            ),
            'default' => [0, 0, '_rsce_block_team_image'],
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
            'dependsOn' => array(
                'field' => 'hasImage',
                'value' => '1',
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
        'description2' => array(
            'label' => array('Bezeichnung', ''),
            'inputType' => 'group',
        ),
        'name' => array(
            'label' => array(
                'de' => array('Name', 'Geben Sie den vollständigen Namen des Mitarbeiters ein, wie er im Teamprofil angezeigt werden soll.'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'mandatory' => true, 'tl_class' => 'w50 widget'),
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
        ),
        'teamTitle' => array(
            'label' => array(
                'de' => array('Titel', 'Geben Sie die Position oder Berufsbezeichnung des Mitarbeiters im Unternehmen ein, z. B. „Projektmanager“ oder „Marketing Specialist“.'),
            ),
            'inputType' => 'text',
            'eval' => array('basicEntities' => true, 'tl_class' => 'w50', 'allowHtml' => true),
        ),
        'description3' => array(
            'label' => array('Kontaktdaten', ''),
            'inputType' => 'group',
        ),
        'hasIcons' => array(
            'label' => array(
                'de' => array('Icons anzeigen', 'Wählen Sie, ob für die Kontaktdaten der Teammitglieder Icons anstelle von Text angezeigt werden sollen, um die Informationen visuell hervorzuheben.'),
            ),
            'inputType' => 'checkbox',
            'options' => array(
                'isIcons' => 'Icons anzeigen',
            ),
            'eval' => array('multiple' => true, 'tl_class' => 'w50 clr widget',),
        ),
        'emailList' => array(
            'label' => array(
                'de' => array('E-Mail Liste', 'Erstellen Sie einen oder mehrere Links für das Teammitglied, z.B. zur persönlichen Webseite oder Social-Media-Profilen.'),
            ),
            'elementLabel' => array(
                'de' => '%s. E-Mail',
            ),
            'inputType' => 'list',
            'minItems' => 0,
            'maxItems' => 5,
            'fields' => array(
                'emailListEmail' => array(
                    'label' => array(
                        'de' => array('E-Mail', 'Geben Sie die E-Mail-Adresse des Teammitglieds ein, über die es erreichbar ist.'),
                    ),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50 clr widget'),
                ),
            ),
        ),
        'telefon' => array(
            'label' => array(
                'de' => array('Telefon', 'Geben Sie die Telefonnummer des Mitarbeitenden ein. Erlaubt sind folgende Zeichen: +0123456789-()/ .'),
            ),
            'inputType' => 'text',
            'eval' => array('rgxp' => 'phone', 'tl_class' => 'w50'),
        ),
        'subject' => array(
            'label' => array(
                'de' => array('Schulfächer', 'Geben Sie die Schulfächer an, in denen das Teammitglied tätig ist oder unterrichtet. Bei mehreren Fächern trennen Sie diese bitte durch ein Komma.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 clr widget'),
        ),
        'fax' => array(
            'label' => array(
                'de' => array('Fax', 'Geben Sie die Faxnummer des Teammitglieds ein. Erlaubt sind folgende Zeichen: +0123456789-()/ .'),
            ),
            'inputType' => 'text',
            'eval' => array('rgxp' => 'phone', 'tl_class' => 'w50'),
        ),
        'links' => array(
            'label' => array(
                'de' => array('Linkliste', 'Erstellen Sie einen oder mehrere Links für das Teammitglied, z.B. zur persönlichen Webseite oder Social-Media-Profilen.'),
            ),
            'elementLabel' => array(
                'de' => '%s. link',
            ),
            'inputType' => 'list',
            'minItems' => 0,
            'maxItems' => 5,
            'fields' => array(
                'linkListUrl' => array(
                    'label' => array(
                        'de' => array('Link-Ziel', 'Wählen Sie die Zielseite aus dem Seitenbaum, zu der der erstellte Link führen soll, oder geben Sie einen externen Link ein, beginnend mit https://.'),
                    ),
                    'inputType' => 'url',
                    'eval' => array('mandatory' => true, 'tl_class' => 'clr widget'),
                ),
                'linkListName' => array(
                    'label' => array(
                        'de' => array('Link-Bezeichnung', 'Geben Sie den Text ein, der im Link angezeigt wird. Wählen Sie eine klare und aussagekräftige Bezeichnung, damit auch Screenreader-Nutzer:innen den Zweck des Links eindeutig verstehen (Barrierefreiheit).'),
                    ),
                    'inputType' => 'text',
                    'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget'),
                ),
                'linkListAriaLabel' => array(
                    'label' => array(
                        'de' => array('Aria-Label', 'Geben Sie eine eindeutige und aussagekräftige Beschreibung für Screenreader-Nutzerinnen und -Nutzer ein. Das Aria-Label sollte den Zweck des Buttons klar formulieren, z. B. „Alle Nachrichten anzeigen“. Der Text ist nur für Assistive Technologien sichtbar und verbessert die Barrierefreiheit des Buttons.'),
                    ),
                    'inputType' => 'text',
                    'eval' => array('tl_class' => 'w50 widget',),
                ),
            ),
        ),
        'headlineListName' => array(
            'label' => array(
                'de' => array('Überschrift Liste', 'Überschrift für die Liste'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
        'headlineOrderList' => array(
            'label' => array(
                'de' => array('Überschriftenebene', 'Wählen Sie die passende Überschriftenebene entsprechend der Seitenhierarchie aus. Dies ist wichtig für die Barrierefreiheit und SEO.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
            ),
            'default' => 'h4',
            'eval' => array('tl_class' => 'w50 widget',),
        ),
        'list' => array(
            'label' => array(
                'de' => array('Liste', 'Erstellen Sie eine neue Liste'),
            ),
            'elementLabel' => array(
                'de' => '%s. list',
            ),
            'inputType' => 'list',
            'minItems' => 0,
            'maxItems' => 5,
            'fields' => array(
                'listEntry' => array(
                    'label' => array(
                        'de' => array('Listeneintrag', 'Erstellen Sie einen neuen Listeneintrag'),
                    ),
                    'inputType' => 'text',
                    'eval' => array('basicEntities' => true, 'mandatory' => true, 'tl_class' => 'w50 clr widget'),
                ),
            ),
        ),
        'description4' => array(
            'label' => array('Link zur Detailseite', ''),
            'inputType' => 'group',
        ),
        'hasLink' => array(
            'label' => array(
                'de' => array('Soll der erstellte Block für das Teammitglied auf eine Detailseite des Mitglieds verlinken?', ''),
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
                'de' => array('Aria-Label', 'Geben Sie eine eindeutige und aussagekräftige Beschreibung für Screenreader-Nutzerinnen und -Nutzer ein. Das Aria-Label sollte den Zweck des Buttons klar formulieren, z. B. „Alle Nachrichten anzeigen“. Der Text ist nur für Assistive Technologien sichtbar und verbessert die Barrierefreiheit des Buttons.'),
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
