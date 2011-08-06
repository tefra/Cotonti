<?php
/* ====================
[BEGIN_COT_EXT]
Code=i18n
Name=Content Internationalization
Description=Enables site contents translation into multiple languages
Version=0.9.1
Date=2011-07-11
Author=Trustmaster
Copyright=Copyright (c) Cotonti Team 2010-2011
Notes=BSD License
Auth_guests=R
Lock_guests=12345A
Auth_members=RW
Lock_members=
Requires_modules=page
Recommends_plugins=search,tags
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
cats=01:string:::Category codes
locales=02:text::en|English:Site locales
omitmain=03:radio::1:Omit language parameter in the URL if pointing to main language
rewrite=04:radio::0:Enable URL overwrite for language parameter
[END_COT_EXT_CONFIG]
==================== */

defined('COT_CODE') or die('Wrong URL');

?>