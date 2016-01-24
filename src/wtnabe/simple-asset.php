<?php
function ___files($dir) {
    $files = glob("{$dir}/*.php");
    $dirs  = glob("{$dir}/*", GLOB_ONLYDIR);
    foreach ($dirs as $dir) {
        $files = array_merge($files, ___files($dir));
    }
    return $files;
}
foreach ( ___files(dirname(__FILE__).'/simple-asset') as $file ) {
    require_once($file);
}

class SimpleAsset
{
    /**
     * @param  mixed $opts
     * @return mixed
     */
    static function config($opts = null)
    {
        static $config = array();

        /*
         * getter
         */
        if ( is_string($opts) and array_key_exists($opts, $config) ) {
            return $config[$opts];
        }

        /*
         * setter
         */
        if ( is_array($opts) ) {
            if ( sizeof($opts) > 0 ) {
                $config = array_merge($config, $opts);
            } else {
                $config = array();
            }

        }

        /*
         * whole
         */
        return $config;
    }

    /**
     * @param  string $path
     * @return string
     */
    public static function path($path)
    {
        $store = SimpleAssetStore::factory();

        return "{$store->path($path)}";
    }

    /**
     * @param array $config
     */
    public static function precompile($config = null)
    {
        if ( is_array($config) && sizeof($config) > 0 ) {
            SimpleAsset::config($config);
        }

        $store = SimpleAssetStore::factory();
        $files = new SimpleAssetFiles();

        foreach ( $files->glob() as $path ) {
            $store->setDigest($path);
        }
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
