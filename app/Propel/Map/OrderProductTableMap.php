<?php

namespace App\Propel\Map;

use App\Propel\OrderProduct;
use App\Propel\OrderProductQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'order_product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrderProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'App.Propel.Map.OrderProductTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'order_product';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'OrderProduct';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Propel\\OrderProduct';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'App.Propel.OrderProduct';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 5;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 5;

    /**
     * the column name for the order_id field
     */
    public const COL_ORDER_ID = 'order_product.order_id';

    /**
     * the column name for the product_id field
     */
    public const COL_PRODUCT_ID = 'order_product.product_id';

    /**
     * the column name for the amount field
     */
    public const COL_AMOUNT = 'order_product.amount';

    /**
     * the column name for the initial_price field
     */
    public const COL_INITIAL_PRICE = 'order_product.initial_price';

    /**
     * the column name for the total_price field
     */
    public const COL_TOTAL_PRICE = 'order_product.total_price';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['OrderId', 'ProductId', 'Amount', 'InitialPrice', 'TotalPrice', ],
        self::TYPE_CAMELNAME     => ['orderId', 'productId', 'amount', 'initialPrice', 'totalPrice', ],
        self::TYPE_COLNAME       => [OrderProductTableMap::COL_ORDER_ID, OrderProductTableMap::COL_PRODUCT_ID, OrderProductTableMap::COL_AMOUNT, OrderProductTableMap::COL_INITIAL_PRICE, OrderProductTableMap::COL_TOTAL_PRICE, ],
        self::TYPE_FIELDNAME     => ['order_id', 'product_id', 'amount', 'initial_price', 'total_price', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['OrderId' => 0, 'ProductId' => 1, 'Amount' => 2, 'InitialPrice' => 3, 'TotalPrice' => 4, ],
        self::TYPE_CAMELNAME     => ['orderId' => 0, 'productId' => 1, 'amount' => 2, 'initialPrice' => 3, 'totalPrice' => 4, ],
        self::TYPE_COLNAME       => [OrderProductTableMap::COL_ORDER_ID => 0, OrderProductTableMap::COL_PRODUCT_ID => 1, OrderProductTableMap::COL_AMOUNT => 2, OrderProductTableMap::COL_INITIAL_PRICE => 3, OrderProductTableMap::COL_TOTAL_PRICE => 4, ],
        self::TYPE_FIELDNAME     => ['order_id' => 0, 'product_id' => 1, 'amount' => 2, 'initial_price' => 3, 'total_price' => 4, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'OrderId' => 'ORDER_ID',
        'OrderProduct.OrderId' => 'ORDER_ID',
        'orderId' => 'ORDER_ID',
        'orderProduct.orderId' => 'ORDER_ID',
        'OrderProductTableMap::COL_ORDER_ID' => 'ORDER_ID',
        'COL_ORDER_ID' => 'ORDER_ID',
        'order_id' => 'ORDER_ID',
        'order_product.order_id' => 'ORDER_ID',
        'ProductId' => 'PRODUCT_ID',
        'OrderProduct.ProductId' => 'PRODUCT_ID',
        'productId' => 'PRODUCT_ID',
        'orderProduct.productId' => 'PRODUCT_ID',
        'OrderProductTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
        'COL_PRODUCT_ID' => 'PRODUCT_ID',
        'product_id' => 'PRODUCT_ID',
        'order_product.product_id' => 'PRODUCT_ID',
        'Amount' => 'AMOUNT',
        'OrderProduct.Amount' => 'AMOUNT',
        'amount' => 'AMOUNT',
        'orderProduct.amount' => 'AMOUNT',
        'OrderProductTableMap::COL_AMOUNT' => 'AMOUNT',
        'COL_AMOUNT' => 'AMOUNT',
        'order_product.amount' => 'AMOUNT',
        'InitialPrice' => 'INITIAL_PRICE',
        'OrderProduct.InitialPrice' => 'INITIAL_PRICE',
        'initialPrice' => 'INITIAL_PRICE',
        'orderProduct.initialPrice' => 'INITIAL_PRICE',
        'OrderProductTableMap::COL_INITIAL_PRICE' => 'INITIAL_PRICE',
        'COL_INITIAL_PRICE' => 'INITIAL_PRICE',
        'initial_price' => 'INITIAL_PRICE',
        'order_product.initial_price' => 'INITIAL_PRICE',
        'TotalPrice' => 'TOTAL_PRICE',
        'OrderProduct.TotalPrice' => 'TOTAL_PRICE',
        'totalPrice' => 'TOTAL_PRICE',
        'orderProduct.totalPrice' => 'TOTAL_PRICE',
        'OrderProductTableMap::COL_TOTAL_PRICE' => 'TOTAL_PRICE',
        'COL_TOTAL_PRICE' => 'TOTAL_PRICE',
        'total_price' => 'TOTAL_PRICE',
        'order_product.total_price' => 'TOTAL_PRICE',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('order_product');
        $this->setPhpName('OrderProduct');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Propel\\OrderProduct');
        $this->setPackage('App.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('order_id', 'OrderId', 'INTEGER' , 'orders', 'order_id', true, null, null);
        $this->addForeignPrimaryKey('product_id', 'ProductId', 'INTEGER' , 'product', 'product_id', true, null, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('initial_price', 'InitialPrice', 'DECIMAL', true, 10, null);
        $this->addColumn('total_price', 'TotalPrice', 'DECIMAL', true, 10, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Orders', '\\App\\Propel\\Orders', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':order_id',
    1 => ':order_id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Product', '\\App\\Propel\\Product', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':product_id',
    1 => ':product_id',
  ),
), null, 'CASCADE', null, false);
    }

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \App\Propel\OrderProduct $obj A \App\Propel\OrderProduct object.
     * @param string|null $key Key (optional) to use for instance map (for performance boost if key was already calculated externally).
     *
     * @return void
     */
    public static function addInstanceToPool(OrderProduct $obj, ?string $key = null): void
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getOrderId() || is_scalar($obj->getOrderId()) || is_callable([$obj->getOrderId(), '__toString']) ? (string) $obj->getOrderId() : $obj->getOrderId()), (null === $obj->getProductId() || is_scalar($obj->getProductId()) || is_callable([$obj->getProductId(), '__toString']) ? (string) $obj->getProductId() : $obj->getProductId())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \App\Propel\OrderProduct object or a primary key value.
     *
     * @return void
     */
    public static function removeInstanceFromPool($value): void
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \App\Propel\OrderProduct) {
                $key = serialize([(null === $value->getOrderId() || is_scalar($value->getOrderId()) || is_callable([$value->getOrderId(), '__toString']) ? (string) $value->getOrderId() : $value->getOrderId()), (null === $value->getProductId() || is_scalar($value->getProductId()) || is_callable([$value->getProductId(), '__toString']) ? (string) $value->getProductId() : $value->getProductId())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \App\Propel\OrderProduct object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 1 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 1 + $offset
                : self::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? OrderProductTableMap::CLASS_DEFAULT : OrderProductTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (OrderProduct object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrderProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrderProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrderProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrderProductTableMap::OM_CLASS;
            /** @var OrderProduct $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrderProductTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = OrderProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrderProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var OrderProduct $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrderProductTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(OrderProductTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OrderProductTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(OrderProductTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(OrderProductTableMap::COL_INITIAL_PRICE);
            $criteria->addSelectColumn(OrderProductTableMap::COL_TOTAL_PRICE);
        } else {
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.initial_price');
            $criteria->addSelectColumn($alias . '.total_price');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(OrderProductTableMap::COL_ORDER_ID);
            $criteria->removeSelectColumn(OrderProductTableMap::COL_PRODUCT_ID);
            $criteria->removeSelectColumn(OrderProductTableMap::COL_AMOUNT);
            $criteria->removeSelectColumn(OrderProductTableMap::COL_INITIAL_PRICE);
            $criteria->removeSelectColumn(OrderProductTableMap::COL_TOTAL_PRICE);
        } else {
            $criteria->removeSelectColumn($alias . '.order_id');
            $criteria->removeSelectColumn($alias . '.product_id');
            $criteria->removeSelectColumn($alias . '.amount');
            $criteria->removeSelectColumn($alias . '.initial_price');
            $criteria->removeSelectColumn($alias . '.total_price');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(OrderProductTableMap::DATABASE_NAME)->getTable(OrderProductTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a OrderProduct or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or OrderProduct object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Propel\OrderProduct) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrderProductTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = [$values];
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(OrderProductTableMap::COL_ORDER_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(OrderProductTableMap::COL_PRODUCT_ID, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = OrderProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrderProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrderProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the order_product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrderProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a OrderProduct or Criteria object.
     *
     * @param mixed $criteria Criteria or OrderProduct object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrderProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from OrderProduct object
        }


        // Set the correct dbName
        $query = OrderProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
