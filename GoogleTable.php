<?php
/**
 * Created by David Basov.
 * User: Ultra
 * Date: 19.05.2019
 * Time: 8:52
 */

class GoogleTable
{
    private $client;

    public function __construct()
    {

    }

    public function getClient()
    {
        $client = new Google_Client;
    }
}