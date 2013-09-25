<?php
// This file declares a managed database record of type "ReportTemplate".
// The record will be automatically inserted, updated, or deleted from the
// database as appropriate. For more details, see "hook_civicrm_managed" at:
// http://wiki.civicrm.org/confluence/display/CRMDOC42/Hook+Reference
return array (
  0 => 
  array (
    'name' => 'CRM_Mailingstats_Form_Report_ExtendedMailing',
    'entity' => 'ReportTemplate',
    'params' => 
    array (
      'version' => 3,
      'label' => 'ExtendedMailing',
      'description' => 'ExtendedMailing (au.org.greens.mailingstats)',
      'class_name' => 'CRM_Mailingstats_Form_Report_ExtendedMailing',
      'report_url' => 'au.org.greens.mailingstats/extendedmailing',
      'component' => 'CiviMail',
    ),
  ),
);