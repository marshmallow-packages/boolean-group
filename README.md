![alt text](https://marshmallow.dev/cdn/media/logo-red-237x46.png "marshmallow.")

# Nova Boolean Group

This package extends the default Boolean Group field from Nova 4. This package adds the ablity to use HTML in the labels. This is handy when you have a lot of information to show in your boolean group labels.

In the example below you can see the difference in behaviour between the default Boolean Group from Nova and the Boolean Group from this package.

<img src="resources/readme/preview-form.png">
<img src="resources/readme/preview-detail.png">
<img src="resources/readme/preview-index.png">

[![Version](https://img.shields.io/packagist/v/marshmallow/boolean-group)](https://github.com/marshmallow-packages/boolean-group)
[![Issues](https://img.shields.io/github/issues/marshmallow-packages/boolean-group)](https://github.com/marshmallow-packages/boolean-group)
[![Code Coverage](https://img.shields.io/badge/coverage-100%25-success)](https://github.com/marshmallow-packages/boolean-group)
[![Licence](https://img.shields.io/github/license/marshmallow-packages/boolean-group)](https://github.com/marshmallow-packages/boolean-group)

## Installation

You can install the package via composer:

```bash
composer require marshmallow/boolean-group
```

## Usage

The usage of this package could not be easier. You use it as you would use the BooleanGroup from Nova. Please check there documentation for all the cool stuff you can do with this field out of the box. The only addition is, you can now add HTML in your labels. This package will do the rest. Check out the example below. This is the code we’ve use to take the screenshots above.

```php
use Marshmallow\BooleanGroup\BooleanGroup;

BooleanGroup::make(__('From Marshmallow'), 'field_3')->options([
    'option_1' => '<strong>Option 1</strong><br/><small>With HTML</small>',
    'option_2' => '<strong>Option 2</strong><br/><small>With HTML</small>',
    'option_3' => '<strong>Option 3</strong><br/><small>With HTML</small>',
]),
```

### Click area
By default, the clickable area within the border is full width. This sometimes creates an issue where users click this area without the intention to check of uncheck anything. If you want to change this behaviour, you can do so with the method below.

```php
use Marshmallow\BooleanGroup\BooleanGroup;

BooleanGroup::make(__('From Marshmallow'), 'field_3')->options([
    // ...
])->cancelFullWidth(),
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

```bash
composer test
```

## Security

If you discover any security related issues, please email stef@marshmallow.dev instead of using the issue tracker.

## Credits

-   [Stef van Esch](https://github.com/stefvanesch)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
