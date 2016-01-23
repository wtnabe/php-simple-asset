<?php

require_once 'test_helper.php';

class SimpleAssetUtilTest extends \PHPUnit_Framework_TestCase
{
    function testJoinpath()
    {
        $this->assertEquals('foo/bar',
                            SimpleAssetUtil::joinpath('foo', 'bar'));
        $this->assertEquals('foo/bar',
                            SimpleAssetUtil::joinpath('foo/', '/bar'));
        $this->assertEquals('foo/bar',
                            SimpleAssetUtil::joinpath('foo', '', 'bar'));
        $this->assertEquals('foo/bar',
                            SimpleAssetUtil::joinpath(null, 'foo', null, 'bar', null));
        $this->assertEquals('foo/bar',
                            SimpleAssetUtil::joinpath('', 'foo', null, 'bar', ''));
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
