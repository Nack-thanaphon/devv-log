<?php
if (isset($_SESSION['message'])) {
?>
<label class="col-12 alert bg-danger text-white"><?= $_SESSION['message']; ?></label>

<?php
    // header("Refresh:5");
    unset($_SESSION['message']);
} ?>



<?php

if (isset($_SESSION["errorMsg"])) {
?>
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $_SESSION["errorMsg"];
                unset($_SESSION["errorMsg"]); ?></strong>
</div>


<?php
}


if (isset($_SESSION["successMsg"])) {
?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $_SESSION["successMsg"];
                unset($_SESSION["successMsg"]); ?></strong>
</div>
<?php
}
?>


<?php

if (isset($_SESSION["updateMsg"])) {
?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong><?php echo $_SESSION["updateMsg"];
                unset($_SESSION["updateMsg"]); ?></strong>
</div>
<?php
}
?>