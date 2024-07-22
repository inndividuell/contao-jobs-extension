<?php
use Inndividuell\ContaoJobsExtension\ModuleJobReader;
use Inndividuell\ContaoJobsExtension\ModuleJobList;
/**
 * Back end modules
 */
array_insert($GLOBALS['BE_MOD'], 1, array
(
    'inn_jobs_menu' => array
    ()
));
$GLOBALS['BE_MOD']['inn_jobs_menu']['inn_jobs'] = array(
    'tables' => array('tl_inn_jobs')
);
$GLOBALS['BE_MOD']['inn_jobs_menu']['inn_jobs_categories'] = array(
    'tables' => array('tl_inn_jobs_category')
);
$GLOBALS['BE_MOD']['inn_jobs_menu']['tl_inn_jobs_types'] = array(
    'tables' => array('tl_inn_jobs_type')
);

$GLOBALS['FE_MOD']['inn_jobs'] = array
(
    'jobsreader'    => ModuleJobReader::class,
    'jobslist'    => ModuleJobList::class
);

//
//$GLOBALS['BE_MOD']['inn_fewo']['inn_fewo_services'] = array(
//    'tables' => array('tl_inn_fewo_services')
//);

