<?php

    include("classes/Template.php"); 

    $feedback = new Template("layouts/feedback.tpl");

    $explore = new Template("layouts/template/_explore.tpl");

    $footer = new Template("layouts/template/_footer.tpl");

    $scripts = new Template("layouts/template/_scripts.tpl");

    $layout = new Template("layouts/template/_Layout.tpl");

    $layout->set("title", "Feedback");

    $layout->set("content", $feedback->output());
    $layout->set("explore", $explore->output());
    $layout->set("footer", $footer->output());
    $layout->set("scripts", $scripts->output());

    echo $layout->output();

?>

