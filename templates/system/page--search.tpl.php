<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['branding']: Items for the branding region.
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region.
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see omega_preprocess_page()
 */
?>
<div class="l-page">
  <header class="l-header" role="banner">
    <div class="l-top-bar">
      <?php print render($page['top_bar']); ?>
    </div>
    <div class="l-branding">
      <h1 class="element-invisible">National Innovation and Science Agenda</h1>
      <div class="site-logos">
        <div class="left-logo">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
            <img src="<?php print base_path() . path_to_theme() . '/images/australian-government-wide.png' ?>" alt="<?php print t('Home'); ?>" />
          </a>
        </div>
        <div class="right-logo">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home">
            <img src="<?php print base_path() . path_to_theme() . '/images/nisa-logo.png' ?>" alt="National Innvoation and Science Agenda" />
          </a>
        </div>
      </div>
    </div>
    <?php print render($page['header']); ?>
    <?php print render($page['menu']); ?>
    <?php print render($page['search']); ?>
  </header>

  <div class="l-main">
    <div class="l-content" role="main">
      <a id="main-content"></a>
      <?php print render($tabs); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <div class="content-wrapper">
        <div class="top-wrapper">
          <div class="top">
            <?php $search_block = module_invoke('search', 'block_view', 'form'); ?>
            <?php print render($search_block['content']); ?>
          </div>
        </div>
        <div class="center-wrapper"></div>
        <div class="sidebar-wrapper">
          <div class="left-sidebar">
            <?php $full_menu_block = module_invoke('menu_block', 'block_view', '2'); ?>
            <?php print render($full_menu_block['content']); ?>
          </div>
          <div class="right-column">
            <?php print $messages; ?>
            <?php print render($page['content']); ?>
          </div>
        </div>
        <div class="bottom-wrapper">
            <?php $main_menu_block = module_invoke('menu_block', 'block_view', '1'); ?>
            <?php print render($main_menu_block['content']); ?>
        </div>
        <div class="sub-bottom-wrapper">
          <div class="bottom-left"></div>
          <div class="bottom-right"></div>
        </div>
      </div>
    </div>
  </div>
  <footer class="l-footer" role="contentinfo">
    <div class="footer-wrapper">
      <div class="social-media">
        <h2 class="element-invisible">Follow us</h2>
        <div class="account-list">
          <div class="facebook">
            <a href="https://www.facebook.com/IdeasBoomAu" title="Folllow us on Facebook">Follow us on Facebook</a>
          </div>
          <div class="twitter">
            <a href="https://www.twitter.com/IdeasBoomAu" title="Follow us on Twitter">Follow us on Twitter</a>
          </div>
          <div class="youtube">
            <a href="https://www.youtube.com/IdeasBoomAu" title="Follow us on YouTube">Follow us on Youtube</a>
          </div>
        </div>
      </div>
    </div>
    <div class="sub-footer-wrapper">

      <div class="footer-image"></div>
      <div class="back-to-top-wrapper">
        <div class="back-to-top">
          <a href="#main-content">Back to top</a>
        </div>
      </div>
      <div class="footer-menu">
        <?php $footer_block = module_invoke('menu', 'block_view', 'menu-footer'); ?>
        <?php print render($footer_block['content']); ?>
      </div>
      <div class="copyright">
        <?php $copyright_block = module_invoke('copyright_block', 'block_view', 'copyright_block'); ?>
        <?php print render($copyright_block['content']); ?>
      </div>
    </div>
  </div>
</footer>
</div>
