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
$tb_akun_add = new tb_akun_add();

// Run the page
$tb_akun_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_akun_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ftb_akunadd = currentForm = new ew.Form("ftb_akunadd", "add");

// Validate form
ftb_akunadd.validate = function() {
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
		<?php if ($tb_akun_add->kode_akun->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_akun");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_akun->kode_akun->caption(), $tb_akun->kode_akun->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_akun_add->uraian->Required) { ?>
			elm = this.getElements("x" + infix + "_uraian");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_akun->uraian->caption(), $tb_akun->uraian->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_akun_add->kode_kategori->Required) { ?>
			elm = this.getElements("x" + infix + "_kode_kategori");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_akun->kode_kategori->caption(), $tb_akun->kode_kategori->RequiredErrorMessage)) ?>");
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
ftb_akunadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_akunadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_akunadd.lists["x_kode_kategori"] = <?php echo $tb_akun_add->kode_kategori->Lookup->toClientList() ?>;
ftb_akunadd.lists["x_kode_kategori"].options = <?php echo JsonEncode($tb_akun_add->kode_kategori->lookupOptions()) ?>;
ftb_akunadd.autoSuggests["x_kode_kategori"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_akun_add->showPageHeader(); ?>
<?php
$tb_akun_add->showMessage();
?>
<form name="ftb_akunadd" id="ftb_akunadd" class="<?php echo $tb_akun_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_akun_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_akun_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_akun">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tb_akun_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tb_akun->kode_akun->Visible) { // kode_akun ?>
	<div id="r_kode_akun" class="form-group row">
		<label id="elh_tb_akun_kode_akun" for="x_kode_akun" class="<?php echo $tb_akun_add->LeftColumnClass ?>"><?php echo $tb_akun->kode_akun->caption() ?><?php echo ($tb_akun->kode_akun->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_akun_add->RightColumnClass ?>"><div<?php echo $tb_akun->kode_akun->cellAttributes() ?>>
<span id="el_tb_akun_kode_akun">
<input type="text" data-table="tb_akun" data-field="x_kode_akun" name="x_kode_akun" id="x_kode_akun" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($tb_akun->kode_akun->getPlaceHolder()) ?>" value="<?php echo $tb_akun->kode_akun->EditValue ?>"<?php echo $tb_akun->kode_akun->editAttributes() ?>>
</span>
<?php echo $tb_akun->kode_akun->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_akun->uraian->Visible) { // uraian ?>
	<div id="r_uraian" class="form-group row">
		<label id="elh_tb_akun_uraian" for="x_uraian" class="<?php echo $tb_akun_add->LeftColumnClass ?>"><?php echo $tb_akun->uraian->caption() ?><?php echo ($tb_akun->uraian->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_akun_add->RightColumnClass ?>"><div<?php echo $tb_akun->uraian->cellAttributes() ?>>
<span id="el_tb_akun_uraian">
<input type="text" data-table="tb_akun" data-field="x_uraian" name="x_uraian" id="x_uraian" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($tb_akun->uraian->getPlaceHolder()) ?>" value="<?php echo $tb_akun->uraian->EditValue ?>"<?php echo $tb_akun->uraian->editAttributes() ?>>
</span>
<?php echo $tb_akun->uraian->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_akun->kode_kategori->Visible) { // kode_kategori ?>
	<div id="r_kode_kategori" class="form-group row">
		<label id="elh_tb_akun_kode_kategori" class="<?php echo $tb_akun_add->LeftColumnClass ?>"><?php echo $tb_akun->kode_kategori->caption() ?><?php echo ($tb_akun->kode_kategori->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_akun_add->RightColumnClass ?>"><div<?php echo $tb_akun->kode_kategori->cellAttributes() ?>>
<span id="el_tb_akun_kode_kategori">
<?php
$wrkonchange = "" . trim(@$tb_akun->kode_kategori->EditAttrs["onchange"]);
if (trim($wrkonchange) <> "") $wrkonchange = " onchange=\"" . JsEncode($wrkonchange) . "\"";
$tb_akun->kode_kategori->EditAttrs["onchange"] = "";
?>
<span id="as_x_kode_kategori" class="text-nowrap" style="z-index: 8970">
	<input type="text" class="form-control" name="sv_x_kode_kategori" id="sv_x_kode_kategori" value="<?php echo RemoveHtml($tb_akun->kode_kategori->EditValue) ?>" size="30" maxlength="20" placeholder="<?php echo HtmlEncode($tb_akun->kode_kategori->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($tb_akun->kode_kategori->getPlaceHolder()) ?>"<?php echo $tb_akun->kode_kategori->editAttributes() ?>>
</span>
<input type="hidden" data-table="tb_akun" data-field="x_kode_kategori" data-value-separator="<?php echo $tb_akun->kode_kategori->displayValueSeparatorAttribute() ?>" name="x_kode_kategori" id="x_kode_kategori" value="<?php echo HtmlEncode($tb_akun->kode_kategori->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<script>
ftb_akunadd.createAutoSuggest({"id":"x_kode_kategori","forceSelect":false});
</script>
<?php echo $tb_akun->kode_kategori->Lookup->getParamTag("p_x_kode_kategori") ?>
</span>
<?php echo $tb_akun->kode_kategori->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_akun_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_akun_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_akun_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_akun_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_akun_add->terminate();
?>