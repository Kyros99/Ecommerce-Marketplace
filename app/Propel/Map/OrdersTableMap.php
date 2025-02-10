<?php

namespace App\Propel\Map;

use App\Propel\Orders;
use App\Propel\OrdersQuery;
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
 * This class defines the structure of the 'orders' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrdersTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'App.Propel.Map.OrdersTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'orders';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Orders';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Propel\\Orders';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'App.Propel.Orders';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 10;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 10;

    /**
     * the column name for the order_id field
     */
    public const COL_ORDER_ID = 'orders.order_id';

    /**
     * the column name for the user_id field
     */
    public const COL_USER_ID = 'orders.user_id';

    /**
     * the column name for the total_amount field
     */
    public const COL_TOTAL_AMOUNT = 'orders.total_amount';

    /**
     * the column name for the total_price field
     */
    public const COL_TOTAL_PRICE = 'orders.total_price';

    /**
     * the column name for the address_street field
     */
    public const COL_ADDRESS_STREET = 'orders.address_street';

    /**
     * the column name for the address_number field
     */
    public const COL_ADDRESS_NUMBER = 'orders.address_number';

    /**
     * the column name for the addresss_city field
     */
    public const COL_ADDRESSS_CITY = 'orders.addresss_city';

    /**
     * the column name for the address_postal_code field
     */
    public const COL_ADDRESS_POSTAL_CODE = 'orders.address_postal_code';

    /**
     * the column name for the comments field
     */
    public const COL_COMMENTS = 'orders.comments';

    /**
     * the column name for the created_at field
     */
    public const COL_CREATED_AT = 'orders.created_at';

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
        self::TYPE_PHPNAME       => ['OrderId', 'UserId', 'TotalAmount', 'TotalPrice', 'AddressStreet', 'AddressNumber', 'AddresssCity', 'AddressPostalCode', 'Comments', 'CreatedAt', ],
        self::TYPE_CAMELNAME     => ['orderId', 'userId', 'totalAmount', 'totalPrice', 'addressStreet', 'addressNumber', 'addresssCity', 'addressPostalCode', 'comments', 'createdAt', ],
        self::TYPE_COLNAME       => [OrdersTableMap::COL_ORDER_ID, OrdersTableMap::COL_USER_ID, OrdersTableMap::COL_TOTAL_AMOUNT, OrdersTableMap::COL_TOTAL_PRICE, OrdersTableMap::COL_ADDRESS_STREET, OrdersTableMap::COL_ADDRESS_NUMBER, OrdersTableMap::COL_ADDRESSS_CITY, OrdersTableMap::COL_ADDRESS_POSTAL_CODE, OrdersTableMap::COL_COMMENTS, OrdersTableMap::COL_CREATED_AT, ],
        self::TYPE_FIELDNAME     => ['order_id', 'user_id', 'total_amount', 'total_price', 'address_street', 'address_number', 'addresss_city', 'address_postal_code', 'comments', 'created_at', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ]
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
        self::TYPE_PHPNAME       => ['OrderId' => 0, 'UserId' => 1, 'TotalAmount' => 2, 'TotalPrice' => 3, 'AddressStreet' => 4, 'AddressNumber' => 5, 'AddresssCity' => 6, 'AddressPostalCode' => 7, 'Comments' => 8, 'CreatedAt' => 9, ],
        self::TYPE_CAMELNAME     => ['orderId' => 0, 'userId' => 1, 'totalAmount' => 2, 'totalPrice' => 3, 'addressStreet' => 4, 'addressNumber' => 5, 'addresssCity' => 6, 'addressPostalCode' => 7, 'comments' => 8, 'createdAt' => 9, ],
        self::TYPE_COLNAME       => [OrdersTableMap::COL_ORDER_ID => 0, OrdersTableMap::COL_USER_ID => 1, OrdersTableMap::COL_TOTAL_AMOUNT => 2, OrdersTableMap::COL_TOTAL_PRICE => 3, OrdersTableMap::COL_ADDRESS_STREET => 4, OrdersTableMap::COL_ADDRESS_NUMBER => 5, OrdersTableMap::COL_ADDRESSS_CITY => 6, OrdersTableMap::COL_ADDRESS_POSTAL_CODE => 7, OrdersTableMap::COL_COMMENTS => 8, OrdersTableMap::COL_CREATED_AT => 9, ],
        self::TYPE_FIELDNAME     => ['order_id' => 0, 'user_id' => 1, 'total_amount' => 2, 'total_price' => 3, 'address_street' => 4, 'address_number' => 5, 'addresss_city' => 6, 'address_postal_code' => 7, 'comments' => 8, 'created_at' => 9, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'OrderId' => 'ORDER_ID',
        'Orders.OrderId' => 'ORDER_ID',
        'orderId' => 'ORDER_ID',
        'orders.orderId' => 'ORDER_ID',
        'OrdersTableMap::COL_ORDER_ID' => 'ORDER_ID',
        'COL_ORDER_ID' => 'ORDER_ID',
        'order_id' => 'ORDER_ID',
        'orders.order_id' => 'ORDER_ID',
        'UserId' => 'USER_ID',
        'Orders.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'orders.userId' => 'USER_ID',
        'OrdersTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'orders.user_id' => 'USER_ID',
        'TotalAmount' => 'TOTAL_AMOUNT',
        'Orders.TotalAmount' => 'TOTAL_AMOUNT',
        'totalAmount' => 'TOTAL_AMOUNT',
        'orders.totalAmount' => 'TOTAL_AMOUNT',
        'OrdersTableMap::COL_TOTAL_AMOUNT' => 'TOTAL_AMOUNT',
        'COL_TOTAL_AMOUNT' => 'TOTAL_AMOUNT',
        'total_amount' => 'TOTAL_AMOUNT',
        'orders.total_amount' => 'TOTAL_AMOUNT',
        'TotalPrice' => 'TOTAL_PRICE',
        'Orders.TotalPrice' => 'TOTAL_PRICE',
        'totalPrice' => 'TOTAL_PRICE',
        'orders.totalPrice' => 'TOTAL_PRICE',
        'OrdersTableMap::COL_TOTAL_PRICE' => 'TOTAL_PRICE',
        'COL_TOTAL_PRICE' => 'TOTAL_PRICE',
        'total_price' => 'TOTAL_PRICE',
        'orders.total_price' => 'TOTAL_PRICE',
        'AddressStreet' => 'ADDRESS_STREET',
        'Orders.AddressStreet' => 'ADDRESS_STREET',
        'addressStreet' => 'ADDRESS_STREET',
        'orders.addressStreet' => 'ADDRESS_STREET',
        'OrdersTableMap::COL_ADDRESS_STREET' => 'ADDRESS_STREET',
        'COL_ADDRESS_STREET' => 'ADDRESS_STREET',
        'address_street' => 'ADDRESS_STREET',
        'orders.address_street' => 'ADDRESS_STREET',
        'AddressNumber' => 'ADDRESS_NUMBER',
        'Orders.AddressNumber' => 'ADDRESS_NUMBER',
        'addressNumber' => 'ADDRESS_NUMBER',
        'orders.addressNumber' => 'ADDRESS_NUMBER',
        'OrdersTableMap::COL_ADDRESS_NUMBER' => 'ADDRESS_NUMBER',
        'COL_ADDRESS_NUMBER' => 'ADDRESS_NUMBER',
        'address_number' => 'ADDRESS_NUMBER',
        'orders.address_number' => 'ADDRESS_NUMBER',
        'AddresssCity' => 'ADDRESSS_CITY',
        'Orders.AddresssCity' => 'ADDRESSS_CITY',
        'addresssCity' => 'ADDRESSS_CITY',
        'orders.addresssCity' => 'ADDRESSS_CITY',
        'OrdersTableMap::COL_ADDRESSS_CITY' => 'ADDRESSS_CITY',
        'COL_ADDRESSS_CITY' => 'ADDRESSS_CITY',
        'addresss_city' => 'ADDRESSS_CITY',
        'orders.addresss_city' => 'ADDRESSS_CITY',
        'AddressPostalCode' => 'ADDRESS_POSTAL_CODE',
        'Orders.AddressPostalCode' => 'ADDRESS_POSTAL_CODE',
        'addressPostalCode' => 'ADDRESS_POSTAL_CODE',
        'orders.addressPostalCode' => 'ADDRESS_POSTAL_CODE',
        'OrdersTableMap::COL_ADDRESS_POSTAL_CODE' => 'ADDRESS_POSTAL_CODE',
        'COL_ADDRESS_POSTAL_CODE' => 'ADDRESS_POSTAL_CODE',
        'address_postal_code' => 'ADDRESS_POSTAL_CODE',
        'orders.address_postal_code' => 'ADDRESS_POSTAL_CODE',
        'Comments' => 'COMMENTS',
        'Orders.Comments' => 'COMMENTS',
        'comments' => 'COMMENTS',
        'orders.comments' => 'COMMENTS',
        'OrdersTableMap::COL_COMMENTS' => 'COMMENTS',
        'COL_COMMENTS' => 'COMMENTS',
        'CreatedAt' => 'CREATED_AT',
        'Orders.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'orders.createdAt' => 'CREATED_AT',
        'OrdersTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'orders.created_at' => 'CREATED_AT',
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
        $this->setName('orders');
        $this->setPhpName('Orders');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Propel\\Orders');
        $this->setPackage('App.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('order_id', 'OrderId', 'INTEGER', true, null, null);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'user', 'user_id', true, null, null);
        $this->addColumn('total_amount', 'TotalAmount', 'INTEGER', true, null, null);
        $this->addColumn('total_price', 'TotalPrice', 'DECIMAL', true, 10, null);
        $this->addColumn('address_street', 'AddressStreet', 'VARCHAR', true, 45, null);
        $this->addColumn('address_number', 'AddressNumber', 'INTEGER', true, null, null);
        $this->addColumn('addresss_city', 'AddresssCity', 'VARCHAR', true, 45, null);
        $this->addColumn('address_postal_code', 'AddressPostalCode', 'VARCHAR', true, 45, null);
        $this->addColumn('comments', 'Comments', 'LONGVARCHAR', false, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'DATETIME', true, null, 'CURRENT_TIMESTAMP');
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('User', '\\App\\Propel\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('OrderProduct', '\\App\\Propel\\OrderProduct', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':order_id',
    1 => ':order_id',
  ),
), 'CASCADE', 'CASCADE', 'OrderProducts', false);
    }

    /**
     * Method to invalidate the instance pool of all tables related to orders     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool(): void
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        OrderProductTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)
        ];
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
        return $withPrefix ? OrdersTableMap::CLASS_DEFAULT : OrdersTableMap::OM_CLASS;
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
     * @return array (Orders object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + OrdersTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = OrdersTableMap::OM_CLASS;
            /** @var Orders $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            OrdersTableMap::addInstanceToPool($obj, $key);
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
            $key = OrdersTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = OrdersTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Orders $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                OrdersTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(OrdersTableMap::COL_ORDER_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_USER_ID);
            $criteria->addSelectColumn(OrdersTableMap::COL_TOTAL_AMOUNT);
            $criteria->addSelectColumn(OrdersTableMap::COL_TOTAL_PRICE);
            $criteria->addSelectColumn(OrdersTableMap::COL_ADDRESS_STREET);
            $criteria->addSelectColumn(OrdersTableMap::COL_ADDRESS_NUMBER);
            $criteria->addSelectColumn(OrdersTableMap::COL_ADDRESSS_CITY);
            $criteria->addSelectColumn(OrdersTableMap::COL_ADDRESS_POSTAL_CODE);
            $criteria->addSelectColumn(OrdersTableMap::COL_COMMENTS);
            $criteria->addSelectColumn(OrdersTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.order_id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.total_amount');
            $criteria->addSelectColumn($alias . '.total_price');
            $criteria->addSelectColumn($alias . '.address_street');
            $criteria->addSelectColumn($alias . '.address_number');
            $criteria->addSelectColumn($alias . '.addresss_city');
            $criteria->addSelectColumn($alias . '.address_postal_code');
            $criteria->addSelectColumn($alias . '.comments');
            $criteria->addSelectColumn($alias . '.created_at');
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
            $criteria->removeSelectColumn(OrdersTableMap::COL_ORDER_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TOTAL_AMOUNT);
            $criteria->removeSelectColumn(OrdersTableMap::COL_TOTAL_PRICE);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ADDRESS_STREET);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ADDRESS_NUMBER);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ADDRESSS_CITY);
            $criteria->removeSelectColumn(OrdersTableMap::COL_ADDRESS_POSTAL_CODE);
            $criteria->removeSelectColumn(OrdersTableMap::COL_COMMENTS);
            $criteria->removeSelectColumn(OrdersTableMap::COL_CREATED_AT);
        } else {
            $criteria->removeSelectColumn($alias . '.order_id');
            $criteria->removeSelectColumn($alias . '.user_id');
            $criteria->removeSelectColumn($alias . '.total_amount');
            $criteria->removeSelectColumn($alias . '.total_price');
            $criteria->removeSelectColumn($alias . '.address_street');
            $criteria->removeSelectColumn($alias . '.address_number');
            $criteria->removeSelectColumn($alias . '.addresss_city');
            $criteria->removeSelectColumn($alias . '.address_postal_code');
            $criteria->removeSelectColumn($alias . '.comments');
            $criteria->removeSelectColumn($alias . '.created_at');
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
        return Propel::getServiceContainer()->getDatabaseMap(OrdersTableMap::DATABASE_NAME)->getTable(OrdersTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Orders or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Orders object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Propel\Orders) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(OrdersTableMap::DATABASE_NAME);
            $criteria->add(OrdersTableMap::COL_ORDER_ID, (array) $values, Criteria::IN);
        }

        $query = OrdersQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            OrdersTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                OrdersTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the orders table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return OrdersQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Orders or Criteria object.
     *
     * @param mixed $criteria Criteria or Orders object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(OrdersTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Orders object
        }

        if ($criteria->containsKey(OrdersTableMap::COL_ORDER_ID) && $criteria->keyContainsValue(OrdersTableMap::COL_ORDER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.OrdersTableMap::COL_ORDER_ID.')');
        }


        // Set the correct dbName
        $query = OrdersQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
