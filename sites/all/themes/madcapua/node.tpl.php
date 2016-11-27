<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">

		<?php if ($page == 0) { ?>
  		<h2 class="node-title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
		<?php } ?>

		<?php print $content; ?>
  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy  and $page == 1) { ?>
      <div class="terms"><?php print $terms ?></div>
    <?php } ?>
    </div>
    <?php if ($links and $page == 1) { ?>
      <div class="links"><?php print $links; ?></div>
    <?php } ?>
  </div>

</div>
