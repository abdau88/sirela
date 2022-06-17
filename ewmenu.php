<?php
namespace PHPMaker2019\project1;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(3, "mi_tb_realisasi", $MenuLanguage->MenuPhrase("3", "MenuText"), "tb_realisasilist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(6, "mi_tb_kegiatan", $MenuLanguage->MenuPhrase("6", "MenuText"), "tb_kegiatanlist.php?cmd=resetall", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(7, "mi_tb_kegiatan_sub1", $MenuLanguage->MenuPhrase("7", "MenuText"), "tb_kegiatan_sub1list.php?cmd=resetall", 6, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(8, "mi_tb_kegiatan_sub2", $MenuLanguage->MenuPhrase("8", "MenuText"), "tb_kegiatan_sub2list.php?cmd=resetall", 6, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(9, "mi_tb_kegiatan_sub4", $MenuLanguage->MenuPhrase("9", "MenuText"), "tb_kegiatan_sub4list.php?cmd=resetall", 6, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(10, "mi_tb_kegiatan_sub3", $MenuLanguage->MenuPhrase("10", "MenuText"), "tb_kegiatan_sub3list.php?cmd=resetall", 6, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(11, "mi_tb_kegiatan_sub5", $MenuLanguage->MenuPhrase("11", "MenuText"), "tb_kegiatan_sub5list.php?cmd=resetall", 6, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(12, "mi_tb_kegiatan_sub6", $MenuLanguage->MenuPhrase("12", "MenuText"), "tb_kegiatan_sub6list.php", 6, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(16, "mci_Laporan", $MenuLanguage->MenuPhrase("16", "MenuText"), "", -1, "", TRUE, FALSE, TRUE, "", "", FALSE);
$sideMenu->addMenuItem(13, "mi_v_realisasi", $MenuLanguage->MenuPhrase("13", "MenuText"), "v_realisasilist.php", 16, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(18, "mi_v_revisi_anggaran", $MenuLanguage->MenuPhrase("18", "MenuText"), "v_revisi_anggaranlist.php", 16, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(4, "mi_tb_unit", $MenuLanguage->MenuPhrase("4", "MenuText"), "tb_unitlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(5, "mi_tb_user", $MenuLanguage->MenuPhrase("5", "MenuText"), "tb_userlist.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>