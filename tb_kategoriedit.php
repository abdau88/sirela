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
$tb_kategori_edit = new tb_kategori_edit();

// Run the page
$tb_kategori_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kategori_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_kategoriedit = currentForm = new ew.Form("ftb_kategoriedit", "edit");

// Validate form
ftb_kategoriedit.validate = function() {
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
		<?php if ($tb_kategori_edit->kode_kategori->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kategori");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kategori->kode_kategori->caption(), $tb_kategori->kode_kategori->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kategori_edit->nama_kategori->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kategori");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kategori->nama_kategori->caption(), $tb_kategori->nama_kategori->RequiredErrorMessage)) ?>");
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
ftb_kategoriedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kategoriedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kategori_edit->showPageHeader(); ?>
<?php
$tb_kategori_edit->showMessage();
?>
<form name="ftb_kategoriedit" id="ftb_kategoriedit" class="<?php echo $tb_kategori_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kategori_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kategori_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kategori">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kategori_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_kategori->kode_kategori->Visible) { // kode_kategori ?>
	<div id="r_kode_kategori" class="form-group row">
		<label id="elh_tb_kategori_kode_kategori" for="x_kode_kategori" class="<?php echo $tb_kategori_edit->LeftColumnClass ?>"><?php echo $tb_kategori->kode_kategori->caption() ?><?php echo ($tb_kategori->kode_kategori->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kategori_edit->RightColumnClass ?>"><div<?php echo $tb_kategori->kode_kategori->cellAttributes() ?>>
<span id="el_tb_kategori_kode_kategori">
<span<?php echo $tb_kategori->kode_kategori->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kategori->kode_kategori->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kategori" data-field="x_kode_kategori" name="x_kode_kategori" id="x_kode_kategori" value="<?php echo HtmlEncode($tb_kategori->kode_kategori->CurrentValue) ?>">
<?php echo $tb_kategori->kode_kategori->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kategori->nama_kategori->Visible) { // nama_kategori ?>
	<div id="r_nama_kategori" class="form-group row">
		<label id="elh_tb_kategori_nama_kategori" for="x_nama_kategori" class="<?php echo $tb_kategori_edit->LeftColumnClass ?>"><?php echo $tb_kategori->nama_kategori->caption() ?><?php echo ($tb_kategori->nama_kategori->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kategori_edit->RightColumnClass ?>"><div<?php echo $tb_kategori->nama_kategori->cellAttributes() ?>>
<span id="el_tb_kategori_nama_kategori">
<input type="text" data-table="tb_kategori" data-field="x_nama_kategori" name="x_nama_kategori" id="x_nama_kategori" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($tb_kategori->nama_kategori->getPlaceHolder()) ?>" value="<?php echo $tb_kategori->nama_kategori->EditValue ?>"<?php echo $tb_kategori->nama_kategori->editAttributes() ?>>
</span>
<?php echo $tb_kategori->nama_kategori->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_kategori_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_kategori_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kategori_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_kategori_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kategori_edit->terminate();
?>