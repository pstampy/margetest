<?php

/**
 * @file
 * Defines a naked two-column layout with a subcolumn bar.
 */

// Plugin definition.
$plugin = array(
  'title' => t('SP2015 Home (Alternate)'),
  'category' => t('SP2015'),
  'icon' => 'sp2015_alt_home.png',
  'theme' => 'sp2015_alt_home',
  'regions' => array(
  	'top' => t('Top'),
    'left_top' => t('Left Top'),
    'right_top' => t('Right Top'),
    'center' => t('Center'),
    'bottom' => t('Bottom'),
  ),
);
