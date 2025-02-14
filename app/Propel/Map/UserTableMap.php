<?php

namespace App\Propel\Map;

use App\Propel\User;
use App\Propel\UserQuery;
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
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class UserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'App.Propel.Map.UserTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'user';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'User';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Propel\\User';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'App.Propel.User';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the user_id field
     */
    public const COL_USER_ID = 'user.user_id';

    /**
     * the column name for the first_name field
     */
    public const COL_FIRST_NAME = 'user.first_name';

    /**
     * the column name for the last_name field
     */
    public const COL_LAST_NAME = 'user.last_name';

    /**
     * the column name for the email field
     */
    public const COL_EMAIL = 'user.email';

    /**
     * the column name for the password field
     */
    public const COL_PASSWORD = 'user.password';

    /**
     * the column name for the birth_date field
     */
    public const COL_BIRTH_DATE = 'user.birth_date';

    /**
     * the column name for the phone field
     */
    public const COL_PHONE = 'user.phone';

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
        self::TYPE_PHPNAME       => ['UserId', 'FirstName', 'LastName', 'Email', 'Password', 'BirthDate', 'Phone', ],
        self::TYPE_CAMELNAME     => ['userId', 'firstName', 'lastName', 'email', 'password', 'birthDate', 'phone', ],
        self::TYPE_COLNAME       => [UserTableMap::COL_USER_ID, UserTableMap::COL_FIRST_NAME, UserTableMap::COL_LAST_NAME, UserTableMap::COL_EMAIL, UserTableMap::COL_PASSWORD, UserTableMap::COL_BIRTH_DATE, UserTableMap::COL_PHONE, ],
        self::TYPE_FIELDNAME     => ['user_id', 'first_name', 'last_name', 'email', 'password', 'birth_date', 'phone', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
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
        self::TYPE_PHPNAME       => ['UserId' => 0, 'FirstName' => 1, 'LastName' => 2, 'Email' => 3, 'Password' => 4, 'BirthDate' => 5, 'Phone' => 6, ],
        self::TYPE_CAMELNAME     => ['userId' => 0, 'firstName' => 1, 'lastName' => 2, 'email' => 3, 'password' => 4, 'birthDate' => 5, 'phone' => 6, ],
        self::TYPE_COLNAME       => [UserTableMap::COL_USER_ID => 0, UserTableMap::COL_FIRST_NAME => 1, UserTableMap::COL_LAST_NAME => 2, UserTableMap::COL_EMAIL => 3, UserTableMap::COL_PASSWORD => 4, UserTableMap::COL_BIRTH_DATE => 5, UserTableMap::COL_PHONE => 6, ],
        self::TYPE_FIELDNAME     => ['user_id' => 0, 'first_name' => 1, 'last_name' => 2, 'email' => 3, 'password' => 4, 'birth_date' => 5, 'phone' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'UserId' => 'USER_ID',
        'User.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'user.userId' => 'USER_ID',
        'UserTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'user.user_id' => 'USER_ID',
        'FirstName' => 'FIRST_NAME',
        'User.FirstName' => 'FIRST_NAME',
        'firstName' => 'FIRST_NAME',
        'user.firstName' => 'FIRST_NAME',
        'UserTableMap::COL_FIRST_NAME' => 'FIRST_NAME',
        'COL_FIRST_NAME' => 'FIRST_NAME',
        'first_name' => 'FIRST_NAME',
        'user.first_name' => 'FIRST_NAME',
        'LastName' => 'LAST_NAME',
        'User.LastName' => 'LAST_NAME',
        'lastName' => 'LAST_NAME',
        'user.lastName' => 'LAST_NAME',
        'UserTableMap::COL_LAST_NAME' => 'LAST_NAME',
        'COL_LAST_NAME' => 'LAST_NAME',
        'last_name' => 'LAST_NAME',
        'user.last_name' => 'LAST_NAME',
        'Email' => 'EMAIL',
        'User.Email' => 'EMAIL',
        'email' => 'EMAIL',
        'user.email' => 'EMAIL',
        'UserTableMap::COL_EMAIL' => 'EMAIL',
        'COL_EMAIL' => 'EMAIL',
        'Password' => 'PASSWORD',
        'User.Password' => 'PASSWORD',
        'password' => 'PASSWORD',
        'user.password' => 'PASSWORD',
        'UserTableMap::COL_PASSWORD' => 'PASSWORD',
        'COL_PASSWORD' => 'PASSWORD',
        'BirthDate' => 'BIRTH_DATE',
        'User.BirthDate' => 'BIRTH_DATE',
        'birthDate' => 'BIRTH_DATE',
        'user.birthDate' => 'BIRTH_DATE',
        'UserTableMap::COL_BIRTH_DATE' => 'BIRTH_DATE',
        'COL_BIRTH_DATE' => 'BIRTH_DATE',
        'birth_date' => 'BIRTH_DATE',
        'user.birth_date' => 'BIRTH_DATE',
        'Phone' => 'PHONE',
        'User.Phone' => 'PHONE',
        'phone' => 'PHONE',
        'user.phone' => 'PHONE',
        'UserTableMap::COL_PHONE' => 'PHONE',
        'COL_PHONE' => 'PHONE',
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
        $this->setName('user');
        $this->setPhpName('User');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Propel\\User');
        $this->setPackage('App.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'UserId', 'INTEGER', true, null, null);
        $this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 45, null);
        $this->addColumn('last_name', 'LastName', 'VARCHAR', false, 45, null);
        $this->addColumn('email', 'Email', 'VARCHAR', true, 250, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 100, null);
        $this->addColumn('birth_date', 'BirthDate', 'DATE', false, null, null);
        $this->addColumn('phone', 'Phone', 'VARCHAR', false, 15, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Address', '\\App\\Propel\\Address', RelationMap::ONE_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('Business', '\\App\\Propel\\Business', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', 'Businesses', false);
        $this->addRelation('CartProduct', '\\App\\Propel\\CartProduct', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', 'CartProducts', false);
        $this->addRelation('Orders', '\\App\\Propel\\Orders', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', 'Orderss', false);
        $this->addRelation('ProductReview', '\\App\\Propel\\ProductReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', 'ProductReviews', false);
    }

    /**
     * Method to invalidate the instance pool of all tables related to user     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool(): void
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        AddressTableMap::clearInstancePool();
        BusinessTableMap::clearInstancePool();
        CartProductTableMap::clearInstancePool();
        OrdersTableMap::clearInstancePool();
        ProductReviewTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('UserId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? UserTableMap::CLASS_DEFAULT : UserTableMap::OM_CLASS;
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
     * @return array (User object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = UserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserTableMap::OM_CLASS;
            /** @var User $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserTableMap::addInstanceToPool($obj, $key);
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
            $key = UserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var User $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(UserTableMap::COL_USER_ID);
            $criteria->addSelectColumn(UserTableMap::COL_FIRST_NAME);
            $criteria->addSelectColumn(UserTableMap::COL_LAST_NAME);
            $criteria->addSelectColumn(UserTableMap::COL_EMAIL);
            $criteria->addSelectColumn(UserTableMap::COL_PASSWORD);
            $criteria->addSelectColumn(UserTableMap::COL_BIRTH_DATE);
            $criteria->addSelectColumn(UserTableMap::COL_PHONE);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.first_name');
            $criteria->addSelectColumn($alias . '.last_name');
            $criteria->addSelectColumn($alias . '.email');
            $criteria->addSelectColumn($alias . '.password');
            $criteria->addSelectColumn($alias . '.birth_date');
            $criteria->addSelectColumn($alias . '.phone');
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
            $criteria->removeSelectColumn(UserTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(UserTableMap::COL_FIRST_NAME);
            $criteria->removeSelectColumn(UserTableMap::COL_LAST_NAME);
            $criteria->removeSelectColumn(UserTableMap::COL_EMAIL);
            $criteria->removeSelectColumn(UserTableMap::COL_PASSWORD);
            $criteria->removeSelectColumn(UserTableMap::COL_BIRTH_DATE);
            $criteria->removeSelectColumn(UserTableMap::COL_PHONE);
        } else {
            $criteria->removeSelectColumn($alias . '.user_id');
            $criteria->removeSelectColumn($alias . '.first_name');
            $criteria->removeSelectColumn($alias . '.last_name');
            $criteria->removeSelectColumn($alias . '.email');
            $criteria->removeSelectColumn($alias . '.password');
            $criteria->removeSelectColumn($alias . '.birth_date');
            $criteria->removeSelectColumn($alias . '.phone');
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
        return Propel::getServiceContainer()->getDatabaseMap(UserTableMap::DATABASE_NAME)->getTable(UserTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a User or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or User object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Propel\User) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserTableMap::DATABASE_NAME);
            $criteria->add(UserTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = UserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return UserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a User or Criteria object.
     *
     * @param mixed $criteria Criteria or User object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from User object
        }

        if ($criteria->containsKey(UserTableMap::COL_USER_ID) && $criteria->keyContainsValue(UserTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = UserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
