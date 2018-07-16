<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl);

    $postbirdIcp = new Typecho_Widget_Helper_Form_Element_Text('postbirdIcp', NULL, NULL, _t('网站备案号'), _t('网站备案号在页面底部显示，为空则不显示'));
    $form->addInput($postbirdIcp);

// 暂时去掉了 缩略图
//    $postbirdThumbnail = new Typecho_Widget_Helper_Form_Element_Text('postbirdThumbnail', NULL, NULL, _t('默认缩略图'), _t('为空则显示默认的缩略图显示样式（由CSS控制）'));
//    $form->addInput($postbirdThumbnail);

    $postbirdStylesheet = new Typecho_Widget_Helper_Form_Element_Textarea('postbirdStylesheet', NULL, NULL, _t('自定义 stylesheet 样式'), _t('这个样式会在覆盖之前的样式（主题文件中未使用内联css）,<span style="color:red;">不需要使用 style 标签嵌套</span>'));
    $form->addInput($postbirdStylesheet);

    $postbirdScript = new Typecho_Widget_Helper_Form_Element_Textarea('postbirdScript', NULL, NULL, _t('自定义脚本'), _t('脚本会在页面底部加载,可以将百度统计等第三方脚本放在这里,<span style="color:red;">必须使用 script 标签包裹</span>'));
    $form->addInput($postbirdScript);

    $postbirdUseCDNSelect = new Typecho_Widget_Helper_Form_Element_Checkbox('postbirdUseCDNSelect',
        array('postbirdUseCDN' => _t('启用')),
        array('postbirdUseCDN'), _t('使用公共CDN加载部分资源'));
    $form->addInput($postbirdUseCDNSelect);

    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示内容'));
    
    $form->addInput($sidebarBlock->multiMode());
}


function themeFields($layout)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $layout->addItem($logoUrl);
}

// 将文章首张图片作为缩略图
function get_postthumb($obj) {
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );  //通过正则式获取图片地址
    $thumb = false;
    if(isset($matches[1][0])){
        $thumb = $matches[1][0];
    }
    return $thumb;
}