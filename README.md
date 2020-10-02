![Logo](readable.png)
Generate readable random phrases for URLs

-----

## How To Use
This library is available on packagist.
To install, 
```shell script
composer require readable-url
``` 

Then create ``ReadableURL`` Class
```php
$readableURL = new HyungJu\ReadableURL();
```

You can pass three parameters to the class.
```php
// Takes 3 parameters.
// 1. A boolean value - If true, returns string in CamelCase, else lowercase.
// 2. An integer value - The number of words to be generated in the string. (Between 2 and 10).
// 3. A string - The seperator between the words.

$readableURL = new HyungJu\ReadableURL();
//$readableURL = new HyungJu\ReadableURL(false, 5, '-'); // Other options.
```

This can be used to add to the end of a URL.

Example: https://example.com/photos/ForgetfulHarshEgg

For best results, use an integer value of 3, 4, or 5.

## License
MIT License

* This library is a PHP version of [readable-url](https://www.npmjs.com/package/readable-url)