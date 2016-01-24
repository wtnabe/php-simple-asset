<?php
class SimpleAssetFiles
{
    /**
     * @var array
     */
    var $suffixes = array(
                          'js',
                          'css',
                          'png',
                          'jpg', 'jpeg',
                          'gif'
                          );
    /**
     * @var string
     */
    var $suffix_brace;

    /**
     * @param string $base_dir
     */
    function __construct($base_dir = null)
    {
        $this->suffix_brace =
            join(',',
                 array_merge($this->suffixes,
                             array_map('strtoupper', $this->suffixes)));
    }

    /**
     * @return array
     */
    function glob($dir = null)
    {
        if ( !$dir ) {
            $config = SimpleAsset::config();
            $dir    = $config['asset_dir'];
        }

        $files = glob(SimpleAssetUtil::joinpath($dir, "*.{{$this->suffix_brace}}"), GLOB_BRACE);
        $dirs  = array_filter(glob(SimpleAssetUtil::joinpath($dir, "*")), 'is_dir');

        if ( sizeof($dirs) > 0 ) {
            foreach ( $dirs as $dir ) {
                $files = array_merge($files, $this->glob($dir));
            }
        }

        return array_map(array($this, '_strip_asset_dir'), $files);
    }

    /**
     * @param  string $path
     * @return string
     */
    function _strip_asset_dir($path)
    {
        return str_replace(SimpleAsset::config('asset_dir'), '', $path);
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
