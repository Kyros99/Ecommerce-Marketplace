<?php

namespace App\Propel\Base;

use \Exception;
use \PDO;
use App\Propel\Sessions as ChildSessions;
use App\Propel\SessionsQuery as ChildSessionsQuery;
use App\Propel\Map\SessionsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the `sessions` table.
 *
 * @method     ChildSessionsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSessionsQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method     ChildSessionsQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method     ChildSessionsQuery orderByUserAgent($order = Criteria::ASC) Order by the user_agent column
 * @method     ChildSessionsQuery orderByPayload($order = Criteria::ASC) Order by the payload column
 * @method     ChildSessionsQuery orderByLastActivity($order = Criteria::ASC) Order by the last_activity column
 *
 * @method     ChildSessionsQuery groupById() Group by the id column
 * @method     ChildSessionsQuery groupByUserId() Group by the user_id column
 * @method     ChildSessionsQuery groupByIpAddress() Group by the ip_address column
 * @method     ChildSessionsQuery groupByUserAgent() Group by the user_agent column
 * @method     ChildSessionsQuery groupByPayload() Group by the payload column
 * @method     ChildSessionsQuery groupByLastActivity() Group by the last_activity column
 *
 * @method     ChildSessionsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSessionsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSessionsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSessionsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSessionsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSessionsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSessions|null findOne(?ConnectionInterface $con = null) Return the first ChildSessions matching the query
 * @method     ChildSessions findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSessions matching the query, or a new ChildSessions object populated from the query conditions when no match is found
 *
 * @method     ChildSessions|null findOneById(string $id) Return the first ChildSessions filtered by the id column
 * @method     ChildSessions|null findOneByUserId(string $user_id) Return the first ChildSessions filtered by the user_id column
 * @method     ChildSessions|null findOneByIpAddress(string $ip_address) Return the first ChildSessions filtered by the ip_address column
 * @method     ChildSessions|null findOneByUserAgent(string $user_agent) Return the first ChildSessions filtered by the user_agent column
 * @method     ChildSessions|null findOneByPayload(string $payload) Return the first ChildSessions filtered by the payload column
 * @method     ChildSessions|null findOneByLastActivity(int $last_activity) Return the first ChildSessions filtered by the last_activity column
 *
 * @method     ChildSessions requirePk($key, ?ConnectionInterface $con = null) Return the ChildSessions by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSessions requireOne(?ConnectionInterface $con = null) Return the first ChildSessions matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSessions requireOneById(string $id) Return the first ChildSessions filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSessions requireOneByUserId(string $user_id) Return the first ChildSessions filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSessions requireOneByIpAddress(string $ip_address) Return the first ChildSessions filtered by the ip_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSessions requireOneByUserAgent(string $user_agent) Return the first ChildSessions filtered by the user_agent column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSessions requireOneByPayload(string $payload) Return the first ChildSessions filtered by the payload column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSessions requireOneByLastActivity(int $last_activity) Return the first ChildSessions filtered by the last_activity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSessions[]|Collection find(?ConnectionInterface $con = null) Return ChildSessions objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSessions> find(?ConnectionInterface $con = null) Return ChildSessions objects based on current ModelCriteria
 *
 * @method     ChildSessions[]|Collection findById(string|array<string> $id) Return ChildSessions objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSessions> findById(string|array<string> $id) Return ChildSessions objects filtered by the id column
 * @method     ChildSessions[]|Collection findByUserId(string|array<string> $user_id) Return ChildSessions objects filtered by the user_id column
 * @psalm-method Collection&\Traversable<ChildSessions> findByUserId(string|array<string> $user_id) Return ChildSessions objects filtered by the user_id column
 * @method     ChildSessions[]|Collection findByIpAddress(string|array<string> $ip_address) Return ChildSessions objects filtered by the ip_address column
 * @psalm-method Collection&\Traversable<ChildSessions> findByIpAddress(string|array<string> $ip_address) Return ChildSessions objects filtered by the ip_address column
 * @method     ChildSessions[]|Collection findByUserAgent(string|array<string> $user_agent) Return ChildSessions objects filtered by the user_agent column
 * @psalm-method Collection&\Traversable<ChildSessions> findByUserAgent(string|array<string> $user_agent) Return ChildSessions objects filtered by the user_agent column
 * @method     ChildSessions[]|Collection findByPayload(string|array<string> $payload) Return ChildSessions objects filtered by the payload column
 * @psalm-method Collection&\Traversable<ChildSessions> findByPayload(string|array<string> $payload) Return ChildSessions objects filtered by the payload column
 * @method     ChildSessions[]|Collection findByLastActivity(int|array<int> $last_activity) Return ChildSessions objects filtered by the last_activity column
 * @psalm-method Collection&\Traversable<ChildSessions> findByLastActivity(int|array<int> $last_activity) Return ChildSessions objects filtered by the last_activity column
 *
 * @method     ChildSessions[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSessions> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SessionsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Propel\Base\SessionsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\App\\Propel\\Sessions', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSessionsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSessionsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSessionsQuery) {
            return $criteria;
        }
        $query = new ChildSessionsQuery();
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
     * @return ChildSessions|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SessionsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SessionsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSessions A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, user_id, ip_address, user_agent, payload, last_activity FROM sessions WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildSessions $obj */
            $obj = new ChildSessions();
            $obj->hydrate($row);
            SessionsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSessions|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(SessionsTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(SessionsTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById('fooValue');   // WHERE id = 'fooValue'
     * $query->filterById('%fooValue%', Criteria::LIKE); // WHERE id LIKE '%fooValue%'
     * $query->filterById(['foo', 'bar']); // WHERE id IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $id The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($id)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SessionsTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUserId($userId = null, ?string $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(SessionsTableMap::COL_USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(SessionsTableMap::COL_USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SessionsTableMap::COL_USER_ID, $userId, $comparison);

        return $this;
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%', Criteria::LIKE); // WHERE ip_address LIKE '%fooValue%'
     * $query->filterByIpAddress(['foo', 'bar']); // WHERE ip_address IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $ipAddress The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SessionsTableMap::COL_IP_ADDRESS, $ipAddress, $comparison);

        return $this;
    }

    /**
     * Filter the query on the user_agent column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAgent('fooValue');   // WHERE user_agent = 'fooValue'
     * $query->filterByUserAgent('%fooValue%', Criteria::LIKE); // WHERE user_agent LIKE '%fooValue%'
     * $query->filterByUserAgent(['foo', 'bar']); // WHERE user_agent IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $userAgent The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByUserAgent($userAgent = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($userAgent)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SessionsTableMap::COL_USER_AGENT, $userAgent, $comparison);

        return $this;
    }

    /**
     * Filter the query on the payload column
     *
     * Example usage:
     * <code>
     * $query->filterByPayload('fooValue');   // WHERE payload = 'fooValue'
     * $query->filterByPayload('%fooValue%', Criteria::LIKE); // WHERE payload LIKE '%fooValue%'
     * $query->filterByPayload(['foo', 'bar']); // WHERE payload IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $payload The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPayload($payload = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($payload)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SessionsTableMap::COL_PAYLOAD, $payload, $comparison);

        return $this;
    }

    /**
     * Filter the query on the last_activity column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivity(1234); // WHERE last_activity = 1234
     * $query->filterByLastActivity(array(12, 34)); // WHERE last_activity IN (12, 34)
     * $query->filterByLastActivity(array('min' => 12)); // WHERE last_activity > 12
     * </code>
     *
     * @param mixed $lastActivity The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByLastActivity($lastActivity = null, ?string $comparison = null)
    {
        if (is_array($lastActivity)) {
            $useMinMax = false;
            if (isset($lastActivity['min'])) {
                $this->addUsingAlias(SessionsTableMap::COL_LAST_ACTIVITY, $lastActivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivity['max'])) {
                $this->addUsingAlias(SessionsTableMap::COL_LAST_ACTIVITY, $lastActivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SessionsTableMap::COL_LAST_ACTIVITY, $lastActivity, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSessions $sessions Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($sessions = null)
    {
        if ($sessions) {
            $this->addUsingAlias(SessionsTableMap::COL_ID, $sessions->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the sessions table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SessionsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SessionsTableMap::clearInstancePool();
            SessionsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SessionsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SessionsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SessionsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SessionsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
