<?php
class SimpleAssetStoreFile extends SimpleAssetStoreBase
{
    /**
     * @param  string $path
     * @return string
     */
    function digest($path)
    {
        $file = $this->_digestFile($path);

        if ( file_exists($file) and is_readable($file) ) {
            return rtrim(file_get_contents($file));
        } else {
            $this->_warn_digest_not_found($path);
            return '';
        }
    }

    /**
     * @param  string $path
     * @return string
     */
    function _digestFile($path)
    {
        return SimpleAssetUtil::joinpath($this->config['store_dir'], $path);
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
