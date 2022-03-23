<?php
if (isset($_SESSION['message'])) {
?>
<label class="col-12 alert bg-danger text-white">
    <?= $_SESSION['message']; ?></label>

<?php
    // header("Refresh:5");
    unset($_SESSION['message']);
} ?>



<?php

if (isset($_SESSION["errorMsg"])) {
?>

<label class="col-12 alert bg-danger text-white">
    <?php echo $_SESSION["errorMsg"];
        unset($_SESSION["errorMsg"]); ?></label>


<?php
}


if (isset($_SESSION["successMsg"])) {
?>
<label class="col-12 alert bg-primary text-white">
    <?php echo $_SESSION["successMsg"];
        unset($_SESSION["successMsg"]); ?>
</label>

<?php } ?>