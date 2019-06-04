<?php
$title = $project['p_name'] . ' | ' . $user['first_name'];
ob_start();
?>

<div class="container-workspace">
    <h1>Bon courage</h1>
</div>

<?php 
$content = ob_get_clean();
require 'template.php';
?>