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

use PHPUnit\Framework\TestCase;
use SSX\API\Google\PageSpeed\ApiClient;

class ApiTest extends TestCase
{
    public function test_we_can_instantiate_the_class()
    {
        $api = new ApiClient('https://dor.ky');

        $this->assertInstanceOf(SSX\API\Google\PageSpeed\ApiClient::class, $api);
    }

    public function test_we_can_get_the_raw_data()
    {
        $api = new ApiClient('https://dor.ky');

        $raw = $api->getRaw();

        $this->assertSame('pagespeedonline#result', $raw->kind);
    }

    public function test_we_can_fetch_image_screenshot()
    {
        $api = new ApiClient('https://dor.ky');

        $screenshot = $api->getScreenshot();

        $this->assertNotEmpty($screenshot);
    }
}
