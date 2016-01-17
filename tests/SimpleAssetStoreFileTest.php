<?php
require_once 'test_helper.php';

class SimpleAssetStoreFileTest extends \PHPUnit_Framework_TestCase
{
    var $store;

    function setUp()
    {
        $this->store = new SimpleAssetStoreFile(array('store_dir' => dirname(__FILE__).'/support'));
    }

    function testDigestFile()
    {
        // number of slashes will be ignored
        $this->assertEquals($this->store->_digestFile('stylesheets//common.css'),
                            $this->store->_digestFile('/stylesheets/common.css'));
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
