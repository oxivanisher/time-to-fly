<?php

defined('C5_EXECUTE') or die('Access Denied.');

Route::register('/api/timetofly/get/simple', '\Application\Controller\CalculateTime::getSimple');
Route::register('/api/timetofly/get/list', '\Application\Controller\CalculateTime::getList');
