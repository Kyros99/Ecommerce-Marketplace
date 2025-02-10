<?php

namespace App\Propel\Map;

use App\Propel\ProductReview;
use App\Propel\ProductReviewQuery;
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
 * This class defines the structure of the 'product_review' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ProductReviewTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'App.Propel.Map.ProductReviewTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'product_review';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'ProductReview';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Propel\\ProductReview';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'App.Propel.ProductReview';

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
     * the column name for the review_id field
     */
    public const COL_REVIEW_ID = 'product_review.review_id';

    /**
     * the column name for the product_id field
     */
    public const COL_PRODUCT_ID = 'product_review.product_id';

    /**
     * the column name for the score field
     */
    public const COL_SCORE = 'product_review.score';

    /**
     * the column name for the review field
     */
    public const COL_REVIEW = 'product_review.review';

    /**
     * the column name for the user_id field
     */
    public const COL_USER_ID = 'product_review.user_id';

    /**
     * the column name for the created_at field
     */
    public const COL_CREATED_AT = 'product_review.created_at';

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
        self::TYPE_PHPNAME       => ['ReviewId', 'ProductId', 'Score', 'Review', 'UserId', 'CreatedAt', ],
        self::TYPE_CAMELNAME     => ['reviewId', 'productId', 'score', 'review', 'userId', 'createdAt', ],
        self::TYPE_COLNAME       => [ProductReviewTableMap::COL_REVIEW_ID, ProductReviewTableMap::COL_PRODUCT_ID, ProductReviewTableMap::COL_SCORE, ProductReviewTableMap::COL_REVIEW, ProductReviewTableMap::COL_USER_ID, ProductReviewTableMap::COL_CREATED_AT, ],
        self::TYPE_FIELDNAME     => ['review_id', 'product_id', 'score', 'review', 'user_id', 'created_at', ],
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
        self::TYPE_PHPNAME       => ['ReviewId' => 0, 'ProductId' => 1, 'Score' => 2, 'Review' => 3, 'UserId' => 4, 'CreatedAt' => 5, ],
        self::TYPE_CAMELNAME     => ['reviewId' => 0, 'productId' => 1, 'score' => 2, 'review' => 3, 'userId' => 4, 'createdAt' => 5, ],
        self::TYPE_COLNAME       => [ProductReviewTableMap::COL_REVIEW_ID => 0, ProductReviewTableMap::COL_PRODUCT_ID => 1, ProductReviewTableMap::COL_SCORE => 2, ProductReviewTableMap::COL_REVIEW => 3, ProductReviewTableMap::COL_USER_ID => 4, ProductReviewTableMap::COL_CREATED_AT => 5, ],
        self::TYPE_FIELDNAME     => ['review_id' => 0, 'product_id' => 1, 'score' => 2, 'review' => 3, 'user_id' => 4, 'created_at' => 5, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'ReviewId' => 'REVIEW_ID',
        'ProductReview.ReviewId' => 'REVIEW_ID',
        'reviewId' => 'REVIEW_ID',
        'productReview.reviewId' => 'REVIEW_ID',
        'ProductReviewTableMap::COL_REVIEW_ID' => 'REVIEW_ID',
        'COL_REVIEW_ID' => 'REVIEW_ID',
        'review_id' => 'REVIEW_ID',
        'product_review.review_id' => 'REVIEW_ID',
        'ProductId' => 'PRODUCT_ID',
        'ProductReview.ProductId' => 'PRODUCT_ID',
        'productId' => 'PRODUCT_ID',
        'productReview.productId' => 'PRODUCT_ID',
        'ProductReviewTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
        'COL_PRODUCT_ID' => 'PRODUCT_ID',
        'product_id' => 'PRODUCT_ID',
        'product_review.product_id' => 'PRODUCT_ID',
        'Score' => 'SCORE',
        'ProductReview.Score' => 'SCORE',
        'score' => 'SCORE',
        'productReview.score' => 'SCORE',
        'ProductReviewTableMap::COL_SCORE' => 'SCORE',
        'COL_SCORE' => 'SCORE',
        'product_review.score' => 'SCORE',
        'Review' => 'REVIEW',
        'ProductReview.Review' => 'REVIEW',
        'review' => 'REVIEW',
        'productReview.review' => 'REVIEW',
        'ProductReviewTableMap::COL_REVIEW' => 'REVIEW',
        'COL_REVIEW' => 'REVIEW',
        'product_review.review' => 'REVIEW',
        'UserId' => 'USER_ID',
        'ProductReview.UserId' => 'USER_ID',
        'userId' => 'USER_ID',
        'productReview.userId' => 'USER_ID',
        'ProductReviewTableMap::COL_USER_ID' => 'USER_ID',
        'COL_USER_ID' => 'USER_ID',
        'user_id' => 'USER_ID',
        'product_review.user_id' => 'USER_ID',
        'CreatedAt' => 'CREATED_AT',
        'ProductReview.CreatedAt' => 'CREATED_AT',
        'createdAt' => 'CREATED_AT',
        'productReview.createdAt' => 'CREATED_AT',
        'ProductReviewTableMap::COL_CREATED_AT' => 'CREATED_AT',
        'COL_CREATED_AT' => 'CREATED_AT',
        'created_at' => 'CREATED_AT',
        'product_review.created_at' => 'CREATED_AT',
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
        $this->setName('product_review');
        $this->setPhpName('ProductReview');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Propel\\ProductReview');
        $this->setPackage('App.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('review_id', 'ReviewId', 'INTEGER', true, null, null);
        $this->addForeignKey('product_id', 'ProductId', 'INTEGER', 'product', 'product_id', true, null, null);
        $this->addColumn('score', 'Score', 'INTEGER', true, null, null);
        $this->addColumn('review', 'Review', 'VARCHAR', true, 200, null);
        $this->addForeignKey('user_id', 'UserId', 'INTEGER', 'user', 'user_id', true, null, null);
        $this->addColumn('created_at', 'CreatedAt', 'DATETIME', true, null, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Product', '\\App\\Propel\\Product', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':product_id',
    1 => ':product_id',
  ),
), 'CASCADE', 'CASCADE', null, false);
        $this->addRelation('User', '\\App\\Propel\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':user_id',
    1 => ':user_id',
  ),
), 'CASCADE', 'CASCADE', null, false);
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ReviewId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ProductReviewTableMap::CLASS_DEFAULT : ProductReviewTableMap::OM_CLASS;
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
     * @return array (ProductReview object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = ProductReviewTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProductReviewTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProductReviewTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductReviewTableMap::OM_CLASS;
            /** @var ProductReview $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProductReviewTableMap::addInstanceToPool($obj, $key);
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
            $key = ProductReviewTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProductReviewTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var ProductReview $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductReviewTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProductReviewTableMap::COL_REVIEW_ID);
            $criteria->addSelectColumn(ProductReviewTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(ProductReviewTableMap::COL_SCORE);
            $criteria->addSelectColumn(ProductReviewTableMap::COL_REVIEW);
            $criteria->addSelectColumn(ProductReviewTableMap::COL_USER_ID);
            $criteria->addSelectColumn(ProductReviewTableMap::COL_CREATED_AT);
        } else {
            $criteria->addSelectColumn($alias . '.review_id');
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.score');
            $criteria->addSelectColumn($alias . '.review');
            $criteria->addSelectColumn($alias . '.user_id');
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
            $criteria->removeSelectColumn(ProductReviewTableMap::COL_REVIEW_ID);
            $criteria->removeSelectColumn(ProductReviewTableMap::COL_PRODUCT_ID);
            $criteria->removeSelectColumn(ProductReviewTableMap::COL_SCORE);
            $criteria->removeSelectColumn(ProductReviewTableMap::COL_REVIEW);
            $criteria->removeSelectColumn(ProductReviewTableMap::COL_USER_ID);
            $criteria->removeSelectColumn(ProductReviewTableMap::COL_CREATED_AT);
        } else {
            $criteria->removeSelectColumn($alias . '.review_id');
            $criteria->removeSelectColumn($alias . '.product_id');
            $criteria->removeSelectColumn($alias . '.score');
            $criteria->removeSelectColumn($alias . '.review');
            $criteria->removeSelectColumn($alias . '.user_id');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProductReviewTableMap::DATABASE_NAME)->getTable(ProductReviewTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a ProductReview or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or ProductReview object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProductReviewTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Propel\ProductReview) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductReviewTableMap::DATABASE_NAME);
            $criteria->add(ProductReviewTableMap::COL_REVIEW_ID, (array) $values, Criteria::IN);
        }

        $query = ProductReviewQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProductReviewTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProductReviewTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the product_review table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return ProductReviewQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a ProductReview or Criteria object.
     *
     * @param mixed $criteria Criteria or ProductReview object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductReviewTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from ProductReview object
        }

        if ($criteria->containsKey(ProductReviewTableMap::COL_REVIEW_ID) && $criteria->keyContainsValue(ProductReviewTableMap::COL_REVIEW_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductReviewTableMap::COL_REVIEW_ID.')');
        }


        // Set the correct dbName
        $query = ProductReviewQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
