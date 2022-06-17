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
$tb_kegiatan_sub2_edit = new tb_kegiatan_sub2_edit();

// Run the page
$tb_kegiatan_sub2_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub2_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_kegiatan_sub2edit = currentForm = new ew.Form("ftb_kegiatan_sub2edit", "edit");

// Validate form
ftb_kegiatan_sub2edit.validate = function() {
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
		<?php if ($tb_kegiatan_sub2_edit->kode_kegiatan_sub2->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub2->kode_kegiatan_sub2->caption(), $tb_kegiatan_sub2->kode_kegiatan_sub2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub2_edit->nama_kegiatan_sub2->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kegiatan_sub2");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub2->nama_kegiatan_sub2->caption(), $tb_kegiatan_sub2->nama_kegiatan_sub2->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub2_edit->kode_kegiatan_sub3->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub3");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub2->kode_kegiatan_sub3->caption(), $tb_kegiatan_sub2->kode_kegiatan_sub3->RequiredErrorMessage)) ?>");
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
ftb_kegiatan_sub2edit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub2edit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatan_sub2edit.lists["x_kode_kegiatan_sub3"] = <?php echo $tb_kegiatan_sub2_edit->kode_kegiatan_sub3->Lookup->toClientList() ?>;
ftb_kegiatan_sub2edit.lists["x_kode_kegiatan_sub3"].options = <?php echo JsonEncode($tb_kegiatan_sub2_edit->kode_kegiatan_sub3->lookupOptions()) ?>;
ftb_kegiatan_sub2edit.autoSuggests["x_kode_kegiatan_sub3"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_sub2_edit->showPageHeader(); ?>
<?php
$tb_kegiatan_sub2_edit->showMessage();
?>
<form name="ftb_kegiatan_sub2edit" id="ftb_kegiatan_sub2edit" class="<?php echo $tb_kegiatan_sub2_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub2_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub2_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub2">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kegiatan_sub2_edit->IsModal ?>">
<?php if ($tb_kegiatan_sub2->getCurrentMasterTable() == "tb_kegiatan_sub3") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="tb_kegiatan_sub3">
<input type="hidden" name="fk_kode_kegiatan_sub3" value="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->getSessionValue() ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub2->Visible) { // kode_kegiatan_sub2 ?>
	<div id="r_kode_kegiatan_sub2" class="form-group row">
		<label id="elh_tb_kegiatan_sub2_kode_kegiatan_sub2" for="x_kode_kegiatan_sub2" class="<?php echo $tb_kegiatan_sub2_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->caption() ?><?php echo ($tb_kegiatan_sub2->kode_kegiatan_sub2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub2_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub2_kode_kegiatan_sub2">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub2->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub2" name="x_kode_kegiatan_sub2" id="x_kode_kegiatan_sub2" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub2->CurrentValue) ?>">
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan_sub2->nama_kegiatan_sub2->Visible) { // nama_kegiatan_sub2 ?>
	<div id="r_nama_kegiatan_sub2" class="form-group row">
		<label id="elh_tb_kegiatan_sub2_nama_kegiatan_sub2" for="x_nama_kegiatan_sub2" class="<?php echo $tb_kegiatan_sub2_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->caption() ?><?php echo ($tb_kegiatan_sub2->nama_kegiatan_sub2->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub2_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub2_nama_kegiatan_sub2">
<input type="text" data-table="tb_kegiatan_sub2" data-field="x_nama_kegiatan_sub2" name="x_nama_kegiatan_sub2" id="x_nama_kegiatan_sub2" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->nama_kegiatan_sub2->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->EditValue ?>"<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->editAttributes() ?>>
</span>
<?php echo $tb_kegiatan_sub2->nama_kegiatan_sub2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->Visible) { // kode_kegiatan_sub3 ?>
	<div id="r_kode_kegiatan_sub3" class="form-group row">
		<label id="elh_tb_kegiatan_sub2_kode_kegiatan_sub3" class="<?php echo $tb_kegiatan_sub2_edit->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->caption() ?><?php echo ($tb_kegiatan_sub2->kode_kegiatan_sub3->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub2_edit->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->cellAttributes() ?>>
<?php if ($tb_kegiatan_sub2->kode_kegiatan_sub3->getSessionValue() <> "") { ?>
<span id="el_tb_kegiatan_sub2_kode_kegiatan_sub3">
<span<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_kode_kegiatan_sub3" name="x_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>">
<?php } else { ?>
<span id="el_tb_kegiatan_sub2_kode_kegiatan_sub3">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan_sub2->kode_kegiatan_sub3->EditAttrs["onchange"] = "";
?>
<span id="as_x_kode_kegiatan_sub3" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_kode_kegiatan_sub3" id="sv_x_kode_kegiatan_sub3" value="<?php echo RemoveHtml($tb_kegiatan_sub2->kode_kegiatan_sub3->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->getPlaceHolder()) ?>"<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub2" data-field="x_kode_kegiatan_sub3" data-value-separator="<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->displayValueSeparatorAttribute() ?>" name="x_kode_kegiatan_sub3" id="x_kode_kegiatan_sub3" value="<?php echo HtmlEncode($tb_kegiatan_sub2->kode_kegiatan_sub3->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatan_sub2edit.createAutoSuggest({"id":"x_kode_kegiatan_sub3","forceSelect":false});
</script>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->Lookup->getParamTag("p_x_kode_kegiatan_sub3") ?>
</span>
<?php } ?>
<?php echo $tb_kegiatan_sub2->kode_kegiatan_sub3->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("tb_kegiatan_sub1", explode(",", $tb_kegiatan_sub2->getCurrentDetailTable())) && $tb_kegiatan_sub1->DetailEdit) {
?>
<?php if ($tb_kegiatan_sub2->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("tb_kegiatan_sub1", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "tb_kegiatan_sub1grid.php" ?>
<?php } ?>
<?php if (!$tb_kegiatan_sub2_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_kegiatan_sub2_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_sub2_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_kegiatan_sub2_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub2_edit->terminate();
?>