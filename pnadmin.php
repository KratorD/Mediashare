<?php
// $Id$
// =======================================================================
// Mediashare by Jorn Lind-Nielsen (C) 2005.
// =======================================================================


require_once 'modules/mediashare/common-edit.php';
require_once 'modules/mediashare/elfisk/elfisk_common.php';

// =======================================================================
// General settings
// =======================================================================


function mediashare_admin_main($args)
{
    $dom = ZLanguage::getModuleDomain('mediashare');

    if (!SecurityUtil::checkPermission('mediashare::', '::', ACCESS_ADMIN)) {
        return mediashareErrorPage(__FILE__, __LINE__, __('You do not have access to this feature', $dom));
    }

    if (isset($_POST['saveButton']) || isset($_POST['templateButton'])) {
        return mediashareAdminSettings($args);
    }

    if (!pnModAPILoad('mediashare', 'user')) {
        return mediashareErrorPage(__FILE__, __LINE__, 'Failed to load Mediashare user API');
    }

    $settings = pnModAPIFunc('mediashare', 'user', 'getSettings');
    if ($settings === false) {
        return mediashareErrorAPIGet();
    }

    $render = & pnRender::getInstance('mediashare');
    array_push($render->plugins_dir, "modules/mediashare/elfisk/plugins");
    //$render = & pnRender::getInstance('mediashare');

    $render->caching = false;
    $render->assign($settings);
    $render->assign('openBaseDir', ini_get('open_basedir'));
    $render->assign('currentDir', dirname(__FILE__));
    $render->assign('fileUploadsAllowed', ini_get('file_uploads'));
    $render->assign('tmpDirIsWritable', mediashareDirIsWritable($settings['tmpDirName']));
    $render->assign('mediaDirIsWritable', mediashareDirIsWritable($settings['mediaDirName']));

    return $render->fetch('mediashare_admin_main.html');
}

function mediashareDirIsWritable($dir)
{
    return is_dir($dir) && is_writable($dir);
}

function mediashareAdminSettings($args)
{
    if (!pnModAPILoad('mediashare', 'user')) {
        return mediashareErrorPage(__FILE__, __LINE__, 'Failed to load Mediashare user API');
    }

    $settings = array(
        'tmpDirName' => FormUtil::getPassedValue('tmpDirName'),
        'mediaDirName' => FormUtil::getPassedValue('mediaDirName'),
        'thumbnailSize' => FormUtil::getPassedValue('thumbnailSize'),
        'previewSize' => FormUtil::getPassedValue('previewSize'),
        'mediaSizeLimitSingle' => (int) FormUtil::getPassedValue('mediaSizeLimitSingle'),
        'mediaSizeLimitTotal' => (int) FormUtil::getPassedValue('mediaSizeLimitTotal'),
        'defaultAlbumTemplate' => FormUtil::getPassedValue('defaultAlbumTemplate'),
        'allowTemplateOverride' => FormUtil::getPassedValue('allowTemplateOverride'),
        'enableSharpen' => FormUtil::getPassedValue('enableSharpen'),
        'enableThumbnailStart' => FormUtil::getPassedValue('enableThumbnailStart'),
        'flickrAPIKey' => FormUtil::getPassedValue('flickrAPIKey'),
        'smugmugAPIKey' => FormUtil::getPassedValue('smugmugAPIKey'),
        'photobucketAPIKey' => FormUtil::getPassedValue('photobucketAPIKey'),
        'picasaAPIKey' => FormUtil::getPassedValue('picasaAPIKey'),
        'vfs' => FormUtil::getPassedValue('vfs'));

    $ok = pnModAPIFunc('mediashare', 'user', 'setSettings', $settings);
    if ($ok === false) {
        return mediashareErrorAPIGet();
    }
    if (FormUtil::getPassedValue('templateButton')) {
        $ok = pnModAPIFunc('mediashare', 'admin', 'setTemplateGlobally', array('template' => $settings['defaultAlbumTemplate']));
        if ($ok === false) {
            return mediashareErrorAPIGet();
        }
    }

    pnRedirect(pnModURL('mediashare', 'admin', 'main'));
    return true;
}

// =======================================================================
// Plugins
// =======================================================================


function mediashare_admin_plugins($args)
{
    $dom = ZLanguage::getModuleDomain('mediashare');

    if (!SecurityUtil::checkPermission('mediashare::', '::', ACCESS_ADMIN)) {
        return mediashareErrorPage(__FILE__, __LINE__, __('You do not have access to this feature', $dom));
    }
    if (isset($_POST['scanButton'])) {
        return mediashareAdminScanPlugins();
    }
    if (!pnModAPILoad('mediashare', 'mediahandler')) {
        return mediashareErrorPage(__FILE__, __LINE__, 'Failed to load Mediashare mediahandler API');
    }
    if (!pnModAPILoad('mediashare', 'sources')) {
        return mediashareErrorPage(__FILE__, __LINE__, 'Failed to load Mediashare sources API');
    }
    $mediaHandlers = pnModAPIFunc('mediashare', 'mediahandler', 'getMediaHandlers');
    if ($mediaHandlers === false) {
        return mediashareErrorAPIGet();
    }
    $sources = pnModAPIFunc('mediashare', 'sources', 'getSources');
    if ($sources === false) {
        return mediashareErrorAPIGet();
    }
    $render = & pnRender::getInstance('mediashare');
    $render->caching = false;
    $render->assign('mediaHandlers', $mediaHandlers);
    $render->assign('sources', $sources);

    return $render->fetch('mediashare_admin_plugins.html');
}

function mediashareAdminScanPlugins()
{
    if (!pnModAPILoad('mediashare', 'admin')) {
        return mediashareErrorPage(__FILE__, __LINE__, 'Failed to load Mediashare admin API');
    }
    $ok = pnModAPIFunc('mediashare', 'admin', 'scanAllPlugins');
    if ($ok === false) {
        return mediashareErrorAPIGet();
    }
    pnRedirect(pnModURL('mediashare', 'admin', 'plugins'));
    return true;
}

// =======================================================================
// Recalculate images
// =======================================================================


function mediashare_admin_recalc($args)
{
    $dom = ZLanguage::getModuleDomain('mediashare');

    if (!SecurityUtil::checkPermission('mediashare::', '::', ACCESS_ADMIN)) {
        return mediashareErrorPage(__FILE__, __LINE__, __('You do not have access to this feature', $dom));
    }
    if (isset($_POST['recalcButton'])) {
        return mediashareAdminRecalculate($args);
    }
    if (!pnModAPILoad('mediashare', 'user')) {
        return mediashareErrorPage(__FILE__, __LINE__, 'Failed to load Mediashare user API');
    }
    $allItems = pnModAPIFunc('mediashare', 'user', 'getList', array('pageSize' => 999999999));

    $render = & pnRender::getInstance('mediashare');
    $render->caching = false;
    $render->assign('allItems', $allItems);

    return $render->fetch('mediashare_admin_recalc.html');
}

function mediashare_admin_recalcitem($args)
{
    $dom = ZLanguage::getModuleDomain('mediashare');

    if (!SecurityUtil::checkPermission('mediashare::', '::', ACCESS_ADMIN)) {
        return mediashareErrorPage(__FILE__, __LINE__, __('You do not have access to this feature', $dom));
    }

    $mediaId = mediashareGetIntUrl('id');

    $ok = pnModAPIFunc('mediashare', 'edit', 'recalcItem', array('mediaId' => $mediaId));
    if ($ok === false) {
        return mediashareErrorAPIGet();
    }
    $mediaItem = pnModAPIFunc('mediashare', 'user', 'getMediaItem', array('mediaId' => $mediaId));
    if ($mediaItem === false) {
        return mediashareErrorAPIGet();
    }

    $render = & pnRender::getInstance('mediashare');
    $render->caching = false;
    $render->assign('item', $mediaItem);

    echo $render->fetch('mediashare_admin_recalcitem.html');

    return true;
}


