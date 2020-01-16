<?php

defined('C5_EXECUTE') or die('Access Denied.');

Route::register('/api/timetofly/get/simple', '\Concrete\Package\TimeToFly\Controller\CalculateTime::getSimple');
Route::register('/api/timetofly/get/list', '\Concrete\Package\TimeToFly\Controller\CalculateTime::getList');
