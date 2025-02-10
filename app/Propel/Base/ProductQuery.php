<?php

namespace App\Propel\Base;

use \Exception;
use \PDO;
use App\Propel\Product as ChildProduct;
use App\Propel\ProductQuery as ChildProductQuery;
use App\Propel\Map\ProductTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `product` table.
 *
 * @method     ChildProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildProductQuery orderByBusinessId($order = Criteria::ASC) Order by the business_id column
 * @method     ChildProductQuery orderByCategoryId($order = Criteria::ASC) Order by the category_id column
 * @method     ChildProductQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildProductQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildProductQuery orderByShortDescription($order = Criteria::ASC) Order by the short_description column
 * @method     ChildProductQuery orderByLongDescription($order = Criteria::ASC) Order by the long_description column
 * @method     ChildProductQuery orderByPrice($order = Criteria::ASC) Order by the price column
 * @method     ChildProductQuery orderByAmount($order = Criteria::ASC) Order by the amount column
 * @method     ChildProductQuery orderByImageUrl($order = Criteria::ASC) Order by the image_url column
 * @method     ChildProductQuery orderByAvgReview($order = Criteria::ASC) Order by the avg_review column
 *
 * @method     ChildProductQuery groupByProductId() Group by the product_id column
 * @method     ChildProductQuery groupByBusinessId() Group by the business_id column
 * @method     ChildProductQuery groupByCategoryId() Group by the category_id column
 * @method     ChildProductQuery groupByTitle() Group by the title column
 * @method     ChildProductQuery groupByCode() Group by the code column
 * @method     ChildProductQuery groupByShortDescription() Group by the short_description column
 * @method     ChildProductQuery groupByLongDescription() Group by the long_description column
 * @method     ChildProductQuery groupByPrice() Group by the price column
 * @method     ChildProductQuery groupByAmount() Group by the amount column
 * @method     ChildProductQuery groupByImageUrl() Group by the image_url column
 * @method     ChildProductQuery groupByAvgReview() Group by the avg_review column
 *
 * @method     ChildProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProductQuery leftJoinBusiness($relationAlias = null) Adds a LEFT JOIN clause to the query using the Business relation
 * @method     ChildProductQuery rightJoinBusiness($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Business relation
 * @method     ChildProductQuery innerJoinBusiness($relationAlias = null) Adds a INNER JOIN clause to the query using the Business relation
 *
 * @method     ChildProductQuery joinWithBusiness($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Business relation
 *
 * @method     ChildProductQuery leftJoinWithBusiness() Adds a LEFT JOIN clause and with to the query using the Business relation
 * @method     ChildProductQuery rightJoinWithBusiness() Adds a RIGHT JOIN clause and with to the query using the Business relation
 * @method     ChildProductQuery innerJoinWithBusiness() Adds a INNER JOIN clause and with to the query using the Business relation
 *
 * @method     ChildProductQuery leftJoinProductCategory($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductCategory relation
 * @method     ChildProductQuery rightJoinProductCategory($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductCategory relation
 * @method     ChildProductQuery innerJoinProductCategory($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductCategory relation
 *
 * @method     ChildProductQuery joinWithProductCategory($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProductCategory relation
 *
 * @method     ChildProductQuery leftJoinWithProductCategory() Adds a LEFT JOIN clause and with to the query using the ProductCategory relation
 * @method     ChildProductQuery rightJoinWithProductCategory() Adds a RIGHT JOIN clause and with to the query using the ProductCategory relation
 * @method     ChildProductQuery innerJoinWithProductCategory() Adds a INNER JOIN clause and with to the query using the ProductCategory relation
 *
 * @method     ChildProductQuery leftJoinCartProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the CartProduct relation
 * @method     ChildProductQuery rightJoinCartProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CartProduct relation
 * @method     ChildProductQuery innerJoinCartProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the CartProduct relation
 *
 * @method     ChildProductQuery joinWithCartProduct($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the CartProduct relation
 *
 * @method     ChildProductQuery leftJoinWithCartProduct() Adds a LEFT JOIN clause and with to the query using the CartProduct relation
 * @method     ChildProductQuery rightJoinWithCartProduct() Adds a RIGHT JOIN clause and with to the query using the CartProduct relation
 * @method     ChildProductQuery innerJoinWithCartProduct() Adds a INNER JOIN clause and with to the query using the CartProduct relation
 *
 * @method     ChildProductQuery leftJoinOrderProduct($relationAlias = null) Adds a LEFT JOIN clause to the query using the OrderProduct relation
 * @method     ChildProductQuery rightJoinOrderProduct($relationAlias = null) Adds a RIGHT JOIN clause to the query using the OrderProduct relation
 * @method     ChildProductQuery innerJoinOrderProduct($relationAlias = null) Adds a INNER JOIN clause to the query using the OrderProduct relation
 *
 * @method     ChildProductQuery joinWithOrderProduct($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the OrderProduct relation
 *
 * @method     ChildProductQuery leftJoinWithOrderProduct() Adds a LEFT JOIN clause and with to the query using the OrderProduct relation
 * @method     ChildProductQuery rightJoinWithOrderProduct() Adds a RIGHT JOIN clause and with to the query using the OrderProduct relation
 * @method     ChildProductQuery innerJoinWithOrderProduct() Adds a INNER JOIN clause and with to the query using the OrderProduct relation
 *
 * @method     ChildProductQuery leftJoinProductReview($relationAlias = null) Adds a LEFT JOIN clause to the query using the ProductReview relation
 * @method     ChildProductQuery rightJoinProductReview($relationAlias = null) Adds a RIGHT JOIN clause to the query using the ProductReview relation
 * @method     ChildProductQuery innerJoinProductReview($relationAlias = null) Adds a INNER JOIN clause to the query using the ProductReview relation
 *
 * @method     ChildProductQuery joinWithProductReview($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the ProductReview relation
 *
 * @method     ChildProductQuery leftJoinWithProductReview() Adds a LEFT JOIN clause and with to the query using the ProductReview relation
 * @method     ChildProductQuery rightJoinWithProductReview() Adds a RIGHT JOIN clause and with to the query using the ProductReview relation
 * @method     ChildProductQuery innerJoinWithProductReview() Adds a INNER JOIN clause and with to the query using the ProductReview relation
 *
 * @method     \App\Propel\BusinessQuery|\App\Propel\ProductCategoryQuery|\App\Propel\CartProductQuery|\App\Propel\OrderProductQuery|\App\Propel\ProductReviewQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildProduct|null findOne(?ConnectionInterface $con = null) Return the first ChildProduct matching the query
 * @method     ChildProduct findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildProduct matching the query, or a new ChildProduct object populated from the query conditions when no match is found
 *
 * @method     ChildProduct|null findOneByProductId(int $product_id) Return the first ChildProduct filtered by the product_id column
 * @method     ChildProduct|null findOneByBusinessId(int $business_id) Return the first ChildProduct filtered by the business_id column
 * @method     ChildProduct|null findOneByCategoryId(int $category_id) Return the first ChildProduct filtered by the category_id column
 * @method     ChildProduct|null findOneByTitle(string $title) Return the first ChildProduct filtered by the title column
 * @method     ChildProduct|null findOneByCode(string $code) Return the first ChildProduct filtered by the code column
 * @method     ChildProduct|null findOneByShortDescription(string $short_description) Return the first ChildProduct filtered by the short_description column
 * @method     ChildProduct|null findOneByLongDescription(string $long_description) Return the first ChildProduct filtered by the long_description column
 * @method     ChildProduct|null findOneByPrice(string $price) Return the first ChildProduct filtered by the price column
 * @method     ChildProduct|null findOneByAmount(int $amount) Return the first ChildProduct filtered by the amount column
 * @method     ChildProduct|null findOneByImageUrl(string $image_url) Return the first ChildProduct filtered by the image_url column
 * @method     ChildProduct|null findOneByAvgReview(string $avg_review) Return the first ChildProduct filtered by the avg_review column
 *
 * @method     ChildProduct requirePk($key, ?ConnectionInterface $con = null) Return the ChildProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOne(?ConnectionInterface $con = null) Return the first ChildProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProduct requireOneByProductId(int $product_id) Return the first ChildProduct filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByBusinessId(int $business_id) Return the first ChildProduct filtered by the business_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByCategoryId(int $category_id) Return the first ChildProduct filtered by the category_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByTitle(string $title) Return the first ChildProduct filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByCode(string $code) Return the first ChildProduct filtered by the code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByShortDescription(string $short_description) Return the first ChildProduct filtered by the short_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByLongDescription(string $long_description) Return the first ChildProduct filtered by the long_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByPrice(string $price) Return the first ChildProduct filtered by the price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByAmount(int $amount) Return the first ChildProduct filtered by the amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByImageUrl(string $image_url) Return the first ChildProduct filtered by the image_url column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByAvgReview(string $avg_review) Return the first ChildProduct filtered by the avg_review column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProduct[]|Collection find(?ConnectionInterface $con = null) Return ChildProduct objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildProduct> find(?ConnectionInterface $con = null) Return ChildProduct objects based on current ModelCriteria
 *
 * @method     ChildProduct[]|Collection findByProductId(int|array<int> $product_id) Return ChildProduct objects filtered by the product_id column
 * @psalm-method Collection&\Traversable<ChildProduct> findByProductId(int|array<int> $product_id) Return ChildProduct objects filtered by the product_id column
 * @method     ChildProduct[]|Collection findByBusinessId(int|array<int> $business_id) Return ChildProduct objects filtered by the business_id column
 * @psalm-method Collection&\Traversable<ChildProduct> findByBusinessId(int|array<int> $business_id) Return ChildProduct objects filtered by the business_id column
 * @method     ChildProduct[]|Collection findByCategoryId(int|array<int> $category_id) Return ChildProduct objects filtered by the category_id column
 * @psalm-method Collection&\Traversable<ChildProduct> findByCategoryId(int|array<int> $category_id) Return ChildProduct objects filtered by the category_id column
 * @method     ChildProduct[]|Collection findByTitle(string|array<string> $title) Return ChildProduct objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildProduct> findByTitle(string|array<string> $title) Return ChildProduct objects filtered by the title column
 * @method     ChildProduct[]|Collection findByCode(string|array<string> $code) Return ChildProduct objects filtered by the code column
 * @psalm-method Collection&\Traversable<ChildProduct> findByCode(string|array<string> $code) Return ChildProduct objects filtered by the code column
 * @method     ChildProduct[]|Collection findByShortDescription(string|array<string> $short_description) Return ChildProduct objects filtered by the short_description column
 * @psalm-method Collection&\Traversable<ChildProduct> findByShortDescription(string|array<string> $short_description) Return ChildProduct objects filtered by the short_description column
 * @method     ChildProduct[]|Collection findByLongDescription(string|array<string> $long_description) Return ChildProduct objects filtered by the long_description column
 * @psalm-method Collection&\Traversable<ChildProduct> findByLongDescription(string|array<string> $long_description) Return ChildProduct objects filtered by the long_description column
 * @method     ChildProduct[]|Collection findByPrice(string|array<string> $price) Return ChildProduct objects filtered by the price column
 * @psalm-method Collection&\Traversable<ChildProduct> findByPrice(string|array<string> $price) Return ChildProduct objects filtered by the price column
 * @method     ChildProduct[]|Collection findByAmount(int|array<int> $amount) Return ChildProduct objects filtered by the amount column
 * @psalm-method Collection&\Traversable<ChildProduct> findByAmount(int|array<int> $amount) Return ChildProduct objects filtered by the amount column
 * @method     ChildProduct[]|Collection findByImageUrl(string|array<string> $image_url) Return ChildProduct objects filtered by the image_url column
 * @psalm-method Collection&\Traversable<ChildProduct> findByImageUrl(string|array<string> $image_url) Return ChildProduct objects filtered by the image_url column
 * @method     ChildProduct[]|Collection findByAvgReview(string|array<string> $avg_review) Return ChildProduct objects filtered by the avg_review column
 * @psalm-method Collection&\Traversable<ChildProduct> findByAvgReview(string|array<string> $avg_review) Return ChildProduct objects filtered by the avg_review column
 *
 * @method     ChildProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildProduct> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class ProductQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Propel\Base\ProductQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Propel\\Product', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildProductQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildProductQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildProductQuery) {
            return $criteria;
        }
        $query = new ChildProductQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildProduct|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ProductTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ProductTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildProduct A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT product_id, business_id, category_id, title, code, short_description, long_description, price, amount, image_url, avg_review FROM product WHERE product_id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildProduct $obj */
            $obj = new ChildProduct();
            $obj->hydrate($row);
            ProductTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildProduct|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the product_id column
     *
     * Example usage:
     * <code>
     * $query->filterByProductId(1234); // WHERE product_id = 1234
     * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
     * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
     * </code>
     *
     * @param mixed $productId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByProductId($productId = null, ?string $comparison = null)
    {
        if (is_array($productId)) {
            $useMinMax = false;
            if (isset($productId['min'])) {
                $this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($productId['max'])) {
                $this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the business_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBusinessId(1234); // WHERE business_id = 1234
     * $query->filterByBusinessId(array(12, 34)); // WHERE business_id IN (12, 34)
     * $query->filterByBusinessId(array('min' => 12)); // WHERE business_id > 12
     * </code>
     *
     * @see       filterByBusiness()
     *
     * @param mixed $businessId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBusinessId($businessId = null, ?string $comparison = null)
    {
        if (is_array($businessId)) {
            $useMinMax = false;
            if (isset($businessId['min'])) {
                $this->addUsingAlias(ProductTableMap::COL_BUSINESS_ID, $businessId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($businessId['max'])) {
                $this->addUsingAlias(ProductTableMap::COL_BUSINESS_ID, $businessId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_BUSINESS_ID, $businessId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the category_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCategoryId(1234); // WHERE category_id = 1234
     * $query->filterByCategoryId(array(12, 34)); // WHERE category_id IN (12, 34)
     * $query->filterByCategoryId(array('min' => 12)); // WHERE category_id > 12
     * </code>
     *
     * @see       filterByProductCategory()
     *
     * @param mixed $categoryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCategoryId($categoryId = null, ?string $comparison = null)
    {
        if (is_array($categoryId)) {
            $useMinMax = false;
            if (isset($categoryId['min'])) {
                $this->addUsingAlias(ProductTableMap::COL_CATEGORY_ID, $categoryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($categoryId['max'])) {
                $this->addUsingAlias(ProductTableMap::COL_CATEGORY_ID, $categoryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_CATEGORY_ID, $categoryId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * $query->filterByTitle(['foo', 'bar']); // WHERE title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $title The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTitle($title = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_TITLE, $title, $comparison);

        return $this;
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%', Criteria::LIKE); // WHERE code LIKE '%fooValue%'
     * $query->filterByCode(['foo', 'bar']); // WHERE code IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $code The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCode($code = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_CODE, $code, $comparison);

        return $this;
    }

    /**
     * Filter the query on the short_description column
     *
     * Example usage:
     * <code>
     * $query->filterByShortDescription('fooValue');   // WHERE short_description = 'fooValue'
     * $query->filterByShortDescription('%fooValue%', Criteria::LIKE); // WHERE short_description LIKE '%fooValue%'
     * $query->filterByShortDescription(['foo', 'bar']); // WHERE short_description IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $shortDescription The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByShortDescription($shortDescription = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($shortDescription)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_SHORT_DESCRIPTION, $shortDescription, $comparison);

        return $this;
    }

    /**
     * Filter the query on the long_description column
     *
     * Example usage:
     * <code>
     * $query->filterByLongDescription('fooValue');   // WHERE long_description = 'fooValue'
     * $query->filterByLongDescription('%fooValue%', Criteria::LIKE); // WHERE long_description LIKE '%fooValue%'
     * $query->filterByLongDescription(['foo', 'bar']); // WHERE long_description IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $longDescription The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLongDescription($longDescription = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($longDescription)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_LONG_DESCRIPTION, $longDescription, $comparison);

        return $this;
    }

    /**
     * Filter the query on the price column
     *
     * Example usage:
     * <code>
     * $query->filterByPrice(1234); // WHERE price = 1234
     * $query->filterByPrice(array(12, 34)); // WHERE price IN (12, 34)
     * $query->filterByPrice(array('min' => 12)); // WHERE price > 12
     * </code>
     *
     * @param mixed $price The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrice($price = null, ?string $comparison = null)
    {
        if (is_array($price)) {
            $useMinMax = false;
            if (isset($price['min'])) {
                $this->addUsingAlias(ProductTableMap::COL_PRICE, $price['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($price['max'])) {
                $this->addUsingAlias(ProductTableMap::COL_PRICE, $price['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_PRICE, $price, $comparison);

        return $this;
    }

    /**
     * Filter the query on the amount column
     *
     * Example usage:
     * <code>
     * $query->filterByAmount(1234); // WHERE amount = 1234
     * $query->filterByAmount(array(12, 34)); // WHERE amount IN (12, 34)
     * $query->filterByAmount(array('min' => 12)); // WHERE amount > 12
     * </code>
     *
     * @param mixed $amount The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAmount($amount = null, ?string $comparison = null)
    {
        if (is_array($amount)) {
            $useMinMax = false;
            if (isset($amount['min'])) {
                $this->addUsingAlias(ProductTableMap::COL_AMOUNT, $amount['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($amount['max'])) {
                $this->addUsingAlias(ProductTableMap::COL_AMOUNT, $amount['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_AMOUNT, $amount, $comparison);

        return $this;
    }

    /**
     * Filter the query on the image_url column
     *
     * Example usage:
     * <code>
     * $query->filterByImageUrl('fooValue');   // WHERE image_url = 'fooValue'
     * $query->filterByImageUrl('%fooValue%', Criteria::LIKE); // WHERE image_url LIKE '%fooValue%'
     * $query->filterByImageUrl(['foo', 'bar']); // WHERE image_url IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $imageUrl The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByImageUrl($imageUrl = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($imageUrl)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_IMAGE_URL, $imageUrl, $comparison);

        return $this;
    }

    /**
     * Filter the query on the avg_review column
     *
     * Example usage:
     * <code>
     * $query->filterByAvgReview(1234); // WHERE avg_review = 1234
     * $query->filterByAvgReview(array(12, 34)); // WHERE avg_review IN (12, 34)
     * $query->filterByAvgReview(array('min' => 12)); // WHERE avg_review > 12
     * </code>
     *
     * @param mixed $avgReview The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByAvgReview($avgReview = null, ?string $comparison = null)
    {
        if (is_array($avgReview)) {
            $useMinMax = false;
            if (isset($avgReview['min'])) {
                $this->addUsingAlias(ProductTableMap::COL_AVG_REVIEW, $avgReview['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($avgReview['max'])) {
                $this->addUsingAlias(ProductTableMap::COL_AVG_REVIEW, $avgReview['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(ProductTableMap::COL_AVG_REVIEW, $avgReview, $comparison);

        return $this;
    }

    /**
     * Filter the query by a related \App\Propel\Business object
     *
     * @param \App\Propel\Business|ObjectCollection $business The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByBusiness($business, ?string $comparison = null)
    {
        if ($business instanceof \App\Propel\Business) {
            return $this
                ->addUsingAlias(ProductTableMap::COL_BUSINESS_ID, $business->getBusinessId(), $comparison);
        } elseif ($business instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(ProductTableMap::COL_BUSINESS_ID, $business->toKeyValue('PrimaryKey', 'BusinessId'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByBusiness() only accepts arguments of type \App\Propel\Business or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Business relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinBusiness(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Business');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Business');
        }

        return $this;
    }

    /**
     * Use the Business relation Business object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Propel\BusinessQuery A secondary query class using the current class as primary query
     */
    public function useBusinessQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBusiness($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Business', '\App\Propel\BusinessQuery');
    }

    /**
     * Use the Business relation Business object
     *
     * @param callable(\App\Propel\BusinessQuery):\App\Propel\BusinessQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withBusinessQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useBusinessQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to Business table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Propel\BusinessQuery The inner query object of the EXISTS statement
     */
    public function useBusinessExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Propel\BusinessQuery */
        $q = $this->useExistsQuery('Business', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to Business table for a NOT EXISTS query.
     *
     * @see useBusinessExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\BusinessQuery The inner query object of the NOT EXISTS statement
     */
    public function useBusinessNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\BusinessQuery */
        $q = $this->useExistsQuery('Business', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to Business table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Propel\BusinessQuery The inner query object of the IN statement
     */
    public function useInBusinessQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Propel\BusinessQuery */
        $q = $this->useInQuery('Business', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to Business table for a NOT IN query.
     *
     * @see useBusinessInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\BusinessQuery The inner query object of the NOT IN statement
     */
    public function useNotInBusinessQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\BusinessQuery */
        $q = $this->useInQuery('Business', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Filter the query by a related \App\Propel\ProductCategory object
     *
     * @param \App\Propel\ProductCategory|ObjectCollection $productCategory The related object(s) to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByProductCategory($productCategory, ?string $comparison = null)
    {
        if ($productCategory instanceof \App\Propel\ProductCategory) {
            return $this
                ->addUsingAlias(ProductTableMap::COL_CATEGORY_ID, $productCategory->getCategoryId(), $comparison);
        } elseif ($productCategory instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            $this
                ->addUsingAlias(ProductTableMap::COL_CATEGORY_ID, $productCategory->toKeyValue('PrimaryKey', 'CategoryId'), $comparison);

            return $this;
        } else {
            throw new PropelException('filterByProductCategory() only accepts arguments of type \App\Propel\ProductCategory or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductCategory relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinProductCategory(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductCategory');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProductCategory');
        }

        return $this;
    }

    /**
     * Use the ProductCategory relation ProductCategory object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Propel\ProductCategoryQuery A secondary query class using the current class as primary query
     */
    public function useProductCategoryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductCategory($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductCategory', '\App\Propel\ProductCategoryQuery');
    }

    /**
     * Use the ProductCategory relation ProductCategory object
     *
     * @param callable(\App\Propel\ProductCategoryQuery):\App\Propel\ProductCategoryQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withProductCategoryQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useProductCategoryQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to ProductCategory table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Propel\ProductCategoryQuery The inner query object of the EXISTS statement
     */
    public function useProductCategoryExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Propel\ProductCategoryQuery */
        $q = $this->useExistsQuery('ProductCategory', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to ProductCategory table for a NOT EXISTS query.
     *
     * @see useProductCategoryExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\ProductCategoryQuery The inner query object of the NOT EXISTS statement
     */
    public function useProductCategoryNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\ProductCategoryQuery */
        $q = $this->useExistsQuery('ProductCategory', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to ProductCategory table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Propel\ProductCategoryQuery The inner query object of the IN statement
     */
    public function useInProductCategoryQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Propel\ProductCategoryQuery */
        $q = $this->useInQuery('ProductCategory', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to ProductCategory table for a NOT IN query.
     *
     * @see useProductCategoryInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\ProductCategoryQuery The inner query object of the NOT IN statement
     */
    public function useNotInProductCategoryQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\ProductCategoryQuery */
        $q = $this->useInQuery('ProductCategory', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Filter the query by a related \App\Propel\CartProduct object
     *
     * @param \App\Propel\CartProduct|ObjectCollection $cartProduct the related object to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByCartProduct($cartProduct, ?string $comparison = null)
    {
        if ($cartProduct instanceof \App\Propel\CartProduct) {
            $this
                ->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $cartProduct->getProductId(), $comparison);

            return $this;
        } elseif ($cartProduct instanceof ObjectCollection) {
            $this
                ->useCartProductQuery()
                ->filterByPrimaryKeys($cartProduct->getPrimaryKeys())
                ->endUse();

            return $this;
        } else {
            throw new PropelException('filterByCartProduct() only accepts arguments of type \App\Propel\CartProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CartProduct relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinCartProduct(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CartProduct');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CartProduct');
        }

        return $this;
    }

    /**
     * Use the CartProduct relation CartProduct object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Propel\CartProductQuery A secondary query class using the current class as primary query
     */
    public function useCartProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCartProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CartProduct', '\App\Propel\CartProductQuery');
    }

    /**
     * Use the CartProduct relation CartProduct object
     *
     * @param callable(\App\Propel\CartProductQuery):\App\Propel\CartProductQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withCartProductQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useCartProductQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to CartProduct table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Propel\CartProductQuery The inner query object of the EXISTS statement
     */
    public function useCartProductExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Propel\CartProductQuery */
        $q = $this->useExistsQuery('CartProduct', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to CartProduct table for a NOT EXISTS query.
     *
     * @see useCartProductExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\CartProductQuery The inner query object of the NOT EXISTS statement
     */
    public function useCartProductNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\CartProductQuery */
        $q = $this->useExistsQuery('CartProduct', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to CartProduct table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Propel\CartProductQuery The inner query object of the IN statement
     */
    public function useInCartProductQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Propel\CartProductQuery */
        $q = $this->useInQuery('CartProduct', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to CartProduct table for a NOT IN query.
     *
     * @see useCartProductInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\CartProductQuery The inner query object of the NOT IN statement
     */
    public function useNotInCartProductQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\CartProductQuery */
        $q = $this->useInQuery('CartProduct', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Filter the query by a related \App\Propel\OrderProduct object
     *
     * @param \App\Propel\OrderProduct|ObjectCollection $orderProduct the related object to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByOrderProduct($orderProduct, ?string $comparison = null)
    {
        if ($orderProduct instanceof \App\Propel\OrderProduct) {
            $this
                ->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $orderProduct->getProductId(), $comparison);

            return $this;
        } elseif ($orderProduct instanceof ObjectCollection) {
            $this
                ->useOrderProductQuery()
                ->filterByPrimaryKeys($orderProduct->getPrimaryKeys())
                ->endUse();

            return $this;
        } else {
            throw new PropelException('filterByOrderProduct() only accepts arguments of type \App\Propel\OrderProduct or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the OrderProduct relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinOrderProduct(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('OrderProduct');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'OrderProduct');
        }

        return $this;
    }

    /**
     * Use the OrderProduct relation OrderProduct object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Propel\OrderProductQuery A secondary query class using the current class as primary query
     */
    public function useOrderProductQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinOrderProduct($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'OrderProduct', '\App\Propel\OrderProductQuery');
    }

    /**
     * Use the OrderProduct relation OrderProduct object
     *
     * @param callable(\App\Propel\OrderProductQuery):\App\Propel\OrderProductQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withOrderProductQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useOrderProductQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to OrderProduct table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Propel\OrderProductQuery The inner query object of the EXISTS statement
     */
    public function useOrderProductExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Propel\OrderProductQuery */
        $q = $this->useExistsQuery('OrderProduct', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to OrderProduct table for a NOT EXISTS query.
     *
     * @see useOrderProductExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\OrderProductQuery The inner query object of the NOT EXISTS statement
     */
    public function useOrderProductNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\OrderProductQuery */
        $q = $this->useExistsQuery('OrderProduct', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to OrderProduct table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Propel\OrderProductQuery The inner query object of the IN statement
     */
    public function useInOrderProductQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Propel\OrderProductQuery */
        $q = $this->useInQuery('OrderProduct', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to OrderProduct table for a NOT IN query.
     *
     * @see useOrderProductInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\OrderProductQuery The inner query object of the NOT IN statement
     */
    public function useNotInOrderProductQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\OrderProductQuery */
        $q = $this->useInQuery('OrderProduct', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Filter the query by a related \App\Propel\ProductReview object
     *
     * @param \App\Propel\ProductReview|ObjectCollection $productReview the related object to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByProductReview($productReview, ?string $comparison = null)
    {
        if ($productReview instanceof \App\Propel\ProductReview) {
            $this
                ->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productReview->getProductId(), $comparison);

            return $this;
        } elseif ($productReview instanceof ObjectCollection) {
            $this
                ->useProductReviewQuery()
                ->filterByPrimaryKeys($productReview->getPrimaryKeys())
                ->endUse();

            return $this;
        } else {
            throw new PropelException('filterByProductReview() only accepts arguments of type \App\Propel\ProductReview or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the ProductReview relation
     *
     * @param string|null $relationAlias Optional alias for the relation
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this The current query, for fluid interface
     */
    public function joinProductReview(?string $relationAlias = null, ?string $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('ProductReview');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'ProductReview');
        }

        return $this;
    }

    /**
     * Use the ProductReview relation ProductReview object
     *
     * @see useQuery()
     *
     * @param string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Propel\ProductReviewQuery A secondary query class using the current class as primary query
     */
    public function useProductReviewQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinProductReview($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'ProductReview', '\App\Propel\ProductReviewQuery');
    }

    /**
     * Use the ProductReview relation ProductReview object
     *
     * @param callable(\App\Propel\ProductReviewQuery):\App\Propel\ProductReviewQuery $callable A function working on the related query
     *
     * @param string|null $relationAlias optional alias for the relation
     *
     * @param string|null $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this
     */
    public function withProductReviewQuery(
        callable $callable,
        string $relationAlias = null,
        ?string $joinType = Criteria::INNER_JOIN
    ) {
        $relatedQuery = $this->useProductReviewQuery(
            $relationAlias,
            $joinType
        );
        $callable($relatedQuery);
        $relatedQuery->endUse();

        return $this;
    }

    /**
     * Use the relation to ProductReview table for an EXISTS query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     * @param string $typeOfExists Either ExistsQueryCriterion::TYPE_EXISTS or ExistsQueryCriterion::TYPE_NOT_EXISTS
     *
     * @return \App\Propel\ProductReviewQuery The inner query object of the EXISTS statement
     */
    public function useProductReviewExistsQuery($modelAlias = null, $queryClass = null, $typeOfExists = 'EXISTS')
    {
        /** @var $q \App\Propel\ProductReviewQuery */
        $q = $this->useExistsQuery('ProductReview', $modelAlias, $queryClass, $typeOfExists);
        return $q;
    }

    /**
     * Use the relation to ProductReview table for a NOT EXISTS query.
     *
     * @see useProductReviewExistsQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the exists query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\ProductReviewQuery The inner query object of the NOT EXISTS statement
     */
    public function useProductReviewNotExistsQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\ProductReviewQuery */
        $q = $this->useExistsQuery('ProductReview', $modelAlias, $queryClass, 'NOT EXISTS');
        return $q;
    }

    /**
     * Use the relation to ProductReview table for an IN query.
     *
     * @see \Propel\Runtime\ActiveQuery\ModelCriteria::useInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the IN query, like ExtendedBookQuery::class
     * @param string $typeOfIn Criteria::IN or Criteria::NOT_IN
     *
     * @return \App\Propel\ProductReviewQuery The inner query object of the IN statement
     */
    public function useInProductReviewQuery($modelAlias = null, $queryClass = null, $typeOfIn = 'IN')
    {
        /** @var $q \App\Propel\ProductReviewQuery */
        $q = $this->useInQuery('ProductReview', $modelAlias, $queryClass, $typeOfIn);
        return $q;
    }

    /**
     * Use the relation to ProductReview table for a NOT IN query.
     *
     * @see useProductReviewInQuery()
     *
     * @param string|null $modelAlias sets an alias for the nested query
     * @param string|null $queryClass Allows to use a custom query class for the NOT IN query, like ExtendedBookQuery::class
     *
     * @return \App\Propel\ProductReviewQuery The inner query object of the NOT IN statement
     */
    public function useNotInProductReviewQuery($modelAlias = null, $queryClass = null)
    {
        /** @var $q \App\Propel\ProductReviewQuery */
        $q = $this->useInQuery('ProductReview', $modelAlias, $queryClass, 'NOT IN');
        return $q;
    }

    /**
     * Exclude object from result
     *
     * @param ChildProduct $product Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($product = null)
    {
        if ($product) {
            $this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $product->getProductId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the product table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ProductTableMap::clearInstancePool();
            ProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ProductTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ProductTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ProductTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
