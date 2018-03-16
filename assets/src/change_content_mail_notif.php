<?php
$db ;
extract($_GET);
$reqsel_mail_content_notif = $db->prepare("select * from mail_notification_template where type = :type");

$stm->bindParam(':type',$type);
$stm->execute();
$row = $stm->fetch();
echo $row[0];


?>