<?php 
$title = 'Tableau de bord | Success Mission';
ob_start();
?>


<?php 
$content = ob_get_clean();
require 'template.php';
?>