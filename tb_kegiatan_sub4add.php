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
$tb_kegiatan_sub4_add = new tb_kegiatan_sub4_add();

// Run the page
$tb_kegiatan_sub4_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_kegiatan_sub4_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ftb_kegiatan_sub4add = currentForm = new ew.Form("ftb_kegiatan_sub4add", "add");

// Validate form
ftb_kegiatan_sub4add.validate = function() {
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
		<?php if ($tb_kegiatan_sub4_add->kode_kegiatan_sub4->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub4->kode_kegiatan_sub4->caption(), $tb_kegiatan_sub4->kode_kegiatan_sub4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub4_add->nama_kegiatan_sub4->Required) { ?>
			elm = this.getElements("x" + infix + "_nama_kegiatan_sub4");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub4->nama_kegiatan_sub4->caption(), $tb_kegiatan_sub4->nama_kegiatan_sub4->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_kegiatan_sub4_add->kode_kegiatan_sub5->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kegiatan_sub5");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_kegiatan_sub4->kode_kegiatan_sub5->caption(), $tb_kegiatan_sub4->kode_kegiatan_sub5->RequiredErrorMessage)) ?>");
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
ftb_kegiatan_sub4add.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_kegiatan_sub4add.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_kegiatan_sub4add.lists["x_kode_kegiatan_sub5"] = <?php echo $tb_kegiatan_sub4_add->kode_kegiatan_sub5->Lookup->toClientList() ?>;
ftb_kegiatan_sub4add.lists["x_kode_kegiatan_sub5"].options = <?php echo JsonEncode($tb_kegiatan_sub4_add->kode_kegiatan_sub5->lookupOptions()) ?>;
ftb_kegiatan_sub4add.autoSuggests["x_kode_kegiatan_sub5"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_kegiatan_sub4_add->showPageHeader(); ?>
<?php
$tb_kegiatan_sub4_add->showMessage();
?>
<form name="ftb_kegiatan_sub4add" id="ftb_kegiatan_sub4add" class="<?php echo $tb_kegiatan_sub4_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_kegiatan_sub4_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_kegiatan_sub4_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_kegiatan_sub4">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tb_kegiatan_sub4_add->IsModal ?>">
<?php if ($tb_kegiatan_sub4->getCurrentMasterTable() == "tb_kegiatan_sub5") { ?>
<input type="hidden" name="<?php echo TABLE_SHOW_MASTER ?>" value="tb_kegiatan_sub5">
<input type="hidden" name="fk_kode_kegiatan_sub5" value="<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->getSessionValue() ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub4->Visible) { // kode_kegiatan_sub4 ?>
	<div id="r_kode_kegiatan_sub4" class="form-group row">
		<label id="elh_tb_kegiatan_sub4_kode_kegiatan_sub4" for="x_kode_kegiatan_sub4" class="<?php echo $tb_kegiatan_sub4_add->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->caption() ?><?php echo ($tb_kegiatan_sub4->kode_kegiatan_sub4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub4_add->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub4_kode_kegiatan_sub4">
<input type="text" data-table="tb_kegiatan_sub4" data-field="x_kode_kegiatan_sub4" name="x_kode_kegiatan_sub4" id="x_kode_kegiatan_sub4" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub4->kode_kegiatan_sub4->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->EditValue ?>"<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->editAttributes() ?>>
</span>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan_sub4->nama_kegiatan_sub4->Visible) { // nama_kegiatan_sub4 ?>
	<div id="r_nama_kegiatan_sub4" class="form-group row">
		<label id="elh_tb_kegiatan_sub4_nama_kegiatan_sub4" for="x_nama_kegiatan_sub4" class="<?php echo $tb_kegiatan_sub4_add->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->caption() ?><?php echo ($tb_kegiatan_sub4->nama_kegiatan_sub4->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub4_add->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->cellAttributes() ?>>
<span id="el_tb_kegiatan_sub4_nama_kegiatan_sub4">
<input type="text" data-table="tb_kegiatan_sub4" data-field="x_nama_kegiatan_sub4" name="x_nama_kegiatan_sub4" id="x_nama_kegiatan_sub4" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub4->nama_kegiatan_sub4->getPlaceHolder()) ?>" value="<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->EditValue ?>"<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->editAttributes() ?>>
</span>
<?php echo $tb_kegiatan_sub4->nama_kegiatan_sub4->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub5->Visible) { // kode_kegiatan_sub5 ?>
	<div id="r_kode_kegiatan_sub5" class="form-group row">
		<label id="elh_tb_kegiatan_sub4_kode_kegiatan_sub5" class="<?php echo $tb_kegiatan_sub4_add->LeftColumnClass ?>"><?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->caption() ?><?php echo ($tb_kegiatan_sub4->kode_kegiatan_sub5->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_kegiatan_sub4_add->RightColumnClass ?>"><div<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->cellAttributes() ?>>
<?php if ($tb_kegiatan_sub4->kode_kegiatan_sub5->getSessionValue() <> "") { ?>
<span id="el_tb_kegiatan_sub4_kode_kegiatan_sub5">
<span<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_kegiatan_sub4->kode_kegiatan_sub5->ViewValue) ?>"></span>
</span>
<input type="hidden" id="x_kode_kegiatan_sub5" name="x_kode_kegiatan_sub5" value="<?php echo HtmlEncode($tb_kegiatan_sub4->kode_kegiatan_sub5->CurrentValue) ?>">
<?php } else { ?>
<span id="el_tb_kegiatan_sub4_kode_kegiatan_sub5">
<?php
$wrkonchange = "" . trim(@$tb_kegiatan_sub4->kode_kegiatan_sub5->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_kegiatan_sub4->kode_kegiatan_sub5->EditAttrs["onchange"] = "";
?>
<span id="as_x_kode_kegiatan_sub5" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_kode_kegiatan_sub5" id="sv_x_kode_kegiatan_sub5" value="<?php echo RemoveHtml($tb_kegiatan_sub4->kode_kegiatan_sub5->EditValue) ?>" size="30" maxlength="40" placeholder="<?php echo HtmlEncode($tb_kegiatan_sub4->kode_kegiatan_sub5->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_kegiatan_sub4->kode_kegiatan_sub5->getPlaceHolder()) ?>"<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_kegiatan_sub4" data-field="x_kode_kegiatan_sub5" data-value-separator="<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->displayValueSeparatorAttribute() ?>" name="x_kode_kegiatan_sub5" id="x_kode_kegiatan_sub5" value="<?php echo HtmlEncode($tb_kegiatan_sub4->kode_kegiatan_sub5->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_kegiatan_sub4add.createAutoSuggest({"id":"x_kode_kegiatan_sub5","forceSelect":false});
</script>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->Lookup->getParamTag("p_x_kode_kegiatan_sub5") ?>
</span>
<?php } ?>
<?php echo $tb_kegiatan_sub4->kode_kegiatan_sub5->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("tb_kegiatan_sub3", explode(",", $tb_kegiatan_sub4->getCurrentDetailTable())) && $tb_kegiatan_sub3->DetailAdd) {
?>
<?php if ($tb_kegiatan_sub4->getCurrentDetailTable() <> "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->TablePhrase("tb_kegiatan_sub3", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "tb_kegiatan_sub3grid.php" ?>
<?php } ?>
<?php if (!$tb_kegiatan_sub4_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_kegiatan_sub4_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_kegiatan_sub4_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_kegiatan_sub4_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_kegiatan_sub4_add->terminate();
?>