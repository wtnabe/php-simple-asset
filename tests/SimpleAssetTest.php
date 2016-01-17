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
