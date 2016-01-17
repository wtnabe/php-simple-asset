<?php
class SimpleAssetStore
{
    /**
     * @param  array $args
     * @return object
     */
    static public function factory()
    {
        return new SimpleAssetStoreFile(SimpleAsset::config());
    }
}

/*
Local Variables:
c-basic-offset: 4
End:
*/
