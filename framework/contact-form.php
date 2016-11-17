<?php

    $to = $_POST['to']; 
    
    
    $from = $_POST['email']; 
    $name = $_POST['name']; 
    $get_subject = $_POST['subject']; 
    $headers = "From: $from"; 
    $subject = "Subject: $get_subject"; 
 
    $fields = array(); 
    $fields{"name"} = "Name"; 
    $fields{"message"} = "Message";
 
    $body = "Here is what was sent:\n\n"; foreach($fields as $a => $b){   $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); }
 
    $send =  mail($to, $subject, strip_tags($body), $headers);
 
?>