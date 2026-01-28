<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.hostinger.com'; // Hostinger SMTP
$config['smtp_port'] = 587; // or 465 for SSL
$config['smtp_crypto'] = 'tls'; // or 'ssl' if using port 465
$config['smtp_user'] = 'info@zogglo.se'; // Your Hostinger email
$config['smtp_pass'] = 'maiwandPEROZ1@'; // Your email password
$config['smtp_timeout'] = 30;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['crlf'] = "\r\n";
$config['wordwrap'] = TRUE;
$config['validate'] = TRUE;