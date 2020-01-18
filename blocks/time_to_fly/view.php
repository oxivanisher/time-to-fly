<?php defined('C5_EXECUTE') or die(_("Access Denied.")) ?>

<div>
    <h4>Time to fly</h4>
    <div id="timeToFlySimple"><?php echo t('Loading...')?></div>
    <div id="timeToFlyList">
        <button onclick="timeToFlyRequestList();"><?php echo t('Click to load forecast')?></button>
    </div>
</div>
