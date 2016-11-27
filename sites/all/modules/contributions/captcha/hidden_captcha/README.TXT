Installation:
1. Put module to Drupal's module directory.
2. Enable it at admin/build/modules
3. Enable it where you want in "Challenge type per form" field at admin/user/captcha
4. Enjoy :)

FAQ:
Q: Module is not work. Why?
A: Make sure that your theme's page.tpl.php has this line before </body> tag:
<?php print $closure ?>