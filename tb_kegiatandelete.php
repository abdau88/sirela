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
$tb_kegiatan_delete = new tb_kegiatan_delete();

// Run the page
$tb_kegiatan_delete->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var ftb_kegiatandelete = currentForm = new ew.Form("ftb_kegiatandelete", "delete");

// Form_CustomValidate event
ftb_kegiatandelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatandelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatandelete.lists["x_kode_kegiatan_sub1"] = <?php echo $tb_kegiatan_delete->kode_kegiatan_sub1->Lookup->toClientList() ?>;
ftb_kegiatandelete.lists["x_kode_kegiatan_sub1"].options = <?php echo JsonEncode($tb_kegiatan_delete->kode_kegiatan_sub1->lookupOptions()) ?>;
ftb_kegiatandelete.autoSuggests["x_kode_kegiatan_sub1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_delete->showPageHeader(); ?>
<?php
$tb_kegiatan_delete->showMessage();
?>
<form name="ftb_kegiatandelete" id="ftb_kegiatandelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($tb_kegiatan_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
		<th class="<?php echo $tb_kegiatan->kode_kegiatan->headerCellClass() ?>"><span id="elh_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
		<th class="<?php echo $tb_kegiatan->nama_kegiatan->headerCellClass() ?>"><span id="elh_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?></span></th>
<?php } ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<th class="<?php echo $tb_kegiatan->kode_kegiatan_sub1->headerCellClass() ?>"><span id="elh_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$tb_kegiatan_delete->RecCnt = 0;
$i = 0;
while (!$tb_kegiatan_delete->Recordset->EOF) {
	$tb_kegiatan_delete->RecCnt++;
	$tb_kegiatan_delete->RowCnt++;

	// Set row properties
	$tb_kegiatan->resetAttributes();
	$tb_kegiatan->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$tb_kegiatan_delete->loadRowValues($tb_kegiatan_delete->Recordset);

	// Render row
	$tb_kegiatan_delete->renderRow();
?>
	<tr<?php echo $tb_kegiatan->rowAttributes() ?>>
<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
		<td<?php echo $tb_kegiatan->kode_kegiatan->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_delete->RowCnt ?>_tb_kegiatan_kode_kegiatan" class="tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
		<td<?php echo $tb_kegiatan->nama_kegiatan->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_delete->RowCnt ?>_tb_kegiatan_nama_kegiatan" class="tb_kegiatan_nama_kegiatan">
<span<?php echo $tb_kegiatan->nama_kegiatan->viewAttributes() ?>>
<?php echo $tb_kegiatan->nama_kegiatan->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
		<td<?php echo $tb_kegiatan->kode_kegiatan_sub1->cellAttributes() ?>>
<span id="el<?php echo $tb_kegiatan_delete->RowCnt ?>_tb_kegiatan_kode_kegiatan_sub1" class="tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$tb_kegiatan_delete->Recordset->moveNext();
}
$tb_kegiatan_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$tb_kegiatan_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_delete->terminate();
?>