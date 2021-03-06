<?php
// $Id$
//
// Mediashare by Jorn Lind-Nielsen (C)
//

require_once 'modules/mediashare/common-edit.php';

function mediashare_source_zipapi_getTitle()
{
    $dom = ZLanguage::getModuleDomain('mediashare');
    return __('Zip upload', $dom);
}

function mediashare_source_zipapi_addMediaItem($args)
{
    $dom = ZLanguage::getModuleDomain('mediashare');

    if (!isset($args['albumId'])) {
        return LogUtil::registerError(__f('Missing [%1$s] in \'%2$s\'', array('albumId', 'source_zipapi.addMediaItem'), $dom));
    }

    $uploadFilename = $args['uploadFilename'];

    $args['mediaFilename'] = $uploadFilename;

    $result = pnModAPIFunc('mediashare', 'edit', 'addMediaItem', $args);

    unlink($uploadFilename);

    return $result;
}

function mediashareSourceZipParseIni($ini)
{
    $l = strlen($ini);
    if ($ini[$l - 1] == 'M' || $ini[$l - 1] == 'm') {
        return intval($ini) * 1000000;
    } else if ($ini[$l - 1] == 'K' || $ini[$l - 1] == 'k') {
        return intval($ini) * 1000;
    }
    return intval($ini);
}

function mediashare_source_zipapi_getUploadInfo()
{
    if (!($userInfo = pnModAPIFunc('mediashare', 'edit', 'getUserInfo'))) {
        return false;
    }

    $upload_max_filesize = mediashareSourceZipParseIni(ini_get('upload_max_filesize'));
    if ($userInfo['totalCapacityLeft'] < $upload_max_filesize) {
        $upload_max_filesize = $userInfo['totalCapacityLeft'];
    }
    if ($userInfo['mediaSizeLimitSingle'] < $upload_max_filesize) {
        $upload_max_filesize = $userInfo['mediaSizeLimitSingle'];
    }

    $post_max_size = mediashareSourceZipParseIni(ini_get('post_max_size'));
    if ($userInfo['totalCapacityLeft'] < $post_max_size) {
        $post_max_size = $userInfo['totalCapacityLeft'];
    }

    return array('post_max_size'       => (int)($post_max_size / 1000),
                 'upload_max_filesize' => (int)($upload_max_filesize / 1000));
}
