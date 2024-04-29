<?php

namespace Inndividuell\ContaoJobsExtension;


use Contao\Config;
use Contao\Input;
use Contao\PageModel;
use Contao\Module;
use Contao\FilesModel;
use Contao\Image;
class ModuleJobList extends \Module
{
    protected $strTemplate = 'mod_inn_jobs_list';
    public function generate()
    {

        return parent::generate(); // TODO: Change the autogenerated stub
    }

    protected function compile()
    {
        $detail_page = $this->inn_jobslist_detail_page;
        $detail_page_obj = PageModel::findByPk($detail_page);
        $detail_page_url  = str_replace('.html','/',$detail_page_obj->getAbsoluteUrl());
        $button_text = $this->inn_jobslist_detail_button_text;
        $sorting = $this->inn_jobslist_sorting;
        $limit = $this->inn_jobslist_limit;
        $new_items = $this->inn_jobslist_items_new;
        $new_items_show = $this->inn_jobslist_items_new_show;
        $order_by = 'id DESC';
        $limit_sql = '';
        if($sorting == 'alphabet') {
            $order_by = 'name ASC';
        }
        if($limit != 0){
            $limit_sql = 'LIMIT '.$limit;
        }
        $sql_string = 'SELECT tl_inn_jobs.*,tl_inn_jobs_type.title as job_type_title FROM tl_inn_jobs  LEFT JOIN tl_inn_jobs_type ON tl_inn_jobs.job_type = tl_inn_jobs_type.id  WHERE tl_inn_jobs.published=1 ORDER BY '.$order_by.' '.$limit_sql;

        $items = $this->Database->query($sql_string)->fetchAllAssoc();
        $this->Template->limit = $limit;
        $this->Template->items = $items;
        $this->Template->detail_page_url = $detail_page_url;
        $this->Template->button_text = $button_text;
        $this->Template->cta_headline = $this->inn_jobslist_cta_headline;
        $this->Template->cta_position = $this->inn_jobslist_cta_position;
        $this->Template->cta_button_text = $this->inn_jobslist_cta_button_text;
        $this->Template->cta_button_url = $this->inn_jobslist_cta_button_url;

        if($this->inn_jobslist_add_image && ($objImage = FilesModel::findByUuid($this->inn_jobslist_add_image)) !== null)
        {
            $this->Template->add_image = Image::getHtml(\System::getContainer()->get('contao.image.image_factory')->create(TL_ROOT . '/' . $objImage->path, array("",""))->getUrl(TL_ROOT));
        }
    }

}
class_alias(ModuleJobList::class, 'ModuleJobList');
