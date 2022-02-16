<?php
if (isset($_SESSION['message'])) {
?>
<label class="col-12 alert bg-danger text-white"><?= $_SESSION['message']; ?></label>

<?php
    header("Refresh:5");
    unset($_SESSION['message']);
} ?>