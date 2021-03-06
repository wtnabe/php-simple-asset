<?php
require_once 'test_helper.php';

class SimpleAssetTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
        SimpleAsset::config(array());
        system('rm -fr '.dirname(__FILE__).'/_digests/*');
    }

    function tearDown()
    {
        SimpleAsset::config(array());
    }

    function testConfig_with_args()
    {
        $this->assertEquals(
                            array('foo' => 'bar'),
                            SimpleAsset::config(array('foo' => 'bar')));
        $this->assertEquals(array('foo' => 'bar'),
                            SimpleAsset::config());
    }

    function testConfigWithoutArgs()
    {
        SimpleAsset::config(array('store'     => 'file',
                                  'store_dir' => dirname(__FILE__).'/support'));

        $config = SimpleAsset::config();
        $this->assertTrue(is_array($config));
        $this->assertTrue(sizeof($config) > 0);
    }

    function testConfigWithEmptyArray()
    {
        $config = SimpleAsset::config(array());

        $this->assertTrue(sizeof($config) == 0);
    }

    function testConfigWithArray()
    {
        SimpleAsset::config(array());
        $this->assertEquals(array('foo' => 'bar'),
                            SimpleAsset::config(array('foo' => 'bar')));
    }

    function testConfigWithName()
    {
        $this->assertEquals(array('foo' => 'bar'),
                            SimpleAsset::config(array('foo' => 'bar')));
        $this->assertEquals('bar', SimpleAsset::config('foo'));
    }

    function testPath_with_correct_path()
    {
        SimpleAsset::config(array('store'     => 'file',
                                  'store_dir' => dirname(__FILE__).'/support'));

        $this->assertEquals(
                            '/stylesheets/common.css?012345',
                            SimpleAsset::path('/stylesheets/common.css')
                            );
    }

    function testPrecompile()
    {
        $store_dir = dirname(__FILE__).'/_digests/';

        SimpleAsset::precompile(array('store' => 'file',
                                      'store_dir' => $store_dir,
                                      'asset_dir' => dirname(__FILE__).'/public/'));
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
