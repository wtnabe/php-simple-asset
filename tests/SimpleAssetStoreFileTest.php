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

    function testStoreDigestToFile()
    {
        $store = new SimpleAssetStoreFile(array('store_dir' => dirname(__FILE__).'/_digests'));

        $path = 'path/to/file.css';
        $digest_path = $store->_digestFile($path);
        @unlink($digest_path);

        $this->assertEquals('12345',
                            $store->storeDigestToFile($path, '12345'));
        $this->assertTrue(file_exists($digest_path));
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
