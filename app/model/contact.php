<?php

require LIBS .'contactUs.php';

$contact = new contactUs();


if(isset($_POST['submit'])){


    $send = $contact->send([
        'name'=>$_POST['name'],
        'subject'=>$_POST['subject'],
        'email'=>$_POST['email'],
        'message'=>$_POST['message']
    ]);

?>
<script>
    <?php
    // show errors if there's one
    if(!$send){
        foreach ($contact->Errors as $error){
            echo 'toastr.error("' . $error . '");' . "\n";
        }
        // show success message
    }else{
        echo 'toastr.success("merci votre email a été envoyer !!");' . "\n";
    }
}
?>
</script>