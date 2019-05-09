<?php




requireAll([

    LIBS ."User",
    LIBS ."fetch",
    LIBS . "Required",

]);

$user = new User();
$fetch = new fetch();
$required = new Required();

if(isset($_POST['submit'])):

    $sin = $user->signIn($_POST['email'],$_POST['password']);
    if($sin):

        $fetch->User($_POST['email'],$_POST['email']);
        $_SESSION['login'] = true;
        $_SESSION['user'] = $fetch->data->userName;

        if(!empty($fetch->data->admin)):
            $_SESSION['admin'] = $fetch->data->admin;
        endif;

    endif;

endif;
?>
<script>

<?php
if (!$sin):

    foreach ($user->Errors as $error) {

        echo 'toastr.error("' . $error . '");' . "\n";

    }

else:

    echo 'toastr.success("you login with success");' . "\n";


?>
</script>
<meta http-equiv="refresh" content="2">
<?php endif; ?>