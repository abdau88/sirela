<?php
namespace PHPMaker2019\project1;

/**
 * Page class
 */
class tb_realisasi_add extends tb_realisasi
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{AEBA4D74-5D9D-43A3-BDE2-1E8D7036857C}";

	// Table name
	public $TableName = 'tb_realisasi';

	// Page object name
	public $PageObjName = "tb_realisasi_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (tb_realisasi)
		if (!isset($GLOBALS["tb_realisasi"]) || get_class($GLOBALS["tb_realisasi"]) == PROJECT_NAMESPACE . "tb_realisasi") {
			$GLOBALS["tb_realisasi"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["tb_realisasi"];
		}

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'tb_realisasi');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $tb_realisasi;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($tb_realisasi);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "tb_realisasiview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['kode_realisasi'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->kode_realisasi->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->kode_realisasi->Visible = FALSE;
		$this->kode_unit->setVisibility();
		$this->kode_akun->setVisibility();
		$this->tahun->setVisibility();
		$this->pagu->setVisibility();
		$this->realisasi->setVisibility();
		$this->sisa_dana->Visible = FALSE;
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->kode_unit);
		$this->setupLookupOptions($this->kode_akun);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("kode_realisasi") !== NULL) {
				$this->kode_realisasi->setQueryStringValue(Get("kode_realisasi"));
				$this->setKey("kode_realisasi", $this->kode_realisasi->CurrentValue); // Set up key
			} else {
				$this->setKey("kode_realisasi", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("tb_realisasilist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "tb_realisasilist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "tb_realisasiview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->kode_realisasi->CurrentValue = NULL;
		$this->kode_realisasi->OldValue = $this->kode_realisasi->CurrentValue;
		$this->kode_unit->CurrentValue = NULL;
		$this->kode_unit->OldValue = $this->kode_unit->CurrentValue;
		$this->kode_akun->CurrentValue = NULL;
		$this->kode_akun->OldValue = $this->kode_akun->CurrentValue;
		$this->tahun->CurrentValue = NULL;
		$this->tahun->OldValue = $this->tahun->CurrentValue;
		$this->pagu->CurrentValue = NULL;
		$this->pagu->OldValue = $this->pagu->CurrentValue;
		$this->realisasi->CurrentValue = NULL;
		$this->realisasi->OldValue = $this->realisasi->CurrentValue;
		$this->sisa_dana->CurrentValue = NULL;
		$this->sisa_dana->OldValue = $this->sisa_dana->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'kode_unit' first before field var 'x_kode_unit'
		$val = $CurrentForm->hasValue("kode_unit") ? $CurrentForm->getValue("kode_unit") : $CurrentForm->getValue("x_kode_unit");
		if (!$this->kode_unit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->kode_unit->Visible = FALSE; // Disable update for API request
			else
				$this->kode_unit->setFormValue($val);
		}

		// Check field name 'kode_akun' first before field var 'x_kode_akun'
		$val = $CurrentForm->hasValue("kode_akun") ? $CurrentForm->getValue("kode_akun") : $CurrentForm->getValue("x_kode_akun");
		if (!$this->kode_akun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->kode_akun->Visible = FALSE; // Disable update for API request
			else
				$this->kode_akun->setFormValue($val);
		}

		// Check field name 'tahun' first before field var 'x_tahun'
		$val = $CurrentForm->hasValue("tahun") ? $CurrentForm->getValue("tahun") : $CurrentForm->getValue("x_tahun");
		if (!$this->tahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahun->Visible = FALSE; // Disable update for API request
			else
				$this->tahun->setFormValue($val);
		}

		// Check field name 'pagu' first before field var 'x_pagu'
		$val = $CurrentForm->hasValue("pagu") ? $CurrentForm->getValue("pagu") : $CurrentForm->getValue("x_pagu");
		if (!$this->pagu->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->pagu->Visible = FALSE; // Disable update for API request
			else
				$this->pagu->setFormValue($val);
		}

		// Check field name 'realisasi' first before field var 'x_realisasi'
		$val = $CurrentForm->hasValue("realisasi") ? $CurrentForm->getValue("realisasi") : $CurrentForm->getValue("x_realisasi");
		if (!$this->realisasi->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->realisasi->Visible = FALSE; // Disable update for API request
			else
				$this->realisasi->setFormValue($val);
		}

		// Check field name 'kode_realisasi' first before field var 'x_kode_realisasi'
		$val = $CurrentForm->hasValue("kode_realisasi") ? $CurrentForm->getValue("kode_realisasi") : $CurrentForm->getValue("x_kode_realisasi");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->kode_unit->CurrentValue = $this->kode_unit->FormValue;
		$this->kode_akun->CurrentValue = $this->kode_akun->FormValue;
		$this->tahun->CurrentValue = $this->tahun->FormValue;
		$this->pagu->CurrentValue = $this->pagu->FormValue;
		$this->realisasi->CurrentValue = $this->realisasi->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->kode_realisasi->setDbValue($row['kode_realisasi']);
		$this->kode_unit->setDbValue($row['kode_unit']);
		$this->kode_akun->setDbValue($row['kode_akun']);
		$this->tahun->setDbValue($row['tahun']);
		$this->pagu->setDbValue($row['pagu']);
		$this->realisasi->setDbValue($row['realisasi']);
		$this->sisa_dana->setDbValue($row['sisa_dana']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['kode_realisasi'] = $this->kode_realisasi->CurrentValue;
		$row['kode_unit'] = $this->kode_unit->CurrentValue;
		$row['kode_akun'] = $this->kode_akun->CurrentValue;
		$row['tahun'] = $this->tahun->CurrentValue;
		$row['pagu'] = $this->pagu->CurrentValue;
		$row['realisasi'] = $this->realisasi->CurrentValue;
		$row['sisa_dana'] = $this->sisa_dana->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("kode_realisasi")) <> "")
			$this->kode_realisasi->CurrentValue = $this->getKey("kode_realisasi"); // kode_realisasi
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// kode_realisasi
		// kode_unit
		// kode_akun
		// tahun
		// pagu
		// realisasi
		// sisa_dana

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// kode_realisasi
			$this->kode_realisasi->ViewValue = $this->kode_realisasi->CurrentValue;
			$this->kode_realisasi->ViewCustomAttributes = "";

			// kode_unit
			$this->kode_unit->ViewValue = $this->kode_unit->CurrentValue;
			$curVal = strval($this->kode_unit->CurrentValue);
			if ($curVal <> "") {
				$this->kode_unit->ViewValue = $this->kode_unit->lookupCacheOption($curVal);
				if ($this->kode_unit->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`kode_unit`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->kode_unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->kode_unit->ViewValue = $this->kode_unit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kode_unit->ViewValue = $this->kode_unit->CurrentValue;
					}
				}
			} else {
				$this->kode_unit->ViewValue = NULL;
			}
			$this->kode_unit->ViewCustomAttributes = "";

			// kode_akun
			$this->kode_akun->ViewValue = $this->kode_akun->CurrentValue;
			$curVal = strval($this->kode_akun->CurrentValue);
			if ($curVal <> "") {
				$this->kode_akun->ViewValue = $this->kode_akun->lookupCacheOption($curVal);
				if ($this->kode_akun->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`kode_kegiatan`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->kode_akun->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = $rswrk->fields('df');
						$this->kode_akun->ViewValue = $this->kode_akun->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kode_akun->ViewValue = $this->kode_akun->CurrentValue;
					}
				}
			} else {
				$this->kode_akun->ViewValue = NULL;
			}
			$this->kode_akun->ViewCustomAttributes = "";

			// tahun
			if (strval($this->tahun->CurrentValue) <> "") {
				$this->tahun->ViewValue = $this->tahun->optionCaption($this->tahun->CurrentValue);
			} else {
				$this->tahun->ViewValue = NULL;
			}
			$this->tahun->ViewCustomAttributes = "";

			// pagu
			$this->pagu->ViewValue = $this->pagu->CurrentValue;
			$this->pagu->ViewValue = FormatNumber($this->pagu->ViewValue, 0, -2, -2, -2);
			$this->pagu->ViewCustomAttributes = "";

			// realisasi
			$this->realisasi->ViewValue = $this->realisasi->CurrentValue;
			$this->realisasi->ViewValue = FormatNumber($this->realisasi->ViewValue, 0, -2, -2, -2);
			$this->realisasi->ViewCustomAttributes = "";

			// sisa_dana
			$this->sisa_dana->ViewValue = $this->sisa_dana->CurrentValue;
			$this->sisa_dana->ViewValue = FormatNumber($this->sisa_dana->ViewValue, 0, -2, -2, -2);
			$this->sisa_dana->ViewCustomAttributes = "";

			// kode_unit
			$this->kode_unit->LinkCustomAttributes = "";
			$this->kode_unit->HrefValue = "";
			$this->kode_unit->TooltipValue = "";

			// kode_akun
			$this->kode_akun->LinkCustomAttributes = "";
			$this->kode_akun->HrefValue = "";
			$this->kode_akun->TooltipValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";
			$this->tahun->TooltipValue = "";

			// pagu
			$this->pagu->LinkCustomAttributes = "";
			$this->pagu->HrefValue = "";
			$this->pagu->TooltipValue = "";

			// realisasi
			$this->realisasi->LinkCustomAttributes = "";
			$this->realisasi->HrefValue = "";
			$this->realisasi->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// kode_unit
			$this->kode_unit->EditAttrs["class"] = "form-control";
			$this->kode_unit->EditCustomAttributes = "";
			$this->kode_unit->EditValue = HtmlEncode($this->kode_unit->CurrentValue);
			$curVal = strval($this->kode_unit->CurrentValue);
			if ($curVal <> "") {
				$this->kode_unit->EditValue = $this->kode_unit->lookupCacheOption($curVal);
				if ($this->kode_unit->EditValue === NULL) { // Lookup from database
					$filterWrk = "`kode_unit`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->kode_unit->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->kode_unit->EditValue = $this->kode_unit->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kode_unit->EditValue = HtmlEncode($this->kode_unit->CurrentValue);
					}
				}
			} else {
				$this->kode_unit->EditValue = NULL;
			}
			$this->kode_unit->PlaceHolder = RemoveHtml($this->kode_unit->caption());

			// kode_akun
			$this->kode_akun->EditAttrs["class"] = "form-control";
			$this->kode_akun->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->kode_akun->CurrentValue = HtmlDecode($this->kode_akun->CurrentValue);
			$this->kode_akun->EditValue = HtmlEncode($this->kode_akun->CurrentValue);
			$curVal = strval($this->kode_akun->CurrentValue);
			if ($curVal <> "") {
				$this->kode_akun->EditValue = $this->kode_akun->lookupCacheOption($curVal);
				if ($this->kode_akun->EditValue === NULL) { // Lookup from database
					$filterWrk = "`kode_kegiatan`" . SearchString("=", $curVal, DATATYPE_STRING, "");
					$sqlWrk = $this->kode_akun->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = array();
						$arwrk[1] = HtmlEncode($rswrk->fields('df'));
						$this->kode_akun->EditValue = $this->kode_akun->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->kode_akun->EditValue = HtmlEncode($this->kode_akun->CurrentValue);
					}
				}
			} else {
				$this->kode_akun->EditValue = NULL;
			}
			$this->kode_akun->PlaceHolder = RemoveHtml($this->kode_akun->caption());

			// tahun
			$this->tahun->EditAttrs["class"] = "form-control";
			$this->tahun->EditCustomAttributes = "";
			$this->tahun->EditValue = $this->tahun->options(TRUE);

			// pagu
			$this->pagu->EditAttrs["class"] = "form-control";
			$this->pagu->EditCustomAttributes = "";
			$this->pagu->EditValue = HtmlEncode($this->pagu->CurrentValue);
			$this->pagu->PlaceHolder = RemoveHtml($this->pagu->caption());

			// realisasi
			$this->realisasi->EditAttrs["class"] = "form-control";
			$this->realisasi->EditCustomAttributes = "";
			$this->realisasi->EditValue = HtmlEncode($this->realisasi->CurrentValue);
			$this->realisasi->PlaceHolder = RemoveHtml($this->realisasi->caption());

			// Add refer script
			// kode_unit

			$this->kode_unit->LinkCustomAttributes = "";
			$this->kode_unit->HrefValue = "";

			// kode_akun
			$this->kode_akun->LinkCustomAttributes = "";
			$this->kode_akun->HrefValue = "";

			// tahun
			$this->tahun->LinkCustomAttributes = "";
			$this->tahun->HrefValue = "";

			// pagu
			$this->pagu->LinkCustomAttributes = "";
			$this->pagu->HrefValue = "";

			// realisasi
			$this->realisasi->LinkCustomAttributes = "";
			$this->realisasi->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->kode_realisasi->Required) {
			if (!$this->kode_realisasi->IsDetailKey && $this->kode_realisasi->FormValue != NULL && $this->kode_realisasi->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kode_realisasi->caption(), $this->kode_realisasi->RequiredErrorMessage));
			}
		}
		if ($this->kode_unit->Required) {
			if (!$this->kode_unit->IsDetailKey && $this->kode_unit->FormValue != NULL && $this->kode_unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kode_unit->caption(), $this->kode_unit->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->kode_unit->FormValue)) {
			AddMessage($FormError, $this->kode_unit->errorMessage());
		}
		if ($this->kode_akun->Required) {
			if (!$this->kode_akun->IsDetailKey && $this->kode_akun->FormValue != NULL && $this->kode_akun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->kode_akun->caption(), $this->kode_akun->RequiredErrorMessage));
			}
		}
		if ($this->tahun->Required) {
			if (!$this->tahun->IsDetailKey && $this->tahun->FormValue != NULL && $this->tahun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tahun->caption(), $this->tahun->RequiredErrorMessage));
			}
		}
		if ($this->pagu->Required) {
			if (!$this->pagu->IsDetailKey && $this->pagu->FormValue != NULL && $this->pagu->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->pagu->caption(), $this->pagu->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->pagu->FormValue)) {
			AddMessage($FormError, $this->pagu->errorMessage());
		}
		if ($this->realisasi->Required) {
			if (!$this->realisasi->IsDetailKey && $this->realisasi->FormValue != NULL && $this->realisasi->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->realisasi->caption(), $this->realisasi->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->realisasi->FormValue)) {
			AddMessage($FormError, $this->realisasi->errorMessage());
		}
		if ($this->sisa_dana->Required) {
			if (!$this->sisa_dana->IsDetailKey && $this->sisa_dana->FormValue != NULL && $this->sisa_dana->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sisa_dana->caption(), $this->sisa_dana->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// kode_unit
		$this->kode_unit->setDbValueDef($rsnew, $this->kode_unit->CurrentValue, NULL, FALSE);

		// kode_akun
		$this->kode_akun->setDbValueDef($rsnew, $this->kode_akun->CurrentValue, NULL, FALSE);

		// tahun
		$this->tahun->setDbValueDef($rsnew, $this->tahun->CurrentValue, NULL, FALSE);

		// pagu
		$this->pagu->setDbValueDef($rsnew, $this->pagu->CurrentValue, NULL, FALSE);

		// realisasi
		$this->realisasi->setDbValueDef($rsnew, $this->realisasi->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("tb_realisasilist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_kode_unit":
							break;
						case "x_kode_akun":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>