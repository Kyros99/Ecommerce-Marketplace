<?php

namespace App\Propel\Map;

use App\Propel\Product;
use App\Propel\ProductQuery;
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
 * This class defines the structure of the 'product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ProductTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'App.Propel.Map.ProductTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'product';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Product';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\App\\Propel\\Product';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'App.Propel.Product';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 11;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 11;

    /**
     * the column name for the product_id field
     */
    public const COL_PRODUCT_ID = 'product.product_id';

    /**
     * the column name for the business_id field
     */
    public const COL_BUSINESS_ID = 'product.business_id';

    /**
     * the column name for the category_id field
     */
    public const COL_CATEGORY_ID = 'product.category_id';

    /**
     * the column name for the title field
     */
    public const COL_TITLE = 'product.title';

    /**
     * the column name for the code field
     */
    public const COL_CODE = 'product.code';

    /**
     * the column name for the short_description field
     */
    public const COL_SHORT_DESCRIPTION = 'product.short_description';

    /**
     * the column name for the long_description field
     */
    public const COL_LONG_DESCRIPTION = 'product.long_description';

    /**
     * the column name for the price field
     */
    public const COL_PRICE = 'product.price';

    /**
     * the column name for the amount field
     */
    public const COL_AMOUNT = 'product.amount';

    /**
     * the column name for the image_url field
     */
    public const COL_IMAGE_URL = 'product.image_url';

    /**
     * the column name for the avg_review field
     */
    public const COL_AVG_REVIEW = 'product.avg_review';

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
        self::TYPE_PHPNAME       => ['ProductId', 'BusinessId', 'CategoryId', 'Title', 'Code', 'ShortDescription', 'LongDescription', 'Price', 'Amount', 'ImageUrl', 'AvgReview', ],
        self::TYPE_CAMELNAME     => ['productId', 'businessId', 'categoryId', 'title', 'code', 'shortDescription', 'longDescription', 'price', 'amount', 'imageUrl', 'avgReview', ],
        self::TYPE_COLNAME       => [ProductTableMap::COL_PRODUCT_ID, ProductTableMap::COL_BUSINESS_ID, ProductTableMap::COL_CATEGORY_ID, ProductTableMap::COL_TITLE, ProductTableMap::COL_CODE, ProductTableMap::COL_SHORT_DESCRIPTION, ProductTableMap::COL_LONG_DESCRIPTION, ProductTableMap::COL_PRICE, ProductTableMap::COL_AMOUNT, ProductTableMap::COL_IMAGE_URL, ProductTableMap::COL_AVG_REVIEW, ],
        self::TYPE_FIELDNAME     => ['product_id', 'business_id', 'category_id', 'title', 'code', 'short_description', 'long_description', 'price', 'amount', 'image_url', 'avg_review', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
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
        self::TYPE_PHPNAME       => ['ProductId' => 0, 'BusinessId' => 1, 'CategoryId' => 2, 'Title' => 3, 'Code' => 4, 'ShortDescription' => 5, 'LongDescription' => 6, 'Price' => 7, 'Amount' => 8, 'ImageUrl' => 9, 'AvgReview' => 10, ],
        self::TYPE_CAMELNAME     => ['productId' => 0, 'businessId' => 1, 'categoryId' => 2, 'title' => 3, 'code' => 4, 'shortDescription' => 5, 'longDescription' => 6, 'price' => 7, 'amount' => 8, 'imageUrl' => 9, 'avgReview' => 10, ],
        self::TYPE_COLNAME       => [ProductTableMap::COL_PRODUCT_ID => 0, ProductTableMap::COL_BUSINESS_ID => 1, ProductTableMap::COL_CATEGORY_ID => 2, ProductTableMap::COL_TITLE => 3, ProductTableMap::COL_CODE => 4, ProductTableMap::COL_SHORT_DESCRIPTION => 5, ProductTableMap::COL_LONG_DESCRIPTION => 6, ProductTableMap::COL_PRICE => 7, ProductTableMap::COL_AMOUNT => 8, ProductTableMap::COL_IMAGE_URL => 9, ProductTableMap::COL_AVG_REVIEW => 10, ],
        self::TYPE_FIELDNAME     => ['product_id' => 0, 'business_id' => 1, 'category_id' => 2, 'title' => 3, 'code' => 4, 'short_description' => 5, 'long_description' => 6, 'price' => 7, 'amount' => 8, 'image_url' => 9, 'avg_review' => 10, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'ProductId' => 'PRODUCT_ID',
        'Product.ProductId' => 'PRODUCT_ID',
        'productId' => 'PRODUCT_ID',
        'product.productId' => 'PRODUCT_ID',
        'ProductTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
        'COL_PRODUCT_ID' => 'PRODUCT_ID',
        'product_id' => 'PRODUCT_ID',
        'product.product_id' => 'PRODUCT_ID',
        'BusinessId' => 'BUSINESS_ID',
        'Product.BusinessId' => 'BUSINESS_ID',
        'businessId' => 'BUSINESS_ID',
        'product.businessId' => 'BUSINESS_ID',
        'ProductTableMap::COL_BUSINESS_ID' => 'BUSINESS_ID',
        'COL_BUSINESS_ID' => 'BUSINESS_ID',
        'business_id' => 'BUSINESS_ID',
        'product.business_id' => 'BUSINESS_ID',
        'CategoryId' => 'CATEGORY_ID',
        'Product.CategoryId' => 'CATEGORY_ID',
        'categoryId' => 'CATEGORY_ID',
        'product.categoryId' => 'CATEGORY_ID',
        'ProductTableMap::COL_CATEGORY_ID' => 'CATEGORY_ID',
        'COL_CATEGORY_ID' => 'CATEGORY_ID',
        'category_id' => 'CATEGORY_ID',
        'product.category_id' => 'CATEGORY_ID',
        'Title' => 'TITLE',
        'Product.Title' => 'TITLE',
        'title' => 'TITLE',
        'product.title' => 'TITLE',
        'ProductTableMap::COL_TITLE' => 'TITLE',
        'COL_TITLE' => 'TITLE',
        'Code' => 'CODE',
        'Product.Code' => 'CODE',
        'code' => 'CODE',
        'product.code' => 'CODE',
        'ProductTableMap::COL_CODE' => 'CODE',
        'COL_CODE' => 'CODE',
        'ShortDescription' => 'SHORT_DESCRIPTION',
        'Product.ShortDescription' => 'SHORT_DESCRIPTION',
        'shortDescription' => 'SHORT_DESCRIPTION',
        'product.shortDescription' => 'SHORT_DESCRIPTION',
        'ProductTableMap::COL_SHORT_DESCRIPTION' => 'SHORT_DESCRIPTION',
        'COL_SHORT_DESCRIPTION' => 'SHORT_DESCRIPTION',
        'short_description' => 'SHORT_DESCRIPTION',
        'product.short_description' => 'SHORT_DESCRIPTION',
        'LongDescription' => 'LONG_DESCRIPTION',
        'Product.LongDescription' => 'LONG_DESCRIPTION',
        'longDescription' => 'LONG_DESCRIPTION',
        'product.longDescription' => 'LONG_DESCRIPTION',
        'ProductTableMap::COL_LONG_DESCRIPTION' => 'LONG_DESCRIPTION',
        'COL_LONG_DESCRIPTION' => 'LONG_DESCRIPTION',
        'long_description' => 'LONG_DESCRIPTION',
        'product.long_description' => 'LONG_DESCRIPTION',
        'Price' => 'PRICE',
        'Product.Price' => 'PRICE',
        'price' => 'PRICE',
        'product.price' => 'PRICE',
        'ProductTableMap::COL_PRICE' => 'PRICE',
        'COL_PRICE' => 'PRICE',
        'Amount' => 'AMOUNT',
        'Product.Amount' => 'AMOUNT',
        'amount' => 'AMOUNT',
        'product.amount' => 'AMOUNT',
        'ProductTableMap::COL_AMOUNT' => 'AMOUNT',
        'COL_AMOUNT' => 'AMOUNT',
        'ImageUrl' => 'IMAGE_URL',
        'Product.ImageUrl' => 'IMAGE_URL',
        'imageUrl' => 'IMAGE_URL',
        'product.imageUrl' => 'IMAGE_URL',
        'ProductTableMap::COL_IMAGE_URL' => 'IMAGE_URL',
        'COL_IMAGE_URL' => 'IMAGE_URL',
        'image_url' => 'IMAGE_URL',
        'product.image_url' => 'IMAGE_URL',
        'AvgReview' => 'AVG_REVIEW',
        'Product.AvgReview' => 'AVG_REVIEW',
        'avgReview' => 'AVG_REVIEW',
        'product.avgReview' => 'AVG_REVIEW',
        'ProductTableMap::COL_AVG_REVIEW' => 'AVG_REVIEW',
        'COL_AVG_REVIEW' => 'AVG_REVIEW',
        'avg_review' => 'AVG_REVIEW',
        'product.avg_review' => 'AVG_REVIEW',
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
        $this->setName('product');
        $this->setPhpName('Product');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\App\\Propel\\Product');
        $this->setPackage('App.Propel');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('product_id', 'ProductId', 'INTEGER', true, null, null);
        $this->addForeignKey('business_id', 'BusinessId', 'INTEGER', 'business', 'business_id', true, null, null);
        $this->addForeignKey('category_id', 'CategoryId', 'INTEGER', 'product_category', 'category_id', true, null, null);
        $this->addColumn('title', 'Title', 'VARCHAR', true, 45, null);
        $this->addColumn('code', 'Code', 'VARCHAR', true, 10, null);
        $this->addColumn('short_description', 'ShortDescription', 'VARCHAR', false, 250, null);
        $this->addColumn('long_description', 'LongDescription', 'LONGVARCHAR', false, null, null);
        $this->addColumn('price', 'Price', 'DECIMAL', true, 10, null);
        $this->addColumn('amount', 'Amount', 'INTEGER', true, null, null);
        $this->addColumn('image_url', 'ImageUrl', 'VARCHAR', false, 250, null);
        $this->addColumn('avg_review', 'AvgReview', 'DECIMAL', false, 3, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
        $this->addRelation('Business', '\\App\\Propel\\Business', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':business_id',
    1 => ':business_id',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('ProductCategory', '\\App\\Propel\\ProductCategory', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':category_id',
    1 => ':category_id',
  ),
), null, 'CASCADE', null, false);
        $this->addRelation('CartProduct', '\\App\\Propel\\CartProduct', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':product_id',
    1 => ':product_id',
  ),
), 'CASCADE', 'CASCADE', 'CartProducts', false);
        $this->addRelation('OrderProduct', '\\App\\Propel\\OrderProduct', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':product_id',
    1 => ':product_id',
  ),
), null, 'CASCADE', 'OrderProducts', false);
        $this->addRelation('ProductReview', '\\App\\Propel\\ProductReview', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':product_id',
    1 => ':product_id',
  ),
), 'CASCADE', 'CASCADE', 'ProductReviews', false);
    }

    /**
     * Method to invalidate the instance pool of all tables related to product     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool(): void
    {
        // Invalidate objects in related instance pools,
        // since one or more of them may be deleted by ON DELETE CASCADE/SETNULL rule.
        CartProductTableMap::clearInstancePool();
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
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
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
                : self::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)
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
        return $withPrefix ? ProductTableMap::CLASS_DEFAULT : ProductTableMap::OM_CLASS;
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
     * @return array (Product object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = ProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProductTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProductTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProductTableMap::OM_CLASS;
            /** @var Product $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProductTableMap::addInstanceToPool($obj, $key);
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
            $key = ProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProductTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Product $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProductTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProductTableMap::COL_PRODUCT_ID);
            $criteria->addSelectColumn(ProductTableMap::COL_BUSINESS_ID);
            $criteria->addSelectColumn(ProductTableMap::COL_CATEGORY_ID);
            $criteria->addSelectColumn(ProductTableMap::COL_TITLE);
            $criteria->addSelectColumn(ProductTableMap::COL_CODE);
            $criteria->addSelectColumn(ProductTableMap::COL_SHORT_DESCRIPTION);
            $criteria->addSelectColumn(ProductTableMap::COL_LONG_DESCRIPTION);
            $criteria->addSelectColumn(ProductTableMap::COL_PRICE);
            $criteria->addSelectColumn(ProductTableMap::COL_AMOUNT);
            $criteria->addSelectColumn(ProductTableMap::COL_IMAGE_URL);
            $criteria->addSelectColumn(ProductTableMap::COL_AVG_REVIEW);
        } else {
            $criteria->addSelectColumn($alias . '.product_id');
            $criteria->addSelectColumn($alias . '.business_id');
            $criteria->addSelectColumn($alias . '.category_id');
            $criteria->addSelectColumn($alias . '.title');
            $criteria->addSelectColumn($alias . '.code');
            $criteria->addSelectColumn($alias . '.short_description');
            $criteria->addSelectColumn($alias . '.long_description');
            $criteria->addSelectColumn($alias . '.price');
            $criteria->addSelectColumn($alias . '.amount');
            $criteria->addSelectColumn($alias . '.image_url');
            $criteria->addSelectColumn($alias . '.avg_review');
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
            $criteria->removeSelectColumn(ProductTableMap::COL_PRODUCT_ID);
            $criteria->removeSelectColumn(ProductTableMap::COL_BUSINESS_ID);
            $criteria->removeSelectColumn(ProductTableMap::COL_CATEGORY_ID);
            $criteria->removeSelectColumn(ProductTableMap::COL_TITLE);
            $criteria->removeSelectColumn(ProductTableMap::COL_CODE);
            $criteria->removeSelectColumn(ProductTableMap::COL_SHORT_DESCRIPTION);
            $criteria->removeSelectColumn(ProductTableMap::COL_LONG_DESCRIPTION);
            $criteria->removeSelectColumn(ProductTableMap::COL_PRICE);
            $criteria->removeSelectColumn(ProductTableMap::COL_AMOUNT);
            $criteria->removeSelectColumn(ProductTableMap::COL_IMAGE_URL);
            $criteria->removeSelectColumn(ProductTableMap::COL_AVG_REVIEW);
        } else {
            $criteria->removeSelectColumn($alias . '.product_id');
            $criteria->removeSelectColumn($alias . '.business_id');
            $criteria->removeSelectColumn($alias . '.category_id');
            $criteria->removeSelectColumn($alias . '.title');
            $criteria->removeSelectColumn($alias . '.code');
            $criteria->removeSelectColumn($alias . '.short_description');
            $criteria->removeSelectColumn($alias . '.long_description');
            $criteria->removeSelectColumn($alias . '.price');
            $criteria->removeSelectColumn($alias . '.amount');
            $criteria->removeSelectColumn($alias . '.image_url');
            $criteria->removeSelectColumn($alias . '.avg_review');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProductTableMap::DATABASE_NAME)->getTable(ProductTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Product or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Product object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \App\Propel\Product) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProductTableMap::DATABASE_NAME);
            $criteria->add(ProductTableMap::COL_PRODUCT_ID, (array) $values, Criteria::IN);
        }

        $query = ProductQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProductTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProductTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return ProductQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Product or Criteria object.
     *
     * @param mixed $criteria Criteria or Product object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Product object
        }

        if ($criteria->containsKey(ProductTableMap::COL_PRODUCT_ID) && $criteria->keyContainsValue(ProductTableMap::COL_PRODUCT_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProductTableMap::COL_PRODUCT_ID.')');
        }


        // Set the correct dbName
        $query = ProductQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
