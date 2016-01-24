<?php
class SimpleAssetFilesTest extends \PHPUnit_Framework_TestCase
{
    function testGlob()
    {
        SimpleAsset::config(array('asset_dir' => dirname(__FILE__).'/public'));

        $files = new SimpleAssetFiles();
        $paths = $files->glob();
        sort($paths);

        $this->assertEquals(array('/images/icon.png',
                                  '/images/main.jpg',
                                  '/javascripts/application.js',
                                  '/stylesheets/application.css'
                                  ),
                            $paths
                            );
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
