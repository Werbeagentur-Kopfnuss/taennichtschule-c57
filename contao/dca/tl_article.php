<?php

// Felder registrieren
$GLOBALS['TL_DCA']['tl_article']['fields']['width_variant'] = [
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['full', 'standard', 'narrow'],
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['width_variant_ref'],
    'default'   => 'standard',
    'eval'      => ['includeBlankOption' => true, 'tl_class' => 'w50'],
    'sql'       => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_article']['fields']['with_background'] = [
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50 m12'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_article']['fields']['with_background_color'] = [
    'exclude'   => true,
    'inputType' => 'select',
    'options'   => ['standard', 'light', 'dark'],
    'reference' => &$GLOBALS['TL_LANG']['tl_article']['with_background_color_ref'],
    'default'   => 'standard',
    'eval'      => ['includeBlankOption' => true, 'tl_class' => 'w50'],
    'sql'       => "varchar(16) NOT NULL default ''",
];

// In die Palette einsortieren (z. B. in die Layout-Gruppe)
$GLOBALS['TL_DCA']['tl_article']['palettes']['default'] = str_replace(
    '{template_legend:hide}',
    '{layout_legend},width_variant,with_background,with_background_color;{template_legend:hide}',
    $GLOBALS['TL_DCA']['tl_article']['palettes']['default']
);
