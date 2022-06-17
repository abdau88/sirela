<?php
namespace PHPMaker2019\project1;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$tb_akun_view = new tb_akun_view();

// Run the page
$tb_akun_view->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_akun_view->Page_Render();
?>
<?php include_once "header.php" ?>
<?php if (!$tb_akun->isExport()) { ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "view";
var ftb_akunview = currentForm = new ew.Form("ftb_akunview", "view");

// Form_CustomValidate event
ftb_akunview.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_akunview.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_akunview.lists["x_kode_kategori"] = <?php echo $tb_akun_view->kode_kategori->Lookup->toClientList() ?>;
ftb_akunview.lists["x_kode_kategori"].options = <?php echo JsonEncode($tb_akun_view->kode_kategori->lookupOptions()) ?>;
ftb_akunview.autoSuggests["x_kode_kategori"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<?php if (!$tb_akun->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $tb_akun_view->ExportOptions->render("body") ?>
<?php $tb_akun_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $tb_akun_view->showPageHeader(); ?>
<?php
$tb_akun_view->showMessage();
?>
<form name="ftb_akunview" id="ftb_akunview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_akun_view->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_akun_view->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_akun">
<input type="hidden" name="modal" value="<?php echo (int)$tb_akun_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($tb_akun->kode_akun->Visible) { // kode_akun ?>
	<tr id="r_kode_akun">
		<td class="<?php echo $tb_akun_view->TableLeftColumnClass ?>"><span id="elh_tb_akun_kode_akun"><?php echo $tb_akun->kode_akun->caption() ?></span></td>
		<td data-name="kode_akun"<?php echo $tb_akun->kode_akun->cellAttributes() ?>>
<span id="el_tb_akun_kode_akun">
<span<?php echo $tb_akun->kode_akun->viewAttributes() ?>>
<?php echo $tb_akun->kode_akun->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_akun->uraian->Visible) { // uraian ?>
	<tr id="r_uraian">
		<td class="<?php echo $tb_akun_view->TableLeftColumnClass ?>"><span id="elh_tb_akun_uraian"><?php echo $tb_akun->uraian->caption() ?></span></td>
		<td data-name="uraian"<?php echo $tb_akun->uraian->cellAttributes() ?>>
<span id="el_tb_akun_uraian">
<span<?php echo $tb_akun->uraian->viewAttributes() ?>>
<?php echo $tb_akun->uraian->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($tb_akun->kode_kategori->Visible) { // kode_kategori ?>
	<tr id="r_kode_kategori">
		<td class="<?php echo $tb_akun_view->TableLeftColumnClass ?>"><span id="elh_tb_akun_kode_kategori"><?php echo $tb_akun->kode_kategori->caption() ?></span></td>
		<td data-name="kode_kategori"<?php echo $tb_akun->kode_kategori->cellAttributes() ?>>
<span id="el_tb_akun_kode_kategori">
<span<?php echo $tb_akun->kode_kategori->viewAttributes() ?>>
<?php echo $tb_akun->kode_kategori->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$tb_akun_view->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php if (!$tb_akun->isExport()) { ?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php } ?>
<?php include_once "footer.php" ?>
<?php
$tb_akun_view->terminate();
?>