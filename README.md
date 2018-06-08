# Prerender

This package can be used to send requests to Prerender.io to recache your pages from your Laravel application

## Getting Started

### Prerequisites

GuzzleHttp 6.0 or above

```
Give examples
```

### Installing

To install the package, run:

```
composer require arjunmat/prerender
```

After installation, publish the package to create the config file

```
php artisan vendor:publish class=PrerenderServiceProvider
```

For Laravel5.4 and below, add the following to ```config/app.php```

In the `providers` array,
```
Arjunmat\Prerender\PrerenderServiceProvider::class,
```

In the `aliases` array,
```
'Prerender' => Arjunmat\Prerender\PrerenderFacade::class,
```


## Usage

```
use Arjunmat\Prerender\Prerender;

$prerender = new Prerender();

$url = "http://www.google.com";

if(!$prerender->submitUrl($url)) {
  $error = $prerender->getError();
}
```

## Authors

* **Arjun Mathai** - *Initial work* - [arjunmat](https://github.com/arjunmat)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
