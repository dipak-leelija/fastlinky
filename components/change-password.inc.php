<?php
if (isset($_POST['action'])) {
?>

<form class="form-horizontal mt-4" role="form" method="post" autocomplete="off" id="password-form">

    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Password" required>
        <label for="currentPassword" required> Current Password</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Password" required>
        <label for="newPassword" required> Change New Password</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password" required>
        <label for="confirmPassword">Confirm New Password</label>
    </div>

    <div class="d-grid gap-2   d-md-flex col-12 col-md-3 mx-auto my-3">
        <button type="button" id="passUpdate" onclick="changePassword()" class="btn botton-midle btn-primary">Update</button>
    </div>
    <div class="form-group">
    </div>
</form>
<?php
}else {
    echo 'not working';
}
?>