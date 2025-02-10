<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'address' => '\\App\\Propel\\Map\\AddressTableMap',
      'business' => '\\App\\Propel\\Map\\BusinessTableMap',
      'cart_product' => '\\App\\Propel\\Map\\CartProductTableMap',
      'order_product' => '\\App\\Propel\\Map\\OrderProductTableMap',
      'orders' => '\\App\\Propel\\Map\\OrdersTableMap',
      'product' => '\\App\\Propel\\Map\\ProductTableMap',
      'product_category' => '\\App\\Propel\\Map\\ProductCategoryTableMap',
      'product_review' => '\\App\\Propel\\Map\\ProductReviewTableMap',
      'sessions' => '\\App\\Propel\\Map\\SessionsTableMap',
      'user' => '\\App\\Propel\\Map\\UserTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Address' => '\\App\\Propel\\Map\\AddressTableMap',
      '\\Business' => '\\App\\Propel\\Map\\BusinessTableMap',
      '\\CartProduct' => '\\App\\Propel\\Map\\CartProductTableMap',
      '\\OrderProduct' => '\\App\\Propel\\Map\\OrderProductTableMap',
      '\\Orders' => '\\App\\Propel\\Map\\OrdersTableMap',
      '\\Product' => '\\App\\Propel\\Map\\ProductTableMap',
      '\\ProductCategory' => '\\App\\Propel\\Map\\ProductCategoryTableMap',
      '\\ProductReview' => '\\App\\Propel\\Map\\ProductReviewTableMap',
      '\\Sessions' => '\\App\\Propel\\Map\\SessionsTableMap',
      '\\User' => '\\App\\Propel\\Map\\UserTableMap',
    ),
  ),
));
