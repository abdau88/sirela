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
$tb_user_edit = new tb_user_edit();

// Run the page
$tb_user_edit->run();

// Setup login status
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$tb_user_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var ftb_useredit = currentForm = new ew.Form("ftb_useredit", "edit");

// Validate form
ftb_useredit.validate = function() {
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
		<?php if ($tb_user_edit->username->Required) { ?>
			elm = this.getElements("x" + infix + "_username");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_user->username->caption(), $tb_user->username->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_user_edit->password->Required) { ?>
			elm = this.getElements("x" + infix + "_password");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_user->password->caption(), $tb_user->password->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($tb_user_edit->role->Required) { ?>
			elm = this.getElements("x" + infix + "_role");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $tb_user->role->caption(), $tb_user->role->RequiredErrorMessage)) ?>");
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
ftb_useredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
ftb_useredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
ftb_useredit.lists["x_role"] = <?php echo $tb_user_edit->role->Lookup->toClientList() ?>;
ftb_useredit.lists["x_role"].options = <?php echo JsonEncode($tb_user_edit->role->options(FALSE, TRUE)) ?>;

// Form object for search
</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $tb_user_edit->showPageHeader(); ?>
<?php
$tb_user_edit->showMessage();
?>
<form name="ftb_useredit" id="ftb_useredit" class="<?php echo $tb_user_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($tb_user_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $tb_user_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="tb_user">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$tb_user_edit->IsModal ?>">
<!-- Fields to prevent google autofill -->
<input class="d-none" type="text" name="<?php echo Encrypt(Random()) ?>">
<input class="d-none" type="password" name="<?php echo Encrypt(Random()) ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($tb_user->username->Visible) { // username ?>
	<div id="r_username" class="form-group row">
		<label id="elh_tb_user_username" for="x_username" class="<?php echo $tb_user_edit->LeftColumnClass ?>"><?php echo $tb_user->username->caption() ?><?php echo ($tb_user->username->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_user_edit->RightColumnClass ?>"><div<?php echo $tb_user->username->cellAttributes() ?>>
<span id="el_tb_user_username">
<span<?php echo $tb_user->username->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($tb_user->username->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="tb_user" data-field="x_username" name="x_username" id="x_username" value="<?php echo HtmlEncode($tb_user->username->CurrentValue) ?>">
<?php echo $tb_user->username->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_user->password->Visible) { // password ?>
	<div id="r_password" class="form-group row">
		<label id="elh_tb_user_password" for="x_password" class="<?php echo $tb_user_edit->LeftColumnClass ?>"><?php echo $tb_user->password->caption() ?><?php echo ($tb_user->password->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_user_edit->RightColumnClass ?>"><div<?php echo $tb_user->password->cellAttributes() ?>>
<span id="el_tb_user_password">
<input type="password" data-field="x_password" name="x_password" id="x_password" value="<?php echo $tb_user->password->EditValue ?>" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($tb_user->password->getPlaceHolder()) ?>"<?php echo $tb_user->password->editAttributes() ?>>
</span>
<?php echo $tb_user->password->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($tb_user->role->Visible) { // role ?>
	<div id="r_role" class="form-group row">
		<label id="elh_tb_user_role" for="x_role" class="<?php echo $tb_user_edit->LeftColumnClass ?>"><?php echo $tb_user->role->caption() ?><?php echo ($tb_user->role->Required) ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $tb_user_edit->RightColumnClass ?>"><div<?php echo $tb_user->role->cellAttributes() ?>>
<span id="el_tb_user_role">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="tb_user" data-field="x_role" data-value-separator="<?php echo $tb_user->role->displayValueSeparatorAttribute() ?>" id="x_role" name="x_role"<?php echo $tb_user->role->editAttributes() ?>>
		<?php echo $tb_user->role->selectOptionListHtml("x_role") ?>
	</select>
</div>
</span>
<?php echo $tb_user->role->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$tb_user_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $tb_user_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $tb_user_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$tb_user_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$tb_user_edit->terminate();
?>