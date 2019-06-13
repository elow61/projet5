<?php 
    foreach($projects as $project)
    {
        $title = $project['p_name'] . ' | ' . $_SESSION['first_name'];
    }
ob_start();
?>

<div class="container-workspace">
</div>

<?php 
$content = ob_get_clean();
require 'template.php';
?>