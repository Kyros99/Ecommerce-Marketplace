<?php

namespace App\Propel\Map;

use App\Propel\Sessions;
use App\Propel\SessionsQuery;
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
 * This class defines the structure of the 'sessions' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SessionsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'App.Propel.Map.SessionsTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'sessions';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Sessions';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Propel\\Sessions';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'App.Propel.Sessions';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'sessions.id';

    /**
     * the column name for the user_id field
     */
    public const COL_USER_ID = 'sessions.user_id';

    /**
     * the column name for the ip_address field
     */
    public const COL_IP_ADDRESS = 'sessions.ip_address';

    /**
     * the column name for the user_agent field
     */
    public const COL_USER_AGENT = 'sessions.user_agent';

    /**
     * the column name for the payload field
     */
    public const COL_PAYLOAD = 'sessions.payload';

    /**
     * the column name for the last_activity field
     */
    public const COL_LAST_ACTIVITY = 'sessions.last_activity';

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
        self::TYPE_PHPNAME       => ['Id', 'UserId', 'IpAddress', 'UserAgent', 'Payload', 'LastActivity', ],
        self::TYPE_CAMELNAME     => ['id', 'userId', 'ipAddress', 'userAgent', 'payload', 'lastActivity', ],
        self::TYPE_COLNAME       => [SessionsTableMap::COL_ID, SessionsTableMap::COL_USER_ID, SessionsTableMap::COL_IP_ADDRESS, SessionsTableMap::COL_USER_AGENT, SessionsTableMap::COL_PAYLOAD, SessionsTableMap::COL_LAST_ACTIVITY, ],
        self::TYPE_FIELDNAME     => ['id', 'user_id', 'ip_address', 'user_agent', 'payload', 'last_activity', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'UserId' => 1, 'IpAddress' => 2, 'UserAgent' => 3, 'Payload' => 4, 'LastActivity' => 5, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'userId' => 1, 'ipAddress' => 2, 'userAgent' => 3, 'payload' => 4, 'lastActivity' => 5, ],
        self::TYPE_COLNAME       => [SessionsTableMap::COL_ID => 0, SessionsTableMap::COL_USER_ID => 1, SessionsTableMap::COL_IP_ADDRESS => 2, SessionsTableMap::COL_USER_AGENT => 3, SessionsTableMap::COL_PAYLOAD => 4, SessionsTableMap::COL_LAST_ACTIVITY => 5, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'user_id' => 1, 'ip_address' => 2, 'user_agent' => 3, 'payload' => 4, 'last_activity' => 5, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Sessions.Id' => 'ID',
        'id' => 'ID',
        'sessions.id' => 'ID',
        'SessionsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'UserId' => 'USER_ID',
        'Sessions.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'sessions.userId' => 'USER_ID',
        'SessionsTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'sessions.user_id' => 'USER_ID',
        'IpAddress' => 'IP_ADDRESS',
        'Sessions.IpAddress' => 'IP_ADDRESS',
        'ipAddress' => 'IP_ADDRESS',
        'sessions.ipAddress' => 'IP_ADDRESS',
        'SessionsTableMap::COL_IP_ADDRESS' => 'IP_ADDRESS',
        'COL_IP_ADDRESS' => 'IP_ADDRESS',
        'ip_address' => 'IP_ADDRESS',
        'sessions.ip_address' => 'IP_ADDRESS',
        'UserAgent' => 'USER_AGENT',
        'Sessions.UserAgent' => 'USER_AGENT',
        'userAgent' => 'USER_AGENT',
        'sessions.userAgent' => 'USER_AGENT',
        'SessionsTableMap::COL_USER_AGENT' => 'USER_AGENT',
        'COL_USER_AGENT' => 'USER_AGENT',
        'user_agent' => 'USER_AGENT',
        'sessions.user_agent' => 'USER_AGENT',
        'Payload' => 'PAYLOAD',
        'Sessions.Payload' => 'PAYLOAD',
        'payload' => 'PAYLOAD',
        'sessions.payload' => 'PAYLOAD',
        'SessionsTableMap::COL_PAYLOAD' => 'PAYLOAD',
        'COL_PAYLOAD' => 'PAYLOAD',
        'LastActivity' => 'LAST_ACTIVITY',
        'Sessions.LastActivity' => 'LAST_ACTIVITY',
        'lastActivity' => 'LAST_ACTIVITY',
        'sessions.lastActivity' => 'LAST_ACTIVITY',
        'SessionsTableMap::COL_LAST_ACTIVITY' => 'LAST_ACTIVITY',
        'COL_LAST_ACTIVITY' => 'LAST_ACTIVITY',
        'last_activity' => 'LAST_ACTIVITY',
        'sessions.last_activity' => 'LAST_ACTIVITY',
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
        $this->setName('sessions');
        $this->setPhpName('Sessions');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Propel\\Sessions');
        $this->setPackage('App.Propel');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id', 'Id', 'VARCHAR', true, 255, null);
        $this->addColumn('user_id', 'UserId', 'BIGINT', false, null, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', false, 45, null);
        $this->addColumn('user_agent', 'UserAgent', 'LONGVARCHAR', false, null, null);
        $this->addColumn('payload', 'Payload', 'CLOB', true, null, null);
        $this->addColumn('last_activity', 'LastActivity', 'INTEGER', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
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
        return (string) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? SessionsTableMap::CLASS_DEFAULT : SessionsTableMap::OM_CLASS;
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
     * @return array (Sessions object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SessionsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SessionsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SessionsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SessionsTableMap::OM_CLASS;
            /** @var Sessions $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SessionsTableMap::addInstanceToPool($obj, $key);
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
            $key = SessionsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SessionsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Sessions $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SessionsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SessionsTableMap::COL_ID);
            $criteria->addSelectColumn(SessionsTableMap::COL_USER_ID);
            $criteria->addSelectColumn(SessionsTableMap::COL_IP_ADDRESS);
            $criteria->addSelectColumn(SessionsTableMap::COL_USER_AGENT);
            $criteria->addSelectColumn(SessionsTableMap::COL_PAYLOAD);
            $criteria->addSelectColumn(SessionsTableMap::COL_LAST_ACTIVITY);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.ip_address');
            $criteria->addSelectColumn($alias . '.user_agent');
            $criteria->addSelectColumn($alias . '.payload');
            $criteria->addSelectColumn($alias . '.last_activity');
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
            $criteria->removeSelectColumn(SessionsTableMap::COL_ID);
            $criteria->removeSelectColumn(SessionsTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(SessionsTableMap::COL_IP_ADDRESS);
            $criteria->removeSelectColumn(SessionsTableMap::COL_USER_AGENT);
            $criteria->removeSelectColumn(SessionsTableMap::COL_PAYLOAD);
            $criteria->removeSelectColumn(SessionsTableMap::COL_LAST_ACTIVITY);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.user_id');
            $criteria->removeSelectColumn($alias . '.ip_address');
            $criteria->removeSelectColumn($alias . '.user_agent');
            $criteria->removeSelectColumn($alias . '.payload');
            $criteria->removeSelectColumn($alias . '.last_activity');
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
        return Propel::getServiceContainer()->getDatabaseMap(SessionsTableMap::DATABASE_NAME)->getTable(SessionsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Sessions or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Sessions object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SessionsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Propel\Sessions) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SessionsTableMap::DATABASE_NAME);
            $criteria->add(SessionsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SessionsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SessionsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SessionsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SessionsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Sessions or Criteria object.
     *
     * @param mixed $criteria Criteria or Sessions object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Sessions object
        }


        // Set the correct dbName
        $query = SessionsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
