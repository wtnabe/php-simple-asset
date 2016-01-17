<?php
class SimpleAssetStoreFile extends SimpleAssetStoreBase
{
    /**
     * @param  array $args
     * @return array
     */
    function __construct($args)
    {
        $this->config = array_merge(array('manifest' => null), $args);
    }

    /**
     * @param  string $path
     * @return string
     */
    function digest($path)
    {
        $manifest = json_decode(file_get_contents($this->config['manifest']), true);

         if ( array_key_exists($path, $manifest) ) {
             return $manifest[$path];
         } else {
             $this->_warn_digest_not_found($path);
             return '';
         }
    }
 }

 /*
 Local Variables:
 c-basic-offset: 4
 End:
 */
