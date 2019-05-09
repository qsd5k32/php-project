<?php

if(isset($_SESSION['login'])) header('Location:account');

requireAll([
    LIBS ."Porter",
]);


$porter = new Porter();


if(isset($_POST['submit'])) {

    $files = $_POST['files'] ?? 0;
    $dev = $_POST['dev'] ?? 0;
    $accompa = $_POST['accompa'] ?? 0;
    $coach = $_POST['coach'] ?? 0;
    $formation = $_POST['formation'] ?? 0;
    $host = $_POST['host'] ?? 0;
    $sin = $porter->signUp([
        'name'=> $_POST['name'],
        'idea'=> $_POST['idea'],
        'phone'=> $_POST['phone'],
        'email'=> $_POST['email'],
        'host' => $host,
        'files' => $files,
        'dev' => $dev,
        'accompa' => $accompa,
        'coach' => $coach,
        'formation' => $formation,
    ]);
?>

<script>

<?php
if (!$sin) {

    foreach ($porter->Errors as $error) {
        echo 'toastr.error("' . $error . '");' . "\n";
    }

}else{
    echo 'toastr.success("you registred with success");' . "\n";
}
}

?>

</script>
