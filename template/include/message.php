<?php

if (isset($_SESSION["message"])) {
?>

<label class="col-12 alert bg-danger text-white">
    <?php echo $_SESSION["message"];
        unset($_SESSION["message"]); ?></label>


<?php
}