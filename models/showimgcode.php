<?php
session_start();
include '../inc/imgcode.class.php';
$imgcode_mode=new Helper_ImgCode();
$imgcode=$imgcode_mode->create();