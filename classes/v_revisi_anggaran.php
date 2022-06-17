<?php
namespace PHPMaker2019\project1;

/**
 * Table class for v_revisi_anggaran
 */
class v_revisi_anggaran extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $Tanggal_Diubah;
	public $Unit_Kerja;
	public $Akun;
	public $Tahun;
	public $Pagu_28Lama29;
	public $Pagu_28Baru29;
	public $Realisasi_28Lama29;
	public $Realisasi_28Baru29;
	public $Sisa_Dana_28Lama29;
	public $Sisa_Dana_28Baru29;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v_revisi_anggaran';
		$this->TableName = 'v_revisi_anggaran';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v_revisi_anggaran`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// Tanggal Diubah
		$this->Tanggal_Diubah = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Tanggal_Diubah', 'Tanggal Diubah', '`Tanggal Diubah`', CastDateFieldForLike('`Tanggal Diubah`', 0, "DB"), 133, 0, FALSE, '`Tanggal Diubah`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal_Diubah->Sortable = TRUE; // Allow sort
		$this->Tanggal_Diubah->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Tanggal Diubah'] = &$this->Tanggal_Diubah;

		// Unit Kerja
		$this->Unit_Kerja = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Unit_Kerja', 'Unit Kerja', '`Unit Kerja`', '`Unit Kerja`', 200, -1, FALSE, '`Unit Kerja`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Unit_Kerja->Sortable = TRUE; // Allow sort
		$this->fields['Unit Kerja'] = &$this->Unit_Kerja;

		// Akun
		$this->Akun = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Akun', 'Akun', '`Akun`', '`Akun`', 200, -1, FALSE, '`Akun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Akun->Sortable = TRUE; // Allow sort
		$this->fields['Akun'] = &$this->Akun;

		// Tahun
		$this->Tahun = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Tahun', 'Tahun', '`Tahun`', '`Tahun`', 200, -1, FALSE, '`Tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tahun->Sortable = TRUE; // Allow sort
		$this->Tahun->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Tahun'] = &$this->Tahun;

		// Pagu (Lama)
		$this->Pagu_28Lama29 = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Pagu_28Lama29', 'Pagu (Lama)', '`Pagu (Lama)`', '`Pagu (Lama)`', 3, -1, FALSE, '`Pagu (Lama)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pagu_28Lama29->Sortable = TRUE; // Allow sort
		$this->Pagu_28Lama29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Pagu (Lama)'] = &$this->Pagu_28Lama29;

		// Pagu (Baru)
		$this->Pagu_28Baru29 = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Pagu_28Baru29', 'Pagu (Baru)', '`Pagu (Baru)`', '`Pagu (Baru)`', 3, -1, FALSE, '`Pagu (Baru)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Pagu_28Baru29->Sortable = TRUE; // Allow sort
		$this->Pagu_28Baru29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Pagu (Baru)'] = &$this->Pagu_28Baru29;

		// Realisasi (Lama)
		$this->Realisasi_28Lama29 = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Realisasi_28Lama29', 'Realisasi (Lama)', '`Realisasi (Lama)`', '`Realisasi (Lama)`', 3, -1, FALSE, '`Realisasi (Lama)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Realisasi_28Lama29->Sortable = TRUE; // Allow sort
		$this->Realisasi_28Lama29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Realisasi (Lama)'] = &$this->Realisasi_28Lama29;

		// Realisasi (Baru)
		$this->Realisasi_28Baru29 = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Realisasi_28Baru29', 'Realisasi (Baru)', '`Realisasi (Baru)`', '`Realisasi (Baru)`', 3, -1, FALSE, '`Realisasi (Baru)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Realisasi_28Baru29->Sortable = TRUE; // Allow sort
		$this->Realisasi_28Baru29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Realisasi (Baru)'] = &$this->Realisasi_28Baru29;

		// Sisa Dana (Lama)
		$this->Sisa_Dana_28Lama29 = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Sisa_Dana_28Lama29', 'Sisa Dana (Lama)', '`Sisa Dana (Lama)`', '`Sisa Dana (Lama)`', 3, -1, FALSE, '`Sisa Dana (Lama)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sisa_Dana_28Lama29->Sortable = TRUE; // Allow sort
		$this->Sisa_Dana_28Lama29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sisa Dana (Lama)'] = &$this->Sisa_Dana_28Lama29;

		// Sisa Dana (Baru)
		$this->Sisa_Dana_28Baru29 = new DbField('v_revisi_anggaran', 'v_revisi_anggaran', 'x_Sisa_Dana_28Baru29', 'Sisa Dana (Baru)', '`Sisa Dana (Baru)`', '`Sisa Dana (Baru)`', 3, -1, FALSE, '`Sisa Dana (Baru)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sisa_Dana_28Baru29->Sortable = TRUE; // Allow sort
		$this->Sisa_Dana_28Baru29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sisa Dana (Baru)'] = &$this->Sisa_Dana_28Baru29;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Single column sort
	public function updateSort(&$fld)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
		} else {
			$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`v_revisi_anggaran`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->Tanggal_Diubah->DbValue = $row['Tanggal Diubah'];
		$this->Unit_Kerja->DbValue = $row['Unit Kerja'];
		$this->Akun->DbValue = $row['Akun'];
		$this->Tahun->DbValue = $row['Tahun'];
		$this->Pagu_28Lama29->DbValue = $row['Pagu (Lama)'];
		$this->Pagu_28Baru29->DbValue = $row['Pagu (Baru)'];
		$this->Realisasi_28Lama29->DbValue = $row['Realisasi (Lama)'];
		$this->Realisasi_28Baru29->DbValue = $row['Realisasi (Baru)'];
		$this->Sisa_Dana_28Lama29->DbValue = $row['Sisa Dana (Lama)'];
		$this->Sisa_Dana_28Baru29->DbValue = $row['Sisa Dana (Baru)'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "v_revisi_anggaranlist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "v_revisi_anggaranview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v_revisi_anggaranedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v_revisi_anggaranadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v_revisi_anggaranlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("v_revisi_anggaranview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v_revisi_anggaranview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "v_revisi_anggaranadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v_revisi_anggaranadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v_revisi_anggaranedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("v_revisi_anggaranadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("v_revisi_anggarandelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
		} else {

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->Tanggal_Diubah->setDbValue($rs->fields('Tanggal Diubah'));
		$this->Unit_Kerja->setDbValue($rs->fields('Unit Kerja'));
		$this->Akun->setDbValue($rs->fields('Akun'));
		$this->Tahun->setDbValue($rs->fields('Tahun'));
		$this->Pagu_28Lama29->setDbValue($rs->fields('Pagu (Lama)'));
		$this->Pagu_28Baru29->setDbValue($rs->fields('Pagu (Baru)'));
		$this->Realisasi_28Lama29->setDbValue($rs->fields('Realisasi (Lama)'));
		$this->Realisasi_28Baru29->setDbValue($rs->fields('Realisasi (Baru)'));
		$this->Sisa_Dana_28Lama29->setDbValue($rs->fields('Sisa Dana (Lama)'));
		$this->Sisa_Dana_28Baru29->setDbValue($rs->fields('Sisa Dana (Baru)'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// Tanggal Diubah
		// Unit Kerja
		// Akun
		// Tahun
		// Pagu (Lama)
		// Pagu (Baru)
		// Realisasi (Lama)
		// Realisasi (Baru)
		// Sisa Dana (Lama)
		// Sisa Dana (Baru)
		// Tanggal Diubah

		$this->Tanggal_Diubah->ViewValue = $this->Tanggal_Diubah->CurrentValue;
		$this->Tanggal_Diubah->ViewValue = FormatDateTime($this->Tanggal_Diubah->ViewValue, 0);
		$this->Tanggal_Diubah->ViewCustomAttributes = "";

		// Unit Kerja
		$this->Unit_Kerja->ViewValue = $this->Unit_Kerja->CurrentValue;
		$this->Unit_Kerja->ViewCustomAttributes = "";

		// Akun
		$this->Akun->ViewValue = $this->Akun->CurrentValue;
		$this->Akun->ViewCustomAttributes = "";

		// Tahun
		$this->Tahun->ViewValue = $this->Tahun->CurrentValue;
		$this->Tahun->ViewCustomAttributes = "";

		// Pagu (Lama)
		$this->Pagu_28Lama29->ViewValue = $this->Pagu_28Lama29->CurrentValue;
		$this->Pagu_28Lama29->ViewValue = FormatNumber($this->Pagu_28Lama29->ViewValue, 0, -2, -2, -2);
		$this->Pagu_28Lama29->ViewCustomAttributes = "";

		// Pagu (Baru)
		$this->Pagu_28Baru29->ViewValue = $this->Pagu_28Baru29->CurrentValue;
		$this->Pagu_28Baru29->ViewValue = FormatNumber($this->Pagu_28Baru29->ViewValue, 0, -2, -2, -2);
		$this->Pagu_28Baru29->ViewCustomAttributes = "";

		// Realisasi (Lama)
		$this->Realisasi_28Lama29->ViewValue = $this->Realisasi_28Lama29->CurrentValue;
		$this->Realisasi_28Lama29->ViewValue = FormatNumber($this->Realisasi_28Lama29->ViewValue, 0, -2, -2, -2);
		$this->Realisasi_28Lama29->ViewCustomAttributes = "";

		// Realisasi (Baru)
		$this->Realisasi_28Baru29->ViewValue = $this->Realisasi_28Baru29->CurrentValue;
		$this->Realisasi_28Baru29->ViewValue = FormatNumber($this->Realisasi_28Baru29->ViewValue, 0, -2, -2, -2);
		$this->Realisasi_28Baru29->ViewCustomAttributes = "";

		// Sisa Dana (Lama)
		$this->Sisa_Dana_28Lama29->ViewValue = $this->Sisa_Dana_28Lama29->CurrentValue;
		$this->Sisa_Dana_28Lama29->ViewValue = FormatNumber($this->Sisa_Dana_28Lama29->ViewValue, 0, -2, -2, -2);
		$this->Sisa_Dana_28Lama29->ViewCustomAttributes = "";

		// Sisa Dana (Baru)
		$this->Sisa_Dana_28Baru29->ViewValue = $this->Sisa_Dana_28Baru29->CurrentValue;
		$this->Sisa_Dana_28Baru29->ViewValue = FormatNumber($this->Sisa_Dana_28Baru29->ViewValue, 0, -2, -2, -2);
		$this->Sisa_Dana_28Baru29->ViewCustomAttributes = "";

		// Tanggal Diubah
		$this->Tanggal_Diubah->LinkCustomAttributes = "";
		$this->Tanggal_Diubah->HrefValue = "";
		$this->Tanggal_Diubah->TooltipValue = "";

		// Unit Kerja
		$this->Unit_Kerja->LinkCustomAttributes = "";
		$this->Unit_Kerja->HrefValue = "";
		$this->Unit_Kerja->TooltipValue = "";

		// Akun
		$this->Akun->LinkCustomAttributes = "";
		$this->Akun->HrefValue = "";
		$this->Akun->TooltipValue = "";

		// Tahun
		$this->Tahun->LinkCustomAttributes = "";
		$this->Tahun->HrefValue = "";
		$this->Tahun->TooltipValue = "";

		// Pagu (Lama)
		$this->Pagu_28Lama29->LinkCustomAttributes = "";
		$this->Pagu_28Lama29->HrefValue = "";
		$this->Pagu_28Lama29->TooltipValue = "";

		// Pagu (Baru)
		$this->Pagu_28Baru29->LinkCustomAttributes = "";
		$this->Pagu_28Baru29->HrefValue = "";
		$this->Pagu_28Baru29->TooltipValue = "";

		// Realisasi (Lama)
		$this->Realisasi_28Lama29->LinkCustomAttributes = "";
		$this->Realisasi_28Lama29->HrefValue = "";
		$this->Realisasi_28Lama29->TooltipValue = "";

		// Realisasi (Baru)
		$this->Realisasi_28Baru29->LinkCustomAttributes = "";
		$this->Realisasi_28Baru29->HrefValue = "";
		$this->Realisasi_28Baru29->TooltipValue = "";

		// Sisa Dana (Lama)
		$this->Sisa_Dana_28Lama29->LinkCustomAttributes = "";
		$this->Sisa_Dana_28Lama29->HrefValue = "";
		$this->Sisa_Dana_28Lama29->TooltipValue = "";

		// Sisa Dana (Baru)
		$this->Sisa_Dana_28Baru29->LinkCustomAttributes = "";
		$this->Sisa_Dana_28Baru29->HrefValue = "";
		$this->Sisa_Dana_28Baru29->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Tanggal Diubah
		$this->Tanggal_Diubah->EditAttrs["class"] = "form-control";
		$this->Tanggal_Diubah->EditCustomAttributes = "";
		$this->Tanggal_Diubah->EditValue = FormatDateTime($this->Tanggal_Diubah->CurrentValue, 8);
		$this->Tanggal_Diubah->PlaceHolder = RemoveHtml($this->Tanggal_Diubah->caption());

		// Unit Kerja
		$this->Unit_Kerja->EditAttrs["class"] = "form-control";
		$this->Unit_Kerja->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Unit_Kerja->CurrentValue = HtmlDecode($this->Unit_Kerja->CurrentValue);
		$this->Unit_Kerja->EditValue = $this->Unit_Kerja->CurrentValue;
		$this->Unit_Kerja->PlaceHolder = RemoveHtml($this->Unit_Kerja->caption());

		// Akun
		$this->Akun->EditAttrs["class"] = "form-control";
		$this->Akun->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Akun->CurrentValue = HtmlDecode($this->Akun->CurrentValue);
		$this->Akun->EditValue = $this->Akun->CurrentValue;
		$this->Akun->PlaceHolder = RemoveHtml($this->Akun->caption());

		// Tahun
		$this->Tahun->EditAttrs["class"] = "form-control";
		$this->Tahun->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Tahun->CurrentValue = HtmlDecode($this->Tahun->CurrentValue);
		$this->Tahun->EditValue = $this->Tahun->CurrentValue;
		$this->Tahun->PlaceHolder = RemoveHtml($this->Tahun->caption());

		// Pagu (Lama)
		$this->Pagu_28Lama29->EditAttrs["class"] = "form-control";
		$this->Pagu_28Lama29->EditCustomAttributes = "";
		$this->Pagu_28Lama29->EditValue = $this->Pagu_28Lama29->CurrentValue;
		$this->Pagu_28Lama29->PlaceHolder = RemoveHtml($this->Pagu_28Lama29->caption());

		// Pagu (Baru)
		$this->Pagu_28Baru29->EditAttrs["class"] = "form-control";
		$this->Pagu_28Baru29->EditCustomAttributes = "";
		$this->Pagu_28Baru29->EditValue = $this->Pagu_28Baru29->CurrentValue;
		$this->Pagu_28Baru29->PlaceHolder = RemoveHtml($this->Pagu_28Baru29->caption());

		// Realisasi (Lama)
		$this->Realisasi_28Lama29->EditAttrs["class"] = "form-control";
		$this->Realisasi_28Lama29->EditCustomAttributes = "";
		$this->Realisasi_28Lama29->EditValue = $this->Realisasi_28Lama29->CurrentValue;
		$this->Realisasi_28Lama29->PlaceHolder = RemoveHtml($this->Realisasi_28Lama29->caption());

		// Realisasi (Baru)
		$this->Realisasi_28Baru29->EditAttrs["class"] = "form-control";
		$this->Realisasi_28Baru29->EditCustomAttributes = "";
		$this->Realisasi_28Baru29->EditValue = $this->Realisasi_28Baru29->CurrentValue;
		$this->Realisasi_28Baru29->PlaceHolder = RemoveHtml($this->Realisasi_28Baru29->caption());

		// Sisa Dana (Lama)
		$this->Sisa_Dana_28Lama29->EditAttrs["class"] = "form-control";
		$this->Sisa_Dana_28Lama29->EditCustomAttributes = "";
		$this->Sisa_Dana_28Lama29->EditValue = $this->Sisa_Dana_28Lama29->CurrentValue;
		$this->Sisa_Dana_28Lama29->PlaceHolder = RemoveHtml($this->Sisa_Dana_28Lama29->caption());

		// Sisa Dana (Baru)
		$this->Sisa_Dana_28Baru29->EditAttrs["class"] = "form-control";
		$this->Sisa_Dana_28Baru29->EditCustomAttributes = "";
		$this->Sisa_Dana_28Baru29->EditValue = $this->Sisa_Dana_28Baru29->CurrentValue;
		$this->Sisa_Dana_28Baru29->PlaceHolder = RemoveHtml($this->Sisa_Dana_28Baru29->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->Tanggal_Diubah);
					$doc->exportCaption($this->Unit_Kerja);
					$doc->exportCaption($this->Akun);
					$doc->exportCaption($this->Tahun);
					$doc->exportCaption($this->Pagu_28Lama29);
					$doc->exportCaption($this->Pagu_28Baru29);
					$doc->exportCaption($this->Realisasi_28Lama29);
					$doc->exportCaption($this->Realisasi_28Baru29);
					$doc->exportCaption($this->Sisa_Dana_28Lama29);
					$doc->exportCaption($this->Sisa_Dana_28Baru29);
				} else {
					$doc->exportCaption($this->Tanggal_Diubah);
					$doc->exportCaption($this->Unit_Kerja);
					$doc->exportCaption($this->Akun);
					$doc->exportCaption($this->Tahun);
					$doc->exportCaption($this->Pagu_28Lama29);
					$doc->exportCaption($this->Pagu_28Baru29);
					$doc->exportCaption($this->Realisasi_28Lama29);
					$doc->exportCaption($this->Realisasi_28Baru29);
					$doc->exportCaption($this->Sisa_Dana_28Lama29);
					$doc->exportCaption($this->Sisa_Dana_28Baru29);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->Tanggal_Diubah);
						$doc->exportField($this->Unit_Kerja);
						$doc->exportField($this->Akun);
						$doc->exportField($this->Tahun);
						$doc->exportField($this->Pagu_28Lama29);
						$doc->exportField($this->Pagu_28Baru29);
						$doc->exportField($this->Realisasi_28Lama29);
						$doc->exportField($this->Realisasi_28Baru29);
						$doc->exportField($this->Sisa_Dana_28Lama29);
						$doc->exportField($this->Sisa_Dana_28Baru29);
					} else {
						$doc->exportField($this->Tanggal_Diubah);
						$doc->exportField($this->Unit_Kerja);
						$doc->exportField($this->Akun);
						$doc->exportField($this->Tahun);
						$doc->exportField($this->Pagu_28Lama29);
						$doc->exportField($this->Pagu_28Baru29);
						$doc->exportField($this->Realisasi_28Lama29);
						$doc->exportField($this->Realisasi_28Baru29);
						$doc->exportField($this->Sisa_Dana_28Lama29);
						$doc->exportField($this->Sisa_Dana_28Baru29);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>