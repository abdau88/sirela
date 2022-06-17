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
$tb_kegiatan_edit = new tb_kegiatan_edit();

// Run the page
$tb_kegiatan_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_kegiatanedit = currentForm = new ew.Form("ftb_kegiatanedit", "edit");

// Validate form
ftb_kegiatanedit.validate = function() {
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
		<?php if ($tb_kegiatan_edit->kode_kegiatan->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan->kode_kegiatan->caption(), $tb_kegiatan->kode_kegiatan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_edit->nama_kegiatan->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kegiatan");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan->nama_kegiatan->caption(), $tb_kegiatan->nama_kegiatan->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_edit->kode_kegiatan_sub1->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub1");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan->kode_kegiatan_sub1->caption(), $tb_kegiatan->kode_kegiatan_sub1->RequiredErrorMessage)) ?>");
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
ftb_kegiatanedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatanedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatanedit.lists["x_kode_kegiatan_sub1"] = <?php echo $tb_kegiatan_edit->kode_kegiatan_sub1->Lookup->toClientList() ?>;
ftb_kegiatanedit.lists["x_kode_kegiatan_sub1"].options = <?php echo JsonEncode($tb_kegiatan_edit->kode_kegiatan_sub1->lookupOptions()) ?>;
ftb_kegiatanedit.autoSuggests["x_kode_kegiatan_sub1"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_edit->showPageHeader(); ?>
<?php
$tb_kegiatan_edit->showMessage();
?>
<form name="ftb_kegiatanedit" id="ftb_kegiatanedit" class="<?php echo $tb_kegiatan_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kegiatan_edit->IsModal ?>">
<?php if ($tb_kegiatan->getCurrentMasterTable() == "tb_kegiatan_sub1") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="tb_kegiatan_sub1">
<input type="hidden" name="fk_kode_kegiatan_sub1" value="<?php echo $tb_kegiatan->kode_kegiatan_sub1->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_kegiatan->kode_kegiatan->Visible) { // kode_kegiatan ?>
	<div id="r_kode_kegiatan" class="form-group row">
		<label id="elh_tb_kegiatan_kode_kegiatan" for="x_kode_kegiatan" class="<?php echo $tb_kegiatan_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan->kode_kegiatan->caption() ?><?php echo ($tb_kegiatan->kode_kegiatan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan->kode_kegiatan->cellAttributes() ?>>
<span id="el_tb_kegiatan_kode_kegiatan">
<span<?php echo $tb_kegiatan->kode_kegiatan->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan" name="x_kode_kegiatan" id="x_kode_kegiatan" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan->CurrentValue) ?>">
<?php echo $tb_kegiatan->kode_kegiatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan->nama_kegiatan->Visible) { // nama_kegiatan ?>
	<div id="r_nama_kegiatan" class="form-group row">
		<label id="elh_tb_kegiatan_nama_kegiatan" for="x_nama_kegiatan" class="<?php echo $tb_kegiatan_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan->nama_kegiatan->caption() ?><?php echo ($tb_kegiatan->nama_kegiatan->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan->nama_kegiatan->cellAttributes() ?>>
<span id="el_tb_kegiatan_nama_kegiatan">
<input type="text" data-table="tb_kegiatan" data-field="x_nama_kegiatan" name="x_nama_kegiatan" id="x_nama_kegiatan" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan->nama_kegiatan->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan->nama_kegiatan->EditValue ?>"<?php echo $tb_kegiatan->nama_kegiatan->editAttributes() ?>>
</span>
<?php echo $tb_kegiatan->nama_kegiatan->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->Visible) { // kode_kegiatan_sub1 ?>
	<div id="r_kode_kegiatan_sub1" class="form-group row">
		<label id="elh_tb_kegiatan_kode_kegiatan_sub1" class="<?php echo $tb_kegiatan_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan->kode_kegiatan_sub1->caption() ?><?php echo ($tb_kegiatan->kode_kegiatan_sub1->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan->kode_kegiatan_sub1->cellAttributes() ?>>
<?php if ($tb_kegiatan->kode_kegiatan_sub1->getSessionValue() <> "") { ?>
<span id="el_tb_kegiatan_kode_kegiatan_sub1">
<span<?php echo $tb_kegiatan->kode_kegiatan_sub1->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_kode_kegiatan_sub1" name="x_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>">
<?php } else { ?>
<span id="el_tb_kegiatan_kode_kegiatan_sub1">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan->kode_kegiatan_sub1->EditAttrs["onchange"] = "";
?>
<span id="as_x_kode_kegiatan_sub1" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_kode_kegiatan_sub1" id="sv_x_kode_kegiatan_sub1" value="<?php echo RemoveHtml($tb_kegiatan->kode_kegiatan_sub1->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->getPlaceHolder()) ?>"<?php echo $tb_kegiatan->kode_kegiatan_sub1->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan" data-field="x_kode_kegiatan_sub1" data-value-separator="<?php echo $tb_kegiatan->kode_kegiatan_sub1->displayValueSeparatorAttribute() ?>" name="x_kode_kegiatan_sub1" id="x_kode_kegiatan_sub1" value="<?php echo HtmlEncode($tb_kegiatan->kode_kegiatan_sub1->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatanedit.createAutoSuggest({"id":"x_kode_kegiatan_sub1","forceSelect":false});
</script>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->Lookup->getParamTag("p_x_kode_kegiatan_sub1") ?>
</span>
<?php } ?>
<?php echo $tb_kegiatan->kode_kegiatan_sub1->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_kegiatan_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_kegiatan_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_kegiatan_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_edit->terminate();
?>