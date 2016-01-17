<?php
require_once 'test_helper.php';

class SimpleAssetTest extends \PHPUnit_Framework_TestCase
{
    function setUp()
    {
        SimpleAsset::config(array('store'    => 'file',
                                  'manifest' => dirname(__FILE__).'/support/manifest.json'));
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

    function testPath_with_correct_path()
    {
        $this->assertEquals(
                            '/stylesheets/common.css?012345',
                            SimpleAsset::path('/stylesheets/common.css')
                            );
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
