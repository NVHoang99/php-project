<?php

declare(strict_types=1);

/*
 * This file is part of the Laudis Neo4j package.
 *
 * (c) Laudis technologies <http://laudis.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Laudis\Neo4j\Contracts;

use Ds\Vector;
use Laudis\Neo4j\Databags\Statement;
use Laudis\Neo4j\Exception\Neo4jException;

/**
 * @template T
 */
interface TransactionInterface
{
    /**
     * @param iterable<string, scalar|iterable|null> $parameters
     *
     * @return T
     */
    public function run(string $statement, iterable $parameters = []);

    /**
     * @return T
     */
    public function runStatement(Statement $statement);

    /**
     * @param iterable<Statement> $statements
     *
     * @throws Neo4jException
     *
     * @return Vector<T>
     */
    public function runStatements(iterable $statements): Vector;
}
