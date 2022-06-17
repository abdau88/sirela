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
$tb_realisasi_edit = new tb_realisasi_edit();

// Run the page
$tb_realisasi_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_realisasi_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_realisasiedit = currentForm = new ew.Form("ftb_realisasiedit", "edit");

// Validate form
ftb_realisasiedit.validate = function() {
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
		<?php if ($tb_realisasi_edit->kode_realisasi->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_realisasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_realisasi->kode_realisasi->caption(), $tb_realisasi->kode_realisasi->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_realisasi_edit->kode_unit->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_realisasi->kode_unit->caption(), $tb_realisasi->kode_unit->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_kode_unit");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($tb_realisasi->kode_unit->errorMessage()) ?>");
		<?php if ($tb_realisasi_edit->kode_akun->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_akun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_realisasi->kode_akun->caption(), $tb_realisasi->kode_akun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_realisasi_edit->tahun->Required) { ?>
			elm = this.getElements("x" + infix + "_tahun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_realisasi->tahun->caption(), $tb_realisasi->tahun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_realisasi_edit->pagu->Required) { ?>
			elm = this.getElements("x" + infix + "_pagu");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_realisasi->pagu->caption(), $tb_realisasi->pagu->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_pagu");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($tb_realisasi->pagu->errorMessage()) ?>");
		<?php if ($tb_realisasi_edit->realisasi->Required) { ?>
			elm = this.getElements("x" + infix + "_realisasi");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_realisasi->realisasi->caption(), $tb_realisasi->realisasi->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_realisasi");
			if (elm && !ew.checkInteger(elm.value))
				return this.onError(elm, "<?php echo JsEncode($tb_realisasi->realisasi->errorMessage()) ?>");

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
ftb_realisasiedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_realisasiedit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_realisasiedit.lists["x_kode_unit"] = <?php echo $tb_realisasi_edit->kode_unit->Lookup->toClientList() ?>;
ftb_realisasiedit.lists["x_kode_unit"].options = <?php echo JsonEncode($tb_realisasi_edit->kode_unit->lookupOptions()) ?>;
ftb_realisasiedit.autoSuggests["x_kode_unit"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasiedit.lists["x_kode_akun"] = <?php echo $tb_realisasi_edit->kode_akun->Lookup->toClientList() ?>;
ftb_realisasiedit.lists["x_kode_akun"].options = <?php echo JsonEncode($tb_realisasi_edit->kode_akun->lookupOptions()) ?>;
ftb_realisasiedit.autoSuggests["x_kode_akun"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
ftb_realisasiedit.lists["x_tahun"] = <?php echo $tb_realisasi_edit->tahun->Lookup->toClientList() ?>;
ftb_realisasiedit.lists["x_tahun"].options = <?php echo JsonEncode($tb_realisasi_edit->tahun->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_realisasi_edit->showPageHeader(); ?>
<?php
$tb_realisasi_edit->showMessage();
?>
<form name="ftb_realisasiedit" id="ftb_realisasiedit" class="<?php echo $tb_realisasi_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_realisasi_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_realisasi_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_realisasi">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_realisasi_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_realisasi->kode_realisasi->Visible) { // kode_realisasi ?>
	<div id="r_kode_realisasi" class="form-group row">
		<label id="elh_tb_realisasi_kode_realisasi" class="<?php echo $tb_realisasi_edit->LeftColumnClass ?>"><?php echo $tb_realisasi->kode_realisasi->caption() ?><?php echo ($tb_realisasi->kode_realisasi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_realisasi_edit->RightColumnClass ?>"><div<?php echo $tb_realisasi->kode_realisasi->cellAttributes() ?>>
<span id="el_tb_realisasi_kode_realisasi">
<span<?php echo $tb_realisasi->kode_realisasi->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_realisasi->kode_realisasi->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_realisasi" data-field="x_kode_realisasi" name="x_kode_realisasi" id="x_kode_realisasi" value="<?php echo HtmlEncode($tb_realisasi->kode_realisasi->CurrentValue) ?>">
<?php echo $tb_realisasi->kode_realisasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_realisasi->kode_unit->Visible) { // kode_unit ?>
	<div id="r_kode_unit" class="form-group row">
		<label id="elh_tb_realisasi_kode_unit" class="<?php echo $tb_realisasi_edit->LeftColumnClass ?>"><?php echo $tb_realisasi->kode_unit->caption() ?><?php echo ($tb_realisasi->kode_unit->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_realisasi_edit->RightColumnClass ?>"><div<?php echo $tb_realisasi->kode_unit->cellAttributes() ?>>
<span id="el_tb_realisasi_kode_unit">
<?php
$wrkonchange = "" . trim(@$tb_realisasi->kode_unit->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_realisasi->kode_unit->EditAttrs["onchange"] = "";
?>
<span id="as_x_kode_unit" class="text-nowrap" style="z-index: 8980">
	<input type="text" class="form-control" name="sv_x_kode_unit" id="sv_x_kode_unit" value="<?php echo RemoveHtml($tb_realisasi->kode_unit->EditValue) ?>" size="30" placeholder="<?php echo HtmlEncode($tb_realisasi->kode_unit->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_realisasi->kode_unit->getPlaceHolder()) ?>"<?php echo $tb_realisasi->kode_unit->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_realisasi" data-field="x_kode_unit" data-value-separator="<?php echo $tb_realisasi->kode_unit->displayValueSeparatorAttribute() ?>" name="x_kode_unit" id="x_kode_unit" value="<?php echo HtmlEncode($tb_realisasi->kode_unit->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_realisasiedit.createAutoSuggest({"id":"x_kode_unit","forceSelect":false});
</script>
<?php echo $tb_realisasi->kode_unit->Lookup->getParamTag("p_x_kode_unit") ?>
</span>
<?php echo $tb_realisasi->kode_unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_realisasi->kode_akun->Visible) { // kode_akun ?>
	<div id="r_kode_akun" class="form-group row">
		<label id="elh_tb_realisasi_kode_akun" class="<?php echo $tb_realisasi_edit->LeftColumnClass ?>"><?php echo $tb_realisasi->kode_akun->caption() ?><?php echo ($tb_realisasi->kode_akun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_realisasi_edit->RightColumnClass ?>"><div<?php echo $tb_realisasi->kode_akun->cellAttributes() ?>>
<span id="el_tb_realisasi_kode_akun">
<?php
$wrkonchange = "" . trim(@$tb_realisasi->kode_akun->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_realisasi->kode_akun->EditAttrs["onchange"] = "";
?>
<span id="as_x_kode_akun" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_kode_akun" id="sv_x_kode_akun" value="<?php echo RemoveHtml($tb_realisasi->kode_akun->EditValue) ?>" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($tb_realisasi->kode_akun->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_realisasi->kode_akun->getPlaceHolder()) ?>"<?php echo $tb_realisasi->kode_akun->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_realisasi" data-field="x_kode_akun" data-value-separator="<?php echo $tb_realisasi->kode_akun->displayValueSeparatorAttribute() ?>" name="x_kode_akun" id="x_kode_akun" value="<?php echo HtmlEncode($tb_realisasi->kode_akun->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_realisasiedit.createAutoSuggest({"id":"x_kode_akun","forceSelect":false});
</script>
<?php echo $tb_realisasi->kode_akun->Lookup->getParamTag("p_x_kode_akun") ?>
</span>
<?php echo $tb_realisasi->kode_akun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_realisasi->tahun->Visible) { // tahun ?>
	<div id="r_tahun" class="form-group row">
		<label id="elh_tb_realisasi_tahun" for="x_tahun" class="<?php echo $tb_realisasi_edit->LeftColumnClass ?>"><?php echo $tb_realisasi->tahun->caption() ?><?php echo ($tb_realisasi->tahun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_realisasi_edit->RightColumnClass ?>"><div<?php echo $tb_realisasi->tahun->cellAttributes() ?>>
<span id="el_tb_realisasi_tahun">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tb_realisasi" data-field="x_tahun" data-value-separator="<?php echo $tb_realisasi->tahun->displayValueSeparatorAttribute() ?>" id="x_tahun" name="x_tahun"<?php echo $tb_realisasi->tahun->editAttributes() ?>>
		<?php echo $tb_realisasi->tahun->selectOptionListHtml("x_tahun") ?>
	</select>
</div>
</span>
<?php echo $tb_realisasi->tahun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_realisasi->pagu->Visible) { // pagu ?>
	<div id="r_pagu" class="form-group row">
		<label id="elh_tb_realisasi_pagu" for="x_pagu" class="<?php echo $tb_realisasi_edit->LeftColumnClass ?>"><?php echo $tb_realisasi->pagu->caption() ?><?php echo ($tb_realisasi->pagu->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_realisasi_edit->RightColumnClass ?>"><div<?php echo $tb_realisasi->pagu->cellAttributes() ?>>
<span id="el_tb_realisasi_pagu">
<input type="text" data-table="tb_realisasi" data-field="x_pagu" name="x_pagu" id="x_pagu" size="30" placeholder="<?php echo HtmlEncode($tb_realisasi->pagu->getPlaceHolder()) ?>" value="<?php echo $tb_realisasi->pagu->EditValue ?>"<?php echo $tb_realisasi->pagu->editAttributes() ?>>
</span>
<?php echo $tb_realisasi->pagu->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_realisasi->realisasi->Visible) { // realisasi ?>
	<div id="r_realisasi" class="form-group row">
		<label id="elh_tb_realisasi_realisasi" for="x_realisasi" class="<?php echo $tb_realisasi_edit->LeftColumnClass ?>"><?php echo $tb_realisasi->realisasi->caption() ?><?php echo ($tb_realisasi->realisasi->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_realisasi_edit->RightColumnClass ?>"><div<?php echo $tb_realisasi->realisasi->cellAttributes() ?>>
<span id="el_tb_realisasi_realisasi">
<input type="text" data-table="tb_realisasi" data-field="x_realisasi" name="x_realisasi" id="x_realisasi" size="30" placeholder="<?php echo HtmlEncode($tb_realisasi->realisasi->getPlaceHolder()) ?>" value="<?php echo $tb_realisasi->realisasi->EditValue ?>"<?php echo $tb_realisasi->realisasi->editAttributes() ?>>
</span>
<?php echo $tb_realisasi->realisasi->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_realisasi_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_realisasi_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_realisasi_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_realisasi_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_realisasi_edit->terminate();
?>