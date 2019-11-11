<?php

namespace Application\Block\TimeToFly;

defined('C5_EXECUTE') or die('Access Denied.');

use Concrete\Core\Block\BlockController;

class Controller extends BlockController
{
    public function getBlockTypeName()
    {
        return t('Time to fly');
    }

    public function getBlockTypeDescription()
    {
        return t('When will it be time to fly?');
    }

}

// Required. This file contains a PHP class for this block type, which in turn contains vital information about the block type, including its name, description, dialog interface dimensions, and more. Additionally, different methods defined in the class can pass data through to the add, edit or view templates, and specify how the block saves its data.
