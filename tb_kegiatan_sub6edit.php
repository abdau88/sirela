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
$tb_kegiatan_sub6_edit = new tb_kegiatan_sub6_edit();

// Run the page
$tb_kegiatan_sub6_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub6_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_kegiatan_sub6edit = currentForm = new ew.Form("ftb_kegiatan_sub6edit", "edit");

// Validate form
ftb_kegiatan_sub6edit.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($tb_kegiatan_sub6_edit->kode_kegiatan_sub6->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub6");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub6->kode_kegiatan_sub6->caption(), $tb_kegiatan_sub6->kode_kegiatan_sub6->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub6_edit->nama_kegiatan_sub6->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kegiatan_sub6");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub6->nama_kegiatan_sub6->caption(), $tb_kegiatan_sub6->nama_kegiatan_sub6->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ftb_kegiatan_sub6edit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub6edit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_sub6_edit->showPageHeader(); ?>
<?php
$tb_kegiatan_sub6_edit->showMessage();
?>
<form name="ftb_kegiatan_sub6edit" id="ftb_kegiatan_sub6edit" class="<?php echo $tb_kegiatan_sub6_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub6_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub6_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub6">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kegiatan_sub6_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_kegiatan_sub6->kode_kegiatan_sub6->Visible) { // kode_kegiatan_sub6 ?>
	<div id="r_kode_kegiatan_sub6" class="form-group row">
		<label id="elh_tb_kegiatan_sub6_kode_kegiatan_sub6" for="x_kode_kegiatan_sub6" class="<?php echo $tb_kegiatan_sub6_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->caption() ?><?php echo ($tb_kegiatan_sub6->kode_kegiatan_sub6->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub6_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub6_kode_kegiatan_sub6">
<span<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub6->kode_kegiatan_sub6->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan_sub6" data-field="x_kode_kegiatan_sub6" name="x_kode_kegiatan_sub6" id="x_kode_kegiatan_sub6" value="<?php echo HtmlEncode($tb_kegiatan_sub6->kode_kegiatan_sub6->CurrentValue) ?>">
<?php echo $tb_kegiatan_sub6->kode_kegiatan_sub6->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan_sub6->nama_kegiatan_sub6->Visible) { // nama_kegiatan_sub6 ?>
	<div id="r_nama_kegiatan_sub6" class="form-group row">
		<label id="elh_tb_kegiatan_sub6_nama_kegiatan_sub6" for="x_nama_kegiatan_sub6" class="<?php echo $tb_kegiatan_sub6_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->caption() ?><?php echo ($tb_kegiatan_sub6->nama_kegiatan_sub6->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub6_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub6_nama_kegiatan_sub6">
<input type="text" data-table="tb_kegiatan_sub6" data-field="x_nama_kegiatan_sub6" name="x_nama_kegiatan_sub6" id="x_nama_kegiatan_sub6" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub6->nama_kegiatan_sub6->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->EditValue ?>"<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->editAttributes() ?>>
</span>
<?php echo $tb_kegiatan_sub6->nama_kegiatan_sub6->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("tb_kegiatan_sub5", explode(",", $tb_kegiatan_sub6->getCurrentDetailTable())) && $tb_kegiatan_sub5->DetailEdit) {
?>
<?php if ($tb_kegiatan_sub6->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("tb_kegiatan_sub5", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "tb_kegiatan_sub5grid.php" ?>
<?php } ?>
<?php if (!$tb_kegiatan_sub6_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_kegiatan_sub6_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_sub6_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_kegiatan_sub6_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub6_edit->terminate();
?>