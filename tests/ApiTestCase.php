<?php

use Chrisbjr\ApiGuard\Models\ApiKey;

class ApiTestCase extends TestCase
{
    /**
     * API prefix.
     */
    const API_PREFIX = 'api/v1/';

    /**
     * API key.
     *
     * @var string
     */
    protected $apiKey;

    /**
     * Run migrations and seeds at the beginning of each test.
     */
    protected function setUp()
    {
        parent::setUp();

        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');

        $this->apiKey = ApiKey::where('user_id', '=', 1)->first()->key;
    }

    /**
     * Hit an API endpoint
     *
     * @param $uri
     *
     * @return $this
     */
    protected function hit($uri)
    {
        return $this->get(static::API_PREFIX . $uri, ['X-Authorization' => $this->apiKey]);
    }


    /**
     * Post an API endpoint
     *
     * @param $uri
     * @param $data
     *
     * @return $this
     */
    protected function post_hit($uri, $data)
    {
        return $this->post(static::API_PREFIX . $uri, $data, ['X-Authorization' => $this->apiKey]);
    }
}