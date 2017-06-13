<?php

/*
 * This file is part of ssx/php-google-pagespeed-api
 *
 *  (c) Scott Wilcox <scott@dor.ky>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
 */

namespace SSX\API\Google\PageSpeed;

/**
 * Class ApiClient.
 */
class ApiClient
{
    /**
     * This holds the pagespeed API endpoint we'll make a request to.
     *
     * @var string
     */
    private $apiUrl = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed?'.
                            'strategy=desktop&screenshot=true&url=';

    /**
     * @var mixed
     */
    private $response;

    /**
     * ApiClient constructor.
     *
     * @param $siteUrl          The URL you wish to test
     * @param string $apiKey An API key for your project
     *
     * @throws \Exception
     */
    public function __construct($siteUrl, $apiKey = '')
    {
        $url = $this->apiUrl.$siteUrl;
        if (!empty($apiKey)) {
            $url .= '&key='.$apiKey;
        }

        $response = file_get_contents($url);
        if (empty($response)) {
            throw new \Exception('Unable to fetch API result for given URL: '.$siteUrl);
        }

        $this->response = json_decode($response);
    }

    /**
     * Returns an image for a website or defaults back to a placehold.it image.
     *
     * @return bool|string
     */
    public function getScreenshot()
    {
        if (isset($this->response->screenshot->data)) {
            $image = $this->response->screenshot->data;
            $image = str_replace('_', '/', $image);
            $image = str_replace('-', '+', $image);

            return base64_decode($image);
        }

        return file_get_contents('http://via.placeholder.com/320x240?text=Awaiting%20Screenshot');
    }

    /**
     * Get the raw object returned from the API.
     *
     * @return mixed
     */
    public function getRaw()
    {
        return $this->response;
    }
}
