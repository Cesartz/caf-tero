<?php defined('BASEPATH') OR exit('No direct script access allowed.');

$config['useragent']        = 'Codeigniter';
$config['protocol']         = 'mail';

$config['smtp_host']        = 'smtp.dreamhost.com';
$config['smtp_user']        = 'no-reply@gonzalezsalum.mx';
$config['smtp_pass']        = 'Contadores88!';

$config['smtp_port']        = 465;
$config['smtp_timeout']     = 3;
$config['smtp_crypto']      = 'ssl';//'tls'
$config['smtp_debug']       = 0;
$config['wordwrap']         = TRUE;
$config['wrapchars']        = 76;
$config['mailtype']         = 'html';
$config['charset']          = 'utf-8';
$config['validate']         = TRUE;
$config['crlf']             = "\r\n";
$config['newline']          = "\r\n";
$config['bcc_batch_mode']   = false;
$config['bcc_batch_size']   = 200;