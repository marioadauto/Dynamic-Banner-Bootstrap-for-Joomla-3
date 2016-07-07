<?php
defined('_JEXEC') or die;
class ModBanner
{
    public static function getList($params)
    {
        JModelLegacy::addIncludePath(JPATH_ROOT . '/components/com_banners/models', 'BannersModel');
        $document = JFactory::getDocument();
        $app      = JFactory::getApplication();
        $model = JModelLegacy::getInstance('Banners', 'BannersModel', array('ignore_request' => true));
        $model->setState('filter.client_id', (int) $params->get('cid'));
        $model->setState('filter.category_id', $params->get('catid', array()));
        $model->setState('list.limit', (int) $params->get('quantidade', 1));
        $model->setState('list.start', 0);
        $model->setState('filter.ordering', $params->get('ordering'));
        $model->setState('filter.tag_search', $params->get('tag_search'));
        $model->setState('filter.language', $app->getLanguageFilter());
        $banners = $model->getItems();
        $model->impress();
        return $banners;
    }
}
