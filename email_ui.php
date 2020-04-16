<?php

$to = "chairulrizki17@gmail.com";
    $from = "someoneelse@email.com";
    $name = "Jamal Ganteng";
    $subject = "We are number one";
    $number = "123";
    $cmessage = "FUCEK BUAT KAMU RISKI!!!!";

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Subscribe inquiry from ".$from;

    $logo = 'img/logo.png';
    $link = '#';
$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title><link rel='stylesheet' href='css/bootstrap.min.css'>
    <link rel='stylesheet' href='css/owl.carousel.min.css'>
    <link rel='stylesheet' href='css/magnific-popup.css'>
    <link rel='stylesheet' href='css/font-awesome.min.css'>
    <link rel='stylesheet' href='css/themify-icons.css'>
    <link rel='stylesheet' href='css/nice-select.css'>
    <link rel='stylesheet' href='css/flaticon.css'>
    <link rel='stylesheet' href='css/gijgo.css'>
    <link rel='stylesheet' href='css/animate.min.css'>
    <link rel='stylesheet' href='css/slicknav.css'>
    <link rel='stylesheet' href='css/style.css'></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$subject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";
	echo $body;
?>