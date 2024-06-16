<?php

/**
 * CountableIterator is an abstract class,
 * implementing \Iterator and \Countable
 * with its own iterator storage.
 *
 * Require PHP >= 7.1
 *
 * @package   Francalek\DataType
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
	protected $countableIterator = [];

	/**
	 * Constructor to initialize the iterator storage.
	 *
	 * @param array $items Initial items for the iterator.
	 */
	public function __construct(array $items = [])
	{
		$this->countableIterator = $items;
	}

	/**
	 * Set the internal pointer of the array to its first element.
	 * Implements \Iterator->rewind()
	 *
	 * @return void
	 */
	public function rewind(): void
	{
		reset($this->countableIterator);
	}

	/**
	 * Return the current element in the array.
	 * Implements \Iterator->current()
	 *
	 * @return mixed Current element in the array.
	 */
	public function current()
	{
		return current($this->countableIterator);
	}

	/**
	 * Return the current key from the array.
	 * Implements \Iterator->key()
	 *
	 * @return mixed Key of current element in the array.
	 */
	public function key()
	{
		return key($this->countableIterator);
	}

	/**
	 * Move the internal pointer of the array forward.
	 * Implements \Iterator->next()
	 *
	 * @return void
	 */
	public function next(): void
	{
		next($this->countableIterator);
	}

	/**
	 * Checks if the current element exists.
	 * Implements \Iterator->valid()
	 *
	 * @return bool True if the current element exists, false otherwise.
	 */
	public function valid(): bool
	{
		return (key($this->countableIterator) !== null);
	}

	/**
	 * Implementation of \Countable interface.
	 */

	/**
	 * Return the count of all elements in the array.
	 * Implements \Countable->count()
	 *
	 * @return int Count of all elements in the array.
	 */
	public function count(): int
	{
		return count($this->countableIterator);
	}
}
