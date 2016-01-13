<?php

/**
 * @file
 * Template overrides as well as (pre-)process and alter hooks for the
 * SP2015 theme.
 */

/*function sp2015_preprocess_panels_pane(&$variables) {
  dpm('type: ' . $variables['pane']->type . ' | subtype: ' . $variables['pane']->subtype);
}*/

function sp2015_file_formatter_table($variables) {
  $list = array(
  	'items' => array(),
  	'title' => '',
  	'type' => 'ul',
  	'attributes' => array(
  		'class' => 'file-list',
  	),
	);
  foreach ($variables['items'] as $delta => $item) {
    $list['items'][] = theme('file_link', array('file' => (object) $item));
  }
  asort($list);
  return empty($list) ? '' : theme('item_list', $list);
}

function sp2015_file_link($variables) {
	$file = $variables['file'];
  $icon_directory = $variables['icon_directory'];

  $url = file_create_url($file->uri);

  // Human-readable names, for use as text-alternatives to icons.
  $mime_name = array(
    'application/msword' => t('Microsoft Office document icon'),
    'application/vnd.ms-excel' => t('Office spreadsheet icon'),
    'application/vnd.ms-powerpoint' => t('Office presentation icon'),
    'application/pdf' => t('PDF icon'),
    'video/quicktime' => t('Movie icon'),
    'audio/mpeg' => t('Audio icon'),
    'audio/wav' => t('Audio icon'),
    'image/jpeg' => t('Image icon'),
    'image/png' => t('Image icon'),
    'image/gif' => t('Image icon'),
    'application/zip' => t('Package icon'),
    'text/html' => t('HTML icon'),
    'text/plain' => t('Plain text icon'),
    'application/octet-stream' => t('Binary Data'),
  );

  $fileclass = substr($file->filename, -3);

  $mimetype = file_get_mimetype($file->uri);

  $icon = theme('file_icon', array(
    'file' => $file,
    'icon_directory' => $icon_directory,
    'alt' => !empty($mime_name[$mimetype]) ? $mime_name[$mimetype] : t('File'),
  ));

  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  $options = array(
    'attributes' => array(
      'type' => $file->filemime . '; length=' . $file->filesize,
    ),
  );

  // Use the description as the link text if available.
  if (empty($file->description)) {
    $link_text = $file->filename . ' (' . format_size($file->filesize) . ')';
  }
  else {
    $link_text = $file->description . format_size($file->filesize);
    $options['attributes']['title'] = check_plain($file->filename);
  }

  return '<span class="file ' . $fileclass . '">' . l($link_text, $url, $options) . '</span>';
}
