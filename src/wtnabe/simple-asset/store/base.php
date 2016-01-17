<?php
class SimpleAssetStoreBase
{
    /**
     * @var array
     */
    var $config = array();

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

    function setDigest($path)
    {
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
