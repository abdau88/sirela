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
$tb_unit_add = new tb_unit_add();

// Run the page
$tb_unit_add->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_unit_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var ftb_unitadd = currentForm = new ew.Form("ftb_unitadd", "add");

// Validate form
ftb_unitadd.validate = function() {
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
		<?php if ($tb_unit_add->unit_kerja->Required) { ?>
			elm = this.getElements("x" + infix + "_unit_kerja");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_unit->unit_kerja->caption(), $tb_unit->unit_kerja->RequiredErrorMessage)) ?>");
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
ftb_unitadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_unitadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_unit_add->showPageHeader(); ?>
<?php
$tb_unit_add->showMessage();
?>
<form name="ftb_unitadd" id="ftb_unitadd" class="<?php echo $tb_unit_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_unit_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_unit_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_unit">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$tb_unit_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($tb_unit->unit_kerja->Visible) { // unit_kerja ?>
	<div id="r_unit_kerja" class="form-group row">
		<label id="elh_tb_unit_unit_kerja" for="x_unit_kerja" class="<?php echo $tb_unit_add->LeftColumnClass ?>"><?php echo $tb_unit->unit_kerja->caption() ?><?php echo ($tb_unit->unit_kerja->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_unit_add->RightColumnClass ?>"><div<?php echo $tb_unit->unit_kerja->cellAttributes() ?>>
<span id="el_tb_unit_unit_kerja">
<input type="text" data-table="tb_unit" data-field="x_unit_kerja" name="x_unit_kerja" id="x_unit_kerja" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($tb_unit->unit_kerja->getPlaceHolder()) ?>" value="<?php echo $tb_unit->unit_kerja->EditValue ?>"<?php echo $tb_unit->unit_kerja->editAttributes() ?>>
</span>
<?php echo $tb_unit->unit_kerja->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_unit_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_unit_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_unit_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_unit_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_unit_add->terminate();
?>