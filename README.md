# Useful data types for PHP

[![](https://img.shields.io/github/release/francalek/datatype.svg?style=flat&sort=semver)](https://github.com/francalek/datatype/releases/)
[![](https://img.shields.io/github/license/francalek/datatype.svg?style=flat)](https://github.com/francalek/datatype/blob/main/LICENSE.md)
[![](https://img.shields.io/packagist/php-v/francalek/datatype.svg?style=flat)](https://github.com/francalek/datatype/blob/main/LICENSE.md)
[![](https://img.shields.io/github/workflow/status/francalek/datatype/PHP%20Composer?style=flat)](https://github.com/francalek/DataType/actions/workflows/php.yml)

## Requirements

This package works with **PHP >= 7.1**

## Installation

The best way to install this package is using [Composer](https://getcomposer.org/):

```bash
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
```bash
$ git clone https://github.com/francalek/DataType.git
$ cd DataType/
$ ./tests/run.sh

# Or over Composer
$ composer tests
```

## Contribute

- If you found a bug or have an idea for a new feature, you can create [new Issue](https://github.com/francalek/DataType/issues).
- [Fork this repository](https://github.com/francalek/DataType/fork) to start adding new features, fixing bugs or creating more tests.
- Don't forget send a pull request to get your changes in this package.
- Read full text of [Contributing](./CONTRIBUTING.md).

## License

This package is licensed under the [MIT License](./LICENSE.md).
