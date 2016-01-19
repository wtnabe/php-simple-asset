<?php
class SimpleAssetFilesTest extends \PHPUnit_Framework_TestCase
{
    function testGlob()
    {
        SimpleAsset::config(array('asset_dir' => dirname(__FILE__).'/public'));

        $files = new SimpleAssetFiles();
        $paths = array_map(array($this, '_strip_path'), $files->glob());
        sort($paths);

        $this->assertEquals(array('/public/images/icon.png',
                                  '/public/images/main.jpg',
                                  '/public/javascripts/application.js',
                                  '/public/stylesheets/application.css'
                                  ),
                            $paths
                            );
    }

    function _strip_path($path)
    {
        return str_replace(dirname(__FILE__), '', $path);
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
