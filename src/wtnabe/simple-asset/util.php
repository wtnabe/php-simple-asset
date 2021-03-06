<?php

class SimpleAssetUtil
{
    /**
     * join array with single slash
     *
     * SimpleAssetUtil::joinpath('foo', 'bar') // => 'foo/bar'
     * SimpleAssetUtil::joinpath('foo/', '/bar') // => 'foo/bar'
     * SimpleAssetUtil::joinpath('foo', '', 'bar') // => 'foo/bar'
     *
     * @params
     */
    public static function joinpath($args)
    {
        $args = func_get_args();

        return preg_replace('/\/+/',
                            '/',
                            join('/', array_filter($args)));
    }

    /**
     * @param  string $path
     * @return string
     */
    public static function assetFullpath($path)
    {
        return self::joinpath(SimpleAsset::config('asset_dir'), $path);
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
