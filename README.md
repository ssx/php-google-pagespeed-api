![Circle CI](https://circleci.com/gh/ssx/php-google-pagespeed-api.png?style=shield " ") ![StyleCI](https://styleci.io/repos/94243628/shield " ")

# PHP Google PageSpeed API

This is a tiny micro client for making calls to the Google Pagespeed API which
returns some interesting data about the given URL.

To get started, create an instance like so:

    $insights = new SSX\API\Google\PageSpeed\ApiClient("https://dor.ky");

This will give you an instance of the class. The two implemented functions so far
are `$insights->getScreenshot()` to return a JPG image of the site and
`$insights->getRaw()` which will return the raw data back from the API call.

### Use an API Key

I'd recommend you setup and use an API key for use in production, you can add it
as the second parameter on construction to use:

    $insights = new SSX\API\Google\PageSpeed\ApiClient("https://dor.ky","api-key-goes-here");


### License

This project is licensed under an Apache 2.0 license which you can find within
this repository in the [LICENSE file](https://github.com/ssx/php-google-pagespeed-api/blob/master/LICENSE).


### Feedback

If you have any feedback, comments or suggestions, please feel free to open an
issue within the repository on [Github](https://github.com/ssx/php-google-pagespeed-api).
