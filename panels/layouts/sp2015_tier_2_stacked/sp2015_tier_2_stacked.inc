<?php

/**
 * @file
 * Defines a naked two-column layout with a subcolumn bar.
 */

// Plugin definition.
$plugin = array(
  'title' => t('SP2015 Tier 2 Stacked'),
  'category' => t('SP2015'),
  'icon' => 'sp2015_tier_2_stacked.png',
  'theme' => 'sp2015_tier_2_stacked',
  'regions' => array(
    'top' => t('Top'),
    'center' => t('Center'),
    'left-column' => t('Left'),
    'right-column' => t('Right'),
    'bottom' => t('Bottom'),
    'bottom-left' => t('Bottom Left'),
    'bottom-right' => t('Bottom Right'),
  ),
);
