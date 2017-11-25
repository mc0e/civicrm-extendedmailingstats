<?php
// $Id$

/*
 +--------------------------------------------------------------------+
 | CiviCRM version 4.2                                                |
 +--------------------------------------------------------------------+
 | Copyright CiviCRM LLC (c) 2004-2012                                |
 +--------------------------------------------------------------------+
 | This file is a part of CiviCRM.                                    |
 |                                                                    |
 | CiviCRM is free software; you can copy, modify, and distribute it  |
 | under the terms of the GNU Affero General Public License           |
 | Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
 |                                                                    |
 | CiviCRM is distributed in the hope that it will be useful, but     |
 | WITHOUT ANY WARRANTY; without even the implied warranty of         |
 | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
 | See the GNU Affero General Public License for more details.        |
 |                                                                    |
 | You should have received a copy of the GNU Affero General Public   |
 | License and the CiviCRM Licensing Exception along                  |
 | with this program; if not, contact CiviCRM LLC                     |
 | at info[AT]civicrm[DOT]org. If you have questions about the        |
 | GNU Affero General Public License or the licensing of CiviCRM,     |
 | see the CiviCRM license FAQ at http://civicrm.org/licensing        |
 +--------------------------------------------------------------------+
*/

/**
 *
 * @package CRM
 * @copyright CiviCRM LLC (c) 2004-2012
 * $Id$
 *
 */
class CRM_ExtendedMailingStats_Form_Report_ExtendedMailingStats extends CRM_Report_Form {

  protected $_summary = NULL;

  # just a toggle we use to build the from
  protected $_mailingidField = FALSE;

  protected $_customGroupExtends = array();


  protected $_charts = array(
    '' => 'Tabular',
    'bar_3dChart' => 'Bar Chart',
  );

  /**
   * Class constructor.
   */
  public function __construct() {
    $this->_columns = array();

    $this->_columns['agc_report_mailing_stats'] = array(
      'dao' => 'CRM_Mailing_DAO_Mailing',
      'fields' => array(
        'mailing_id' => array(
          'title' => ts('Mailing ID'),
          'required' => TRUE,
        ),
        'mailing_name' => array(
          'title' => ts('Mailing Name'),
          'default' => TRUE,
        ),
        'is_completed' => array(
          'title' => ts('Is Completed'),
          'default' => TRUE,
        ),
        'created_date' => array(
          'title' => ts('Date Created'),
          'default' => TRUE,
        ),
        'start' => array(
          'title' => ts('Start Date'),
          'default' => TRUE,
        ),
        'finish' => array(
          'title' => ts('End Date'),
          'default' => TRUE,
        ),
        'recipients' => array(
          'title' => ts('Recipients'),
          'default' => TRUE,
        ),
        'delivered' => array(
          'title' => ts('Delivered'),
          'default' => TRUE,
        ),
        'send_rate' => array(
          'title' => ts('Send Rate'),
          'default' => TRUE,
        ),
        'bounced' => array(
          'title' => ts('Bounced'),
          'default' => TRUE,
        ),
        'opened' => array(
          'title' => ts('Opened'),
          'default' => TRUE,
        ),
        'opened_unique' => array(
          'title' => ts('Opened Unique'),
          'default' => TRUE,
        ),
        'unsubscribed' => array(
          'title' => ts('Unsubscribed'),
          'default' => TRUE,
        ),
        'forwarded' => array(
          'title' => ts('Forwarded'),
          'default' => TRUE,
        ),
        'clicked_total' => array(
          'title' => ts('Clicked Total'),
          'default' => TRUE,
        ),
        'clicked_unique' => array(
          'title' => ts('Clicked Unique'),
          'default' => TRUE,
        ),
        'trackable_urls' => array(
          'title' => ts('Trackable Urls'),
          'default' => TRUE,
        ),
        'clicked_contribution_page' => array(
          'title' => ts('Clicked Contribution Page'),
          'default' => TRUE,
        ),
        'contributions_48hrs_count' => array(
          'title' => ts('Contributions 48hrs Count'),
          'default' => TRUE,
        ),
        'contributions_48hrs_total' => array(
          'title' => ts('Contributions 48hrs Total'),
          'default' => TRUE,
        ),
	      //Gmail
        'gmail_recipients' => array(
          'title' => ts('Gmail Recipients'),
          'default' => TRUE,
        ),
        'gmail_delivered' => array(
          'title' => ts('Gmail Delivered'),
          'default' => TRUE,
        ),
        'gmail_opened' => array(
          'title' => ts('Gmail Opened'),
          'default' => TRUE,
        ),
        'gmail_opened_unique' => array(
          'title' => ts('Gmail Opened Unique'),
          'default' => TRUE,
        ),
        'gmail_clicked_total' => array(
          'title' => ts('Gmail Clicked Total'),
          'default' => TRUE,
        ),
        'gmail_clicked_unique' => array(
          'title' => ts('Gmail Clicked Unique'),
          'default' => TRUE,
        ),
	      //Yahoo
        'yahoo_recipients' => array(
	        'title' => ts('Yahoo Recipients'),
	        'default' => TRUE,
        ),
        'yahoo_delivered' => array(
	        'title' => ts('Yahoo Delivered'),
	        'default' => TRUE,
        ),
        'yahoo_opened' => array(
	        'title' => ts('Yahoo Opened'),
	        'default' => TRUE,
        ),
        'yahoo_opened_unique' => array(
	        'title' => ts('Yahoo Opened Unique'),
	        'default' => TRUE,
        ),
        'yahoo_clicked_total' => array(
	        'title' => ts('Yahoo Clicked Total'),
	        'default' => TRUE,
        ),
        'yahoo_clicked_unique' => array(
	        'title' => ts('Yahoo Clicked Unique'),
	        'default' => TRUE,
        ),
	      //Hotmail
        'hotmail_recipients' => array(
	        'title' => ts('Hotmail Recipients'),
	        'default' => TRUE,
        ),
        'hotmail_delivered' => array(
	        'title' => ts('Hotmail Delivered'),
	        'default' => TRUE,
        ),
        'hotmail_opened' => array(
	        'title' => ts('Hotmail Opened'),
	        'default' => TRUE,
        ),
        'hotmail_opened_unique' => array(
	        'title' => ts('Hotmail Opened Unique'),
	        'default' => TRUE,
        ),
        'hotmail_clicked_total' => array(
	        'title' => ts('Hotmail Clicked Total'),
	        'default' => TRUE,
        ),
        'hotmail_clicked_unique' => array(
	        'title' => ts('Hotmail Clicked Unique'),
	        'default' => TRUE,
        ),
	      //
      ),
      'filters' => array(
        'is_completed' => array(
          'title' => ts('Mailing Status'),
          'operatorType' => CRM_Report_Form::OP_SELECT,
          'type' => CRM_Utils_Type::T_INT,
          'options' => array(
            0 => 'Incomplete',
            1 => 'Complete',
          ),
          //'operator' => 'like',
          'default' => 1,
        ),
        'start' => array(
          'title' => ts('Start Date'),
          'default' => 'this.year',
          'operatorType' => CRM_Report_Form::OP_DATE,
          'type' => CRM_Utils_Type::T_DATE,
        ),
        'finish' => array(
          'title' => ts('End Date'),
          'default' => 'this.year',
          'operatorType' => CRM_Report_Form::OP_DATE,
          'type' => CRM_Utils_Type::T_DATE,
        ),
        'recipients' => array(
          'title' => ts('Number of Recipients'),
          'operatorType' => CRM_Report_Form::OP_INT,
          'type' => CRM_Utils_Type::T_INT,
        ),
        'Clicked_contribution_page' => array(
          'title' => ts('Clicked Contribution Page?'),
          'operatorType' => CRM_Report_Form::OP_INT,
          'type' => CRM_Utils_Type::T_INT,
        ),
      ),
    );

    $this->_columns['civicrm_mailing'] = array(
      'fields' => array(
        'mailing_campaign_id' => array(
          'title' => ts('Campaign'),
          'name' => 'campaign_id',
          'type' => CRM_Utils_Type::T_INT,
        ),
      ),
      'filters' => array(
        'mailing_campaign_id' => array(
          'title' => ts('Campaign'),
          'name' => 'campaign_id',
          'operatorType' => CRM_Report_Form::OP_MULTISELECT,
          'type' => CRM_Utils_Type::T_INT,
          'options' => CRM_Mailing_BAO_Mailing::buildOptions('campaign_id'),
        ),
      ));

    parent::__construct();
  }

  function mailing_select() {

    $data = array();

    $mailing = new CRM_Mailing_BAO_Mailing();
    $query = "SELECT name FROM civicrm_mailing WHERE sms_provider_id IS NULL";
    $mailing->query($query);

    while ($mailing->fetch()) {
      $data[mysql_real_escape_string($mailing->name)] = $mailing->name;
    }

    return $data;
  }

  // function preProcess() {
  //   $this->assign('chartSupported', TRUE);
  //   parent::preProcess();
  // }

  // manipulate the select function to query count functions
/*  function select() {

    $count_tables = array(
      'agc_report_mailing_stats',
    );

    $select = array();
    $this->_columnHeaders = array();
    foreach ($this->_columns as $tableName => $table) {
      if (array_key_exists('fields', $table)) {
        foreach ($table['fields'] as $fieldName => $field) {
          if (CRM_Utils_Array::value('required', $field) ||
            CRM_Utils_Array::value($fieldName, $this->_params['fields'])
          ) {

            # for statistics
            if (CRM_Utils_Array::value('statistics', $field)) {
              switch ($field['statistics']['calc']) {
                case 'PERCENTAGE':
                  $base_table_column = explode('.', $field['statistics']['base']);
                  $top_table_column = explode('.', $field['statistics']['top']);

                  $select[] = "CONCAT(round(
                                        count(DISTINCT {$this->_columns[$top_table_column[0]]['fields'][$top_table_column[1]]['dbAlias']}) /
                                        count(DISTINCT {$this->_columns[$base_table_column[0]]['fields'][$base_table_column[1]]['dbAlias']}) * 100, 2
                                    ), '%') as {$tableName}_{$fieldName}";
                  break;
              }
            }
            else {
              if (in_array($tableName, $count_tables)) {
                $select[] = "count(DISTINCT {$field['dbAlias']}) as {$tableName}_{$fieldName}";
              }
              else {
                $select[] = "{$field['dbAlias']} as {$tableName}_{$fieldName}";
              }
            }
            $this->_columnHeaders["{$tableName}_{$fieldName}"]['type'] = CRM_Utils_Array::value('type', $field);
            $this->_columnHeaders["{$tableName}_{$fieldName}"]['title'] = $field['title'];
          }
        }
      }
    }

    $this->_select = "SELECT " . implode(', ', $select) . " ";
    //print_r($this->_select);
  }
*/
  function from() {

    $this->_from = "
      FROM agc_report_mailing_stats {$this->_aliases['agc_report_mailing_stats']}
      LEFT JOIN civicrm_mailing {$this->_aliases['civicrm_mailing']} ON
        {$this->_aliases['agc_report_mailing_stats']}.mailing_id = {$this->_aliases['civicrm_mailing']}.id
      ";
    // need group by and order by

    //print_r($this->_from);
  }

  function where() {
    $clauses = array();
    //to avoid the sms listings
    $clauses[] = "{$this->_aliases['agc_report_mailing_stats']}.sms_provider_id IS NULL";

    foreach ($this->_columns as $tableName => $table) {
      if (array_key_exists('filters', $table)) {
        foreach ($table['filters'] as $fieldName => $field) {
          $clause = NULL;
          if (CRM_Utils_Array::value('type', $field) & CRM_Utils_Type::T_DATE) {
            $relative = CRM_Utils_Array::value("{$fieldName}_relative", $this->_params);
            $from     = CRM_Utils_Array::value("{$fieldName}_from", $this->_params);
            $to       = CRM_Utils_Array::value("{$fieldName}_to", $this->_params);

            $clause = $this->dateClause($field['name'], $relative, $from, $to, $field['type']);
          }
          else {
            $op = CRM_Utils_Array::value("{$fieldName}_op", $this->_params);

            if ($op) {
              if ($fieldName == 'relationship_type_id') {
                $clause = "{$this->_aliases['civicrm_relationship']}.relationship_type_id=" . $this->relationshipId;
              }
              else {
                $clause = $this->whereClause($field,
                  $op,
                  CRM_Utils_Array::value("{$fieldName}_value", $this->_params),
                  CRM_Utils_Array::value("{$fieldName}_min", $this->_params),
                  CRM_Utils_Array::value("{$fieldName}_max", $this->_params)
                );
              }
            }
          }

          if (!empty($clause)) {
            if (CRM_Utils_Array::value('having', $field)) {
              $havingClauses[] = $clause;
            }
            else {
              $whereClauses[] = $clause;
            }
          }
        }
      }
    }

    if (empty($whereClauses)) {
      $this->_where = "WHERE ( 1 ) ";
      $this->_having = "";
    }
    else {
      $this->_where = "\nWHERE " . implode("\n    AND ", $whereClauses);
    }


    // if ( $this->_aclWhere ) {
    // $this->_where .= " AND {$this->_aclWhere} ";
    // }

    if (!empty($havingClauses)) {
      // use this clause to construct group by clause.
      $this->_having = "\nHAVING " . implode(' AND ', $havingClauses);
    }

  }

  // function groupBy() {
  //   $this->_groupBy = "\nGROUP BY {$this->_aliases['civicrm_mailing']}.id";
  // }

  // function having() {
  //   $this->_having = "";
  // }


  function orderBy() {
    $this->_orderBy = "\nORDER BY {$this->_aliases['agc_report_mailing_stats']}.finish DESC\n";
  }

  function postProcess() {

    $this->beginPostProcess();

    // get the acl clauses built before we assemble the query
    $this->buildACLClause(CRM_Utils_Array::value('civicrm_contact', $this->_aliases));

    $sql = $this->buildQuery(TRUE);

    $rows = $graphRows = array();
    $this->buildRows($sql, $rows);

    $this->formatDisplay($rows);
    $this->doTemplateAssignment($rows);
    $this->endPostProcess($rows);
  }


  function alterDisplay(&$rows) {
    // custom code to alter rows
    $entryFound = FALSE;
    foreach ($rows as $rowNum => $row) {

      // Link mailing name to Civimail Report
      if (array_key_exists('civicrm_mailing_name', $row) &&
        array_key_exists('civicrm_mailing_id', $row)
      ) {
        $url = CRM_Report_Utils_Report::getNextUrl('civicrm/mailing/report',
            'reset=1&mid=' . $row['civicrm_mailing_id'],
            $this->_absoluteUrl, $this->_id
        );
        $rows[$rowNum]['civicrm_mailing_name_link'] = $url;
        $rows[$rowNum]['civicrm_mailing_name_hover'] = ts("View CiviMail Report for this mailing.");
        $entryFound = TRUE;
      }

      if (!empty($row['civicrm_mailing_mailing_campaign_id'])) {
        $campaigns = CRM_Mailing_BAO_Mailing::buildOptions('campaign_id');
        $rows[$rowNum]['civicrm_mailing_mailing_campaign_id'] = $campaigns[$row['civicrm_mailing_mailing_campaign_id']];
        $entryFound = TRUE;
      }

      // skip looking further in rows, if first row itself doesn't
      // have the column we need
      if (!$entryFound) {
        break;
      }
    }
  }
}

