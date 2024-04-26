<?php

use Contao\Backend;
use Contao\BackendUser;
use Contao\CalendarBundle\Security\ContaoCalendarPermissions;
use Contao\Controller;
use Contao\DataContainer;
use Contao\System;

$GLOBALS['TL_DCA']['tl_module']['palettes']['jobslist']         = '{title_legend},name,type;{config_legend},inn_jobslist_items,inn_jobslist_sorting,inn_jobslist_limit,inn_jobslist_detail_button_text;{expert_legend:hide},guests,cssID';
$GLOBALS['TL_DCA']['tl_module']['palettes']['jobsreader']         = '{title_legend},name,type;{config_legend},inn_jobsreader_duties_headline,inn_jobsreader_requirements_headline,inn_jobsreader_back_link_text,inn_jobsreader_back_link_page,inn_jobsreader_application_link,inn_jobsreader_email_link,inn_jobsreader_whatsapp_link;{expert_legend:hide},guests,cssID';

$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_duties_headline'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_requirements_headline'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true),
    'sql'                     => "text NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_back_link_text'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_application_link'] = array
(
    'sql' => "int(10) unsigned NOT NULL default '0'",
    'inputType' => 'pageTree',
    'eval' => array('fieldType' => 'radio', 'mandatory' => false)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_email_link'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>false),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_whatsapp_link'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>false),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobsreader_back_link_page'] = array
(
    'sql' => "int(10) unsigned NOT NULL default '0'",
    'inputType' => 'pageTree',
    'eval' => array('fieldType' => 'radio', 'mandatory' => true)
);



$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobslist_items'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>true),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobslist_sorting'] = array
(
    'exclude'                 => true,
    'inputType'               => 'select',
    'eval'                    => array('mandatory'=>true),
    'options'                    => array(
        'newest' => 'Neue Jobs zuerst',
        'alphabet' => 'Alphabetisch nach Namen',
    ),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobslist_limit'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>false),
    'sql'                     => "text NULL"
);
$GLOBALS['TL_DCA']['tl_module']['fields']['inn_jobslist_detail_button_text'] = array
(
    'exclude'                 => true,
    'inputType'               => 'text',
    'eval'                    => array('mandatory'=>false),
    'sql'                     => "text NULL"
);
