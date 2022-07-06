<?php
declare(strict_types=1);

namespace Francalek\Tests\DataType;

require_once dirname(__DIR__).'/src/CountableIterator.php';

use PHPUnit\Framework\TestCase;
use Francalek\DataType\CountableIterator;

final class CountableIteratorTest extends TestCase
{
	private CountableIterator $mockClass;

	protected function setUp(): void
	{
		// Create mock object
		$this->mockClass = new class extends CountableIterator {
			public function __construct()
			{
				$this->countableIterator = [
					'one',
					'two',
					'three',
				];
			}

			public function clear(): void
			{
				$this->countableIterator = [];
			}
		};
	}

	// Iterator tests

	public function testIteratorCurrentMethod(): void
	{
		$this->assertEquals('one', $this->mockClass->current());
	}

	public function testIteratorNextMethod(): void
	{
		$this->mockClass->next();
		$this->assertEquals('two', $this->mockClass->current());
	}

	public function testIteratorKeyMethod(): void
	{
		$this->mockClass->next();
		$this->assertEquals(1, $this->mockClass->key());
	}

	public function testIteratorRewindMethod(): void
	{
		$this->mockClass->next();
		$this->mockClass->rewind();
		$this->assertEquals('one', $this->mockClass->current());
	}

	public function testIteratorValidMethod(): void
	{
		$this->mockClass->clear();
		$this->assertFalse($this->mockClass->valid());
	}

	public function testIteratorLoop(): void
	{
		$result = '';
		foreach ($this->mockClass as $key => $value) {
			$result .= $key.'='.$value.';';
		}
		$this->assertEquals('0=one;1=two;2=three;', $result);
	}

	// Countable tests

	public function testCountableCountMethod(): void
	{
		$this->assertEquals(3, $this->mockClass->count());
	}

	public function testCountableCount(): void
	{
		$this->assertEquals(3, count($this->mockClass));
	}
}
