<?php
/* ====================
Copyright (c) 2008, Vladimir Sibirov.
All rights reserved. Distributed under BSD License.
[BEGIN_SED]
File=plugins/tags/tags.index.php
Version=0.0.2
Updated=2008-dec-23
Type=Plugin
Author=Trustmaster
Description=
[END_SED]

[BEGIN_SED_EXTPLUGIN]
Code=tags
Part=index
File=tags.index
Hooks=index.tags
Tags=index.tpl:{INDEX_TAG_CLOUD},{INDEX_TOP_TAG_CLOUD}
Minlevel=0
Order=10
[END_SED_EXTPLUGIN]
==================== */
if (!defined('SED_CODE')) { die('Wrong URL.'); }

if($cfg['plugin']['tags']['pages'])
{
	require_once sed_langfile('tags');
	require_once $cfg['plugins_dir'].'/tags/inc/config.php';
	$limit = $cfg['plugin']['tags']['lim_index'] == 0 ? null : (int) $cfg['plugin']['tags']['lim_index'];
	$tcloud = sed_tag_cloud('pages', $cfg['plugin']['tags']['order'], $limit);
	$tc_html = '<link rel="stylesheet" type="text/css" href="'.$cfg['plugins_dir'].'/tags/style.css" />
		<div class="tag_cloud">';
	foreach($tcloud as $tag => $cnt)
	{
		$tag_count++;
		$tag_t = $cfg['plugin']['tags']['title'] ? sed_tag_title($tag) : $tag;
		$tag_u = sed_urlencode($tag, $cfg['plugin']['tags']['translit']);
		$tl = $lang != 'en' && $tag_u != urlencode($tag) ? '&tl=1' : '';
		foreach($tc_styles as $key => $val)
		{
			if($cnt <= $key)
			{
				$dim = $val;
				break;
			}
		}
		$tc_html .= '<a href="'.sed_url('plug', 'e=tags&a=pages&t='.$tag_u.$tl).'" class="'.$dim.'">'.sed_cc($tag_t).'</a> ';
	}
	$tc_html .= '</div>';
	$tc_html = ($tag_count > 0) ? $tc_html : $L['tags_Tag_cloud_none'];
	$t->assign(array(
	'INDEX_TAG_CLOUD' => $tc_html,
	'INDEX_TOP_TAG_CLOUD' => $L['tags_Tag_cloud']
	));
}
?>