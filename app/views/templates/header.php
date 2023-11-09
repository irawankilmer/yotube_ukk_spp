<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>UKK SPP 2023 - <?= getTitle(); ?></title>
</head>
<body>
	<a href="<?= urlTo('/'); ?>">Home</a> | 

	<?php if ($_SESSION['level'] === 'Admin'): ?>
		<a href="<?= urlTo('/spp'); ?>">Spp</a> | 
		<a href="<?= urlTo('/kelas'); ?>">Kelas</a> | 
		<a href="<?= urlTo('/siswa'); ?>">Siswa</a> | 
		<a href="<?= urlTo('/petugas'); ?>">Petugas</a> | 
	<?php endif ?>

	<?php if ($_SESSION['level'] === 'Admin' || $_SESSION['level'] === 'Petugas' ): ?>
		<a href="<?= urlTo('/pembayaran'); ?>">Pembayaran</a> | 
	<?php endif ?>
	
	<a href="<?= urlTo('/profil'); ?>">Profil</a> | 
	<a href="<?= urlTo('/login/logout'); ?>">Logout</a>