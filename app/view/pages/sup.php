<?php
requireAll([

    LIBS . "Required",

]);
$required = new Required();
if(!$required->login()):

?>
<div class="container p-4 mt-4">

    <!-- Material form login -->
    <form method="post" class="mt-4">
        <p class="h4 text-center mb-4">Sign in</p>

        <!-- Material input email -->
        <div class="md-form">
            <i class="fa fa-envelope prefix grey-text"></i>
            <input type="email" name="email" id="materialFormLoginEmailEx" class="form-control">
            <label for="materialFormLoginEmailEx">Your email</label>
        </div>

        <!-- Material input password -->
        <div class="md-form">
            <i class="fa fa-lock prefix grey-text"></i>
            <input type="password" name="password" id="materialFormLoginPasswordEx" class="form-control">
            <label for="materialFormLoginPasswordEx">Your password</label>
        </div>

        <div class="text-center mt-4">
            <input class="btn btn-default" name="submit" type="submit" value="Sup">
        </div>
    </form>
    <!-- Material form login -->

</div>
<?php
else:
?>
<div class="m-auto text-center p-5 mt-5">
    <a class="btn btn-danger mt-5" href="logout">Logout</a>
    <?php if($required->admin()):?>
        <a href='adminCP' class='btn btn-primary mt-5'>Dashboard</a>
    <?php endif; ?>
</div>
<?php endif; ?>