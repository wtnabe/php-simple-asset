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

    /**
     * @param  string $fullpath
     * @param  string $digest
     * @return string or null
     */
    function storeDigestToFile($fullpath, $digest)
    {
        $dir = dirname($fullpath);
        if ( !file_exists($dir) ) {
            mkdir($dir, $this->_dir_mode(), true);
        }

        if ( file_put_contents($fullpath, $digest, LOCK_EX) &&
             chmod($fullpath, $this->_file_mode()) ) {
            return $digest;
        }
    }

    /**
     * @return int
     */
    function _dir_mode()
    {
        return array_key_exists('store_dir_group_writable', $this->config)
            ? 0775
            : 0755;
    }

    /**
     * @return int
     */
    function _file_mode()
    {
        return array_key_exists('store_file_group_writable', $this->config)
            ? 0664
            : 0644;
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
