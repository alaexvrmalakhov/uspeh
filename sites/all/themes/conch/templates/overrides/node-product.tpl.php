<?php
// $Id: node.tpl.php,v 0.1.1 2009/10/02 22:22:32 symphonythemes Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

<?php if ($page == 0): ?>
  <h3><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h3>
<?php endif; ?>
  <div class="clear-block"><div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms"><?php //print $terms ?></div>
    <?php endif;?>
    </div></div>
  <div class="content clear-block">
    <?php print $content ?>
  </div>

  <div class="clear-block">
    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>

</div>