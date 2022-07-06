# Useful data types for PHP

[![](https://img.shields.io/github/release/francalek/datatype.svg?style=flat&sort=semver)](https://github.com/francalek/datatype/releases/)
[![](https://img.shields.io/github/license/francalek/datatype.svg?style=flat)](https://github.com/francalek/datatype/blob/main/LICENSE.md)

## Requirements

This package works with **PHP >= 7.1**

## Installation

The best way to install this package is using [Composer](https://getcomposer.org/):

```console
$ composer require francalek/datatype
```

## Usage

### CountableIterator

This abstract class implements only [\Countable](https://www.php.net/manual/en/class.countable.php) and [\Iterator](https://www.php.net/manual/en/class.iterator) interfaces and has own storage.

Data for iterating and counting must be in protected property `$this->countableIterator`.

```php
use Francalek\DataType\CountableIterator;

class Sheeps extends CountableIterator
{
	public function __construct(int $sheeps = 5)
	{
		$herd = array_fill(0, $sheeps, 'Sheep');
		$this->countableIterator = $herd;
	}
}
```
And now you can iterating through your class:

```php
echo "I can't sleep :(\n";

$sheeps = new Sheeps();
foreach ($sheeps as $nr => $sheep) {
	echo $sheep.' '.(++$nr)."\n";
}

exit("Chrrr...\n");
```

Or counting:

```php
echo "I can't sleep :(\n";

$sheeps = new Sheeps();
echo "I have ".count($sheeps)." sheeps in total.\n";

exit("Chrrr...\n");
```

## Run tests

To run tests:
```console
$ git clone https://github.com/francalek/DataType.git
$ cd DataType/
$ ./tests/run.sh
```

## Contribute

1. If you found a bug or have an idea for a new feature, you can create new Issue.
1. Fork this repository on GitHub to start adding new features, fixing bugs or creating more tests.
1. Don't forget send a pull request to get your changes in this package.

## License

This package is licensed under the [MIT License](./LICENSE.md).
