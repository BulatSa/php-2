<?php
	// ����������� ���������
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	$id = $_GET['id']; // ID ������������ ������
	add2Basket($id);
	header('Location: catalog.php');

