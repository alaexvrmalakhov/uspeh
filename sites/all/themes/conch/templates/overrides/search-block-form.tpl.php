<?php
// $Id: search-block-form.tpl.php,v 1.0.1 2009/10/12 16:18:06 symphonythemes Exp $

  /* remove ' this site' - probably should try more surefire way using </label> */
  $search["search_block_form"]= str_replace("Search this site:", "", $search["search_block_form"]);

  print $search["search_block_form"];
  print $search["submit"];
  print $search["hidden"]; 