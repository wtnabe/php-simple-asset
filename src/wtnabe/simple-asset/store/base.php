<?php
class SimpleAssetStoreBase
{
    /**
     * @var array
     */
    var $config;

    /**
     * @param array $opts
     */
    function __construct($opts = null)
    {
        if ( is_array($opts) and sizeof($opts) > 0 ) {
            $this->config = SimpleAsset::config($opts);
        }
    }

    /**
     *  override me !!
     *
     * @param  string $path
     * @return string
     */
    function digest($path)
    {
    }

    /**
     * @param  string
     * @return string
     */
    function _warn_digest_not_found($path)
    {
        trigger_error(
                      sprintf("Not exists digest of %s with %s.",
                              $path,
                              get_class($this)),
                      E_USER_WARNING
                      );
    }

    /**
     * @param  string $path
     * @return string
     */
    function setDigest($path)
    {
        preg_match_all('/([A-Z][a-z]+)/', get_class($this), $capture);
        $method = "storeDigestTo".end($capture[0]);

        return $this->{$method}($path,
                                $this->calculateDigest(SimpleAssetUtil::assetFullpath($path)));
    }

    /**
     * @param  string $fullpath
     * @return string
     */
    function calculateDigest($fullpath)
    {
        return md5_file($fullpath);
    }

    /**
     * @param  string $path
     * @return string
     */
    function path($path)
    {
        return $this->digest($path)
            ? "$path?{$this->digest($path)}"
            : $path;
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
