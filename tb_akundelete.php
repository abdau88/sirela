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
$tb_akun_delete = new tb_akun_delete();

// Run the page
$tb_akun_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_akun_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_akundelete = currentForm = new ew.Form("ftb_akundelete", "delete");

// Form_CustomValidate event
ftb_akundelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_akundelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_akundelete.lists["x_kode_kategori"] = <?php echo $tb_akun_delete->kode_kategori->Lookup->toClientList() ?>;
ftb_akundelete.lists["x_kode_kategori"].options = <?php echo JsonEncode($tb_akun_delete->kode_kategori->lookupOptions()) ?>;
ftb_akundelete.autoSuggests["x_kode_kategori"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_akun_delete->showPageHeader(); ?>
<?php
$tb_akun_delete->showMessage();
?>
<form name="ftb_akundelete" id="ftb_akundelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_akun_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_akun_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_akun">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_akun_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_akun->kode_akun->Visible) { // kode_akun ?>
		<th class="<?php echo $tb_akun->kode_akun->headerCellClass() ?>"><span id="elh_tb_akun_kode_akun" class="tb_akun_kode_akun"><?php echo $tb_akun->kode_akun->caption() ?></span></th>
<?php } ?>
<?php if ($tb_akun->uraian->Visible) { // uraian ?>
		<th class="<?php echo $tb_akun->uraian->headerCellClass() ?>"><span id="elh_tb_akun_uraian" class="tb_akun_uraian"><?php echo $tb_akun->uraian->caption() ?></span></th>
<?php } ?>
<?php if ($tb_akun->kode_kategori->Visible) { // kode_kategori ?>
		<th class="<?php echo $tb_akun->kode_kategori->headerCellClass() ?>"><span id="elh_tb_akun_kode_kategori" class="tb_akun_kode_kategori"><?php echo $tb_akun->kode_kategori->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_akun_delete->RecCnt = 0;
$i = 0;
while (!$tb_akun_delete->Recordset->EOF) {
	$tb_akun_delete->RecCnt++;
	$tb_akun_delete->RowCnt++;

	// Set row properties
	$tb_akun->resetAttributes();
	$tb_akun->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_akun_delete->loadRowValues($tb_akun_delete->Recordset);

	// Render row
	$tb_akun_delete->renderRow();
?>
	<tr<?php echo $tb_akun->rowAttributes() ?>>
<?php if ($tb_akun->kode_akun->Visible) { // kode_akun ?>
		<td<?php echo $tb_akun->kode_akun->cellAttributes() ?>>
<span id="el<?php echo $tb_akun_delete->RowCnt ?>_tb_akun_kode_akun" class="tb_akun_kode_akun">
<span<?php echo $tb_akun->kode_akun->viewAttributes() ?>>
<?php echo $tb_akun->kode_akun->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_akun->uraian->Visible) { // uraian ?>
		<td<?php echo $tb_akun->uraian->cellAttributes() ?>>
<span id="el<?php echo $tb_akun_delete->RowCnt ?>_tb_akun_uraian" class="tb_akun_uraian">
<span<?php echo $tb_akun->uraian->viewAttributes() ?>>
<?php echo $tb_akun->uraian->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_akun->kode_kategori->Visible) { // kode_kategori ?>
		<td<?php echo $tb_akun->kode_kategori->cellAttributes() ?>>
<span id="el<?php echo $tb_akun_delete->RowCnt ?>_tb_akun_kode_kategori" class="tb_akun_kode_kategori">
<span<?php echo $tb_akun->kode_kategori->viewAttributes() ?>>
<?php echo $tb_akun->kode_kategori->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_akun_delete->Recordset->moveNext();
}
$tb_akun_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_akun_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_akun_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_akun_delete->terminate();
?>