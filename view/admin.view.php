<?php

require "./view/template/header.view.php";

$auth = Authentication::check();

?>

<h5><?= $content ?></h5>


<?php

require "./view/template/footer.view.php"
?>