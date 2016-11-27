<?php
// $Id: views-view-news.tpl.php,v 0.1.1 2009/10/02 22:22:32 symphonythemes Exp $
/**
 * @file views-view-news.tpl.php
 * Main view template
 *
 * Variables available:
 * - $css_name: A css-safe version of the view name.
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 * - $admin_links: A rendered list of administrative links
 * - $admin_links_raw: A list of administrative links suitable for theme('links')
 *
 * @ingroup views_templates
 */
?>
<?php if ($admin_links): ?>
<div class="views-admin-links views-hide">
  <?php print $admin_links; ?>
</div>
<?php endif; ?>
<?php if ($header): ?>
<div class="view-header">
  <?php print $header; ?>
</div>
<?php endif; ?>

<?php if ($exposed): ?>
<div class="view-filters">
  <?php print $exposed; ?>
</div>
<?php endif; ?>

<?php if ($attachment_before): ?>
<div class="attachment-before">
  <?php print $attachment_before; ?>
</div>
<?php endif; ?>

<?php if ($rows): ?>
<div class="view-content">
  <?php print $rows; ?>
</div>
<?php elseif ($empty): ?>
<div class="view-empty">
  <?php print $empty; ?>
</div>
<?php endif; ?>

<?php if ($pager): ?>
<?php print $pager; ?>
<?php endif; ?>

<?php if ($attachment_after): ?>
<div class="attachment-after">
  <?php print $attachment_after; ?>
</div>
<?php endif; ?>

<?php if ($more): ?>
<?php print $more; ?>
<?php endif; ?>

<?php if ($footer): ?>
<div class="view-footer">
  <?php print $footer; ?>
</div>
<?php endif; ?>

<?php if ($feed_icon): ?>
<div class="feed-icon">
  <?php print $feed_icon; ?>
</div>
<?php endif; ?>