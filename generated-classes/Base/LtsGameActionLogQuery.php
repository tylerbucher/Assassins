<?php

namespace Base;

use \LtsGameActionLog as ChildLtsGameActionLog;
use \LtsGameActionLogQuery as ChildLtsGameActionLogQuery;
use \Exception;
use \PDO;
use Map\LtsGameActionLogTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'lts_game_action_logs' table.
 *
 * 
 *
 * @method     ChildLtsGameActionLogQuery orderByGameId($order = Criteria::ASC) Order by the game_id column
 * @method     ChildLtsGameActionLogQuery orderByActionId($order = Criteria::ASC) Order by the action_id column
 *
 * @method     ChildLtsGameActionLogQuery groupByGameId() Group by the game_id column
 * @method     ChildLtsGameActionLogQuery groupByActionId() Group by the action_id column
 *
 * @method     ChildLtsGameActionLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildLtsGameActionLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildLtsGameActionLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildLtsGameActionLogQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildLtsGameActionLogQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildLtsGameActionLogQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildLtsGameActionLogQuery leftJoinLtsGame($relationAlias = null) Adds a LEFT JOIN clause to the query using the LtsGame relation
 * @method     ChildLtsGameActionLogQuery rightJoinLtsGame($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LtsGame relation
 * @method     ChildLtsGameActionLogQuery innerJoinLtsGame($relationAlias = null) Adds a INNER JOIN clause to the query using the LtsGame relation
 *
 * @method     ChildLtsGameActionLogQuery joinWithLtsGame($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the LtsGame relation
 *
 * @method     ChildLtsGameActionLogQuery leftJoinWithLtsGame() Adds a LEFT JOIN clause and with to the query using the LtsGame relation
 * @method     ChildLtsGameActionLogQuery rightJoinWithLtsGame() Adds a RIGHT JOIN clause and with to the query using the LtsGame relation
 * @method     ChildLtsGameActionLogQuery innerJoinWithLtsGame() Adds a INNER JOIN clause and with to the query using the LtsGame relation
 *
 * @method     ChildLtsGameActionLogQuery leftJoinLtsActionLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the LtsActionLog relation
 * @method     ChildLtsGameActionLogQuery rightJoinLtsActionLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LtsActionLog relation
 * @method     ChildLtsGameActionLogQuery innerJoinLtsActionLog($relationAlias = null) Adds a INNER JOIN clause to the query using the LtsActionLog relation
 *
 * @method     ChildLtsGameActionLogQuery joinWithLtsActionLog($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the LtsActionLog relation
 *
 * @method     ChildLtsGameActionLogQuery leftJoinWithLtsActionLog() Adds a LEFT JOIN clause and with to the query using the LtsActionLog relation
 * @method     ChildLtsGameActionLogQuery rightJoinWithLtsActionLog() Adds a RIGHT JOIN clause and with to the query using the LtsActionLog relation
 * @method     ChildLtsGameActionLogQuery innerJoinWithLtsActionLog() Adds a INNER JOIN clause and with to the query using the LtsActionLog relation
 *
 * @method     \LtsGameQuery|\LtsActionLogQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildLtsGameActionLog findOne(ConnectionInterface $con = null) Return the first ChildLtsGameActionLog matching the query
 * @method     ChildLtsGameActionLog findOneOrCreate(ConnectionInterface $con = null) Return the first ChildLtsGameActionLog matching the query, or a new ChildLtsGameActionLog object populated from the query conditions when no match is found
 *
 * @method     ChildLtsGameActionLog findOneByGameId(int $game_id) Return the first ChildLtsGameActionLog filtered by the game_id column
 * @method     ChildLtsGameActionLog findOneByActionId(int $action_id) Return the first ChildLtsGameActionLog filtered by the action_id column *

 * @method     ChildLtsGameActionLog requirePk($key, ConnectionInterface $con = null) Return the ChildLtsGameActionLog by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLtsGameActionLog requireOne(ConnectionInterface $con = null) Return the first ChildLtsGameActionLog matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLtsGameActionLog requireOneByGameId(int $game_id) Return the first ChildLtsGameActionLog filtered by the game_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildLtsGameActionLog requireOneByActionId(int $action_id) Return the first ChildLtsGameActionLog filtered by the action_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildLtsGameActionLog[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildLtsGameActionLog objects based on current ModelCriteria
 * @method     ChildLtsGameActionLog[]|ObjectCollection findByGameId(int $game_id) Return ChildLtsGameActionLog objects filtered by the game_id column
 * @method     ChildLtsGameActionLog[]|ObjectCollection findByActionId(int $action_id) Return ChildLtsGameActionLog objects filtered by the action_id column
 * @method     ChildLtsGameActionLog[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class LtsGameActionLogQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\LtsGameActionLogQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'assassins', $modelName = '\\LtsGameActionLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildLtsGameActionLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildLtsGameActionLogQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildLtsGameActionLogQuery) {
            return $criteria;
        }
        $query = new ChildLtsGameActionLogQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$game_id, $action_id] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildLtsGameActionLog|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(LtsGameActionLogTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = LtsGameActionLogTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLtsGameActionLog A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT `game_id`, `action_id` FROM `lts_game_action_logs` WHERE `game_id` = :p0 AND `action_id` = :p1';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);            
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildLtsGameActionLog $obj */
            $obj = new ChildLtsGameActionLog();
            $obj->hydrate($row);
            LtsGameActionLogTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildLtsGameActionLog|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
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
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(LtsGameActionLogTableMap::COL_GAME_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(LtsGameActionLogTableMap::COL_ACTION_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(LtsGameActionLogTableMap::COL_GAME_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(LtsGameActionLogTableMap::COL_ACTION_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the game_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGameId(1234); // WHERE game_id = 1234
     * $query->filterByGameId(array(12, 34)); // WHERE game_id IN (12, 34)
     * $query->filterByGameId(array('min' => 12)); // WHERE game_id > 12
     * </code>
     *
     * @see       filterByLtsGame()
     *
     * @param     mixed $gameId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function filterByGameId($gameId = null, $comparison = null)
    {
        if (is_array($gameId)) {
            $useMinMax = false;
            if (isset($gameId['min'])) {
                $this->addUsingAlias(LtsGameActionLogTableMap::COL_GAME_ID, $gameId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gameId['max'])) {
                $this->addUsingAlias(LtsGameActionLogTableMap::COL_GAME_ID, $gameId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LtsGameActionLogTableMap::COL_GAME_ID, $gameId, $comparison);
    }

    /**
     * Filter the query on the action_id column
     *
     * Example usage:
     * <code>
     * $query->filterByActionId(1234); // WHERE action_id = 1234
     * $query->filterByActionId(array(12, 34)); // WHERE action_id IN (12, 34)
     * $query->filterByActionId(array('min' => 12)); // WHERE action_id > 12
     * </code>
     *
     * @see       filterByLtsActionLog()
     *
     * @param     mixed $actionId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function filterByActionId($actionId = null, $comparison = null)
    {
        if (is_array($actionId)) {
            $useMinMax = false;
            if (isset($actionId['min'])) {
                $this->addUsingAlias(LtsGameActionLogTableMap::COL_ACTION_ID, $actionId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($actionId['max'])) {
                $this->addUsingAlias(LtsGameActionLogTableMap::COL_ACTION_ID, $actionId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LtsGameActionLogTableMap::COL_ACTION_ID, $actionId, $comparison);
    }

    /**
     * Filter the query by a related \LtsGame object
     *
     * @param \LtsGame|ObjectCollection $ltsGame The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function filterByLtsGame($ltsGame, $comparison = null)
    {
        if ($ltsGame instanceof \LtsGame) {
            return $this
                ->addUsingAlias(LtsGameActionLogTableMap::COL_GAME_ID, $ltsGame->getId(), $comparison);
        } elseif ($ltsGame instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LtsGameActionLogTableMap::COL_GAME_ID, $ltsGame->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLtsGame() only accepts arguments of type \LtsGame or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LtsGame relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function joinLtsGame($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LtsGame');

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
            $this->addJoinObject($join, 'LtsGame');
        }

        return $this;
    }

    /**
     * Use the LtsGame relation LtsGame object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LtsGameQuery A secondary query class using the current class as primary query
     */
    public function useLtsGameQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLtsGame($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LtsGame', '\LtsGameQuery');
    }

    /**
     * Filter the query by a related \LtsActionLog object
     *
     * @param \LtsActionLog|ObjectCollection $ltsActionLog The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function filterByLtsActionLog($ltsActionLog, $comparison = null)
    {
        if ($ltsActionLog instanceof \LtsActionLog) {
            return $this
                ->addUsingAlias(LtsGameActionLogTableMap::COL_ACTION_ID, $ltsActionLog->getId(), $comparison);
        } elseif ($ltsActionLog instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LtsGameActionLogTableMap::COL_ACTION_ID, $ltsActionLog->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLtsActionLog() only accepts arguments of type \LtsActionLog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LtsActionLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function joinLtsActionLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LtsActionLog');

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
            $this->addJoinObject($join, 'LtsActionLog');
        }

        return $this;
    }

    /**
     * Use the LtsActionLog relation LtsActionLog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \LtsActionLogQuery A secondary query class using the current class as primary query
     */
    public function useLtsActionLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLtsActionLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LtsActionLog', '\LtsActionLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildLtsGameActionLog $ltsGameActionLog Object to remove from the list of results
     *
     * @return $this|ChildLtsGameActionLogQuery The current query, for fluid interface
     */
    public function prune($ltsGameActionLog = null)
    {
        if ($ltsGameActionLog) {
            $this->addCond('pruneCond0', $this->getAliasedColName(LtsGameActionLogTableMap::COL_GAME_ID), $ltsGameActionLog->getGameId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(LtsGameActionLogTableMap::COL_ACTION_ID), $ltsGameActionLog->getActionId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the lts_game_action_logs table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LtsGameActionLogTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            LtsGameActionLogTableMap::clearInstancePool();
            LtsGameActionLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(LtsGameActionLogTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(LtsGameActionLogTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            LtsGameActionLogTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            LtsGameActionLogTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // LtsGameActionLogQuery
