# framework

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]


A simple framework built with php league components

## Install

Via Composer

``` bash
$ composer require phpieces/framework
```

## Usage

``` php
require __DIR__ .'/../vendor/autoload.php';

$config = [
    'template_dir' => 'template/folder'
];

$app = new App($config);

$app->get('/', function(ServerRequestInterface $request, ResponseInterface $response) {
    $response->getBody()->write($this->templates->render('home'));

    return $response;
});

$app->run();
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email jclyons52@gmail.com instead of using the issue tracker.

## Credits

- [Joseph Lyons][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/phpieces/framework.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/phpieces/framework/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/phpieces/framework.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/phpieces/framework.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/phpieces/framework.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/phpieces/framework
[link-travis]: https://travis-ci.org/phpieces/framework
[link-scrutinizer]: https://scrutinizer-ci.com/g/phpieces/framework/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/phpieces/framework
[link-downloads]: https://packagist.org/packages/phpieces/framework
[link-author]: https://github.com/jclyons52
[link-contributors]: ../../contributors
