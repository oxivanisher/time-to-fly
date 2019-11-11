<?php

namespace Concrete\Package\TimeToFly;

use Concrete\Core\Block\BlockType\BlockType;
use Concrete\Core\Package\Package;

defined('C5_EXECUTE') or die('Access Denied.');

class Controller extends Package
{

    protected $appVersionRequired = '8';
    protected $pkgHandle = 'time_to_fly';
    protected $pkgVersion = '0.9.2';

    /**
     * Map folders to PHP namespaces, for automatic class autoloading.
     *
     * @var array
     *protected $pkgAutoloaderRegistries = [
     *  'src' => 'MyShops',
     *];
     */

    /**
     * {@inheritdoc}
     *
     * @see \Concrete\Core\Package\Package::getPackageName()
     */
    public function getPackageName()
    {
        return t('Time To fly');
    }

    /**
     * {@inheritdoc}
     *
     * @see \Concrete\Core\Package\Package::getPackageDescription()
     */
    public function getPackageDescription()
    {
        return t('When will it be time to fly');
    }

    /**
     * {@inheritdoc}
     *
     * @see \Concrete\Core\Package\Package::install()
     */
    public function install()
    {
        $pkg = parent::install();

        // Install blocks
        if ( ! is_object(BlockType::getByHandle('time_to_fly'))) {
            BlockType::installBlockType('time_to_fly', $pkg);
        }
    }

    public function uninstall() {

        parent::uninstall();

    }
}
