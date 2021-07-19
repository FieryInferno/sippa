<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['libraries']  = array('database','cart','session','form_validation','pagination', 'upload', 'email');
$autoload['drivers']    = array();
$autoload['helper']     = array('file','url','form', 'pasar_helper');
$autoload['config']     = array();
$autoload['language']   = array();
$autoload['model']      = array('M_login','Modelpedagang', 'ModelDaftar', 'ModelPasar', 'ModelRetribusi');
