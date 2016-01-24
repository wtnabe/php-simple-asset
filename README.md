SimpleAsset
===========

SimpleAsset library for PHP 5.3-

status : experimental implementation

Usage
-----

prepare

```php
SimpleAsset::precompile(array('store_dir' => STORE_DIR,
                              'asset_dir' => PROJECT_ROOT.'public/'));
```

how to use

```php
<img src="<?php echo SimpleAsset::path('/path/to/image.png'); ?>">

  //  => <img src="/path/to/image.png?{digest}">
```

Limitation
----------

current limitations as below

 * cache buster feature only
 * only SimpleAssetStoreFile class available for storing asset digest
