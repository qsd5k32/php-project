<?php require_once VIEW."/components/head.php" ?>
<body class="fixed-sn black-skin">

<!--Double navigation-->
<?php require_once VIEW . "/pages/adminCP/header.php" ?>
<!--/.Double navigation-->

<!--Main layout-->
<main>

    <?php
    error_reporting(1);
    $page = $_GET["page"] ?? "index";
    switch ($page){
        case "index":
            renderCompo("index");
        break;
        case "setPost":
            renderCompo("setPost");
        break;
        case "editPost":
            renderCompo("editPost");
            break;
        case "removePost":
            renderCompo("removePost");
            break;
        case "events":
            renderCompo("events");
            break;
        case "editEvent":
            renderCompo("editEvent");
            break;
        case "newBio":
            renderCompo("newBio");
            break;
        case "editBio":
            renderCompo("editBio");
            break;
        case "newAgenda":
            renderCompo("newAgenda");
            break;
        case "editAgenda":
            renderCompo("editAgenda");
            break;
        case "newFich":
            renderCompo("newFich");
            break;
        case "editFich":
            renderCompo("editFich");
            break;
        default:
            renderCompo("index");
    }
    ?>

</main>
<!--/Main layout-->
<?php require_once VIEW."/components/footer.php";?>
<!--Footer-->
<script>

    // SideNav Initialization
    $(".button-collapse").sideNav();

    new WOW().init();

</script>
<div class="drag-target" style="left: 0px; touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>


<div class="hiddendiv common"></div>
