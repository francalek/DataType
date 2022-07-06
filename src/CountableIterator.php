<?php

/**
 * CountableIterator is an abstract class,
 * implementing \Iterator and \Countable
 * with own iterator storage.
 *
 * Require PHP >= 7.1
 *
 * @copyright 2022 Lukáš Francálek
 * @author    Lukáš Francálek (https://www.francalek.cz)
 * @license   MIT
 * @version   0.1
 */

declare(strict_types=1);

namespace Francalek\DataType;

abstract class CountableIterator implements \Iterator, \Countable
{
	/** @var array $countableIterator Iterator storage. */
	protected array $countableIterator = [];

	/**
	 * Set the internal pointer of an array to its first element.
	 * Implements \Iterator->rewind()
	 *
	 * @return void
	 */
	public function rewind(): void
	{
		reset($this->countableIterator);
	}

	/**
	 * Return the current element in an array.
	 * Implements \Iterator->current()
	 *
	 * @return mixed Current element in an array.
	 */
	public function current()
	{
		return current($this->countableIterator);
	}

	/**
	 * Return the current key from an array.
	 * Implements \Iterator->key()
	 *
	 * @return mixed Key of current element in an array.
	 */
	public function key()
	{
		return key($this->countableIterator);
	}

	/**
	 * Move the internal pointer of an array.
	 * Implements \Iterator->next()
	 *
	 * @return void
	 */
	public function next(): void
	{
		next($this->countableIterator);
	}

	/**
	 * Checks if current element exists.
	 * Implements \Iterator->valid()
	 *
	 * @return bool Exists current element?
	 */
	public function valid(): bool
	{
		return (key($this->countableIterator) !== null);
	}

	/**
	 * Implementation of \Countable interface.
	 */

	/**
	 * Return count of all elements in an array.
	 * Implements \Countable->count()
	 *
	 * @return int Count of all elements in an array.
	 */
	public function count(): int
	{
		return count($this->countableIterator);
	}
}
