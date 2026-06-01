<?php

return array(
    'label' => array(
        'de' => array(
            'CUSTOM - Überschrift + Zusatzüberschrift',
            'Hauptüberschrift mit ergänzendem Titel. Die Zusatzüberschrift dient zur inhaltlichen Einordnung oder Präzisierung und sollte kein neues, eigenständiges Thema einführen. Position und Darstellung richten sich nach den gewählten Einstellungen.',
        ),
        'en' => array(
            'CUSTOM - Heading in two lines',
            'A headline in two lines',
        ),
    ),
    'types' => array('content'),
    'contentCategory' => 'texts',
    'beTemplate' => 'rsce_be_headline_subheadline',
    'standardFields' => array('cssID'),
    'fields' => array(
        'description1' => array(
            'label' => array('Eigenschaften', ''),
            'inputType' => 'group',
        ),
        'subheadlineTopBottom' => array(
            'label' => array(
                'de' => array('Position der Unterüberschrift', 'Legen Sie fest, ob die Unterüberschrift oberhalb oder unterhalb der Hauptüberschrift angezeigt wird.'),
            ),
            'inputType' => 'select',
            'options' => array(
                'isTop' => 'Oben',
                'isBottom' => 'Unten',
            ),
            'default' => 'isBottom',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'description2' => array(
            'label' => array('Überschrift', ''),
            'inputType' => 'group',
        ),
        'headline' => array(
            'label' => array(
                'de' => array('Überschrift', 'Text, der als Hauptüberschrift dieses Elements angezeigt wird.'),
            ),
            'inputType' => 'text',
            'eval' => array('mandatory' => true, 'tl_class' => 'w50',),
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
            'eval' => array('mandatory' => true, 'tl_class' => 'w50 widget',),
        ),
        'description3' => array(
            'label' => array('Zusatzüberschrift', 'Zusatztext zur Hauptüberschrift. Dient zur inhaltlichen Einordnung oder Ergänzung.'),
            'inputType' => 'group',
        ),
        'headlineTop' => array(
            'label' => array(
                'de' => array('Oberüberschrift', 'Text, der als zusätzliche Überschrift oberhalb der Hauptüberschrift angezeigt wird. Nur verwenden, wenn der Text die Hauptüberschrift ergänzt und kein eigenständiges Thema einführt.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50',),
            'dependsOn' => array(
                'field' => 'subheadlineTopBottom',
                'value' => 'isTop',
            ),
        ),
        'headlineBottom' => array(
            'label' => array(
                'de' => array('Unterüberschrift', 'Text, der als zusätzliche Überschrift unterhalb der Hauptüberschrift angezeigt wird. Nur verwenden, wenn der Text die Hauptüberschrift ergänzt und kein eigenständiges Thema einführt.'),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'w50',),
            'dependsOn' => array(
                'field' => 'subheadlineTopBottom',
                'value' => 'isBottom',
            ),
        ),
    ),
);
