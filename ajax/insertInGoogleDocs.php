<?php
/**
 * Created by PhpStorm.
 * User: Ultra
 * Date: 19.05.2019
 * Time: 19:36
 */

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once('../DB.php');
$db = new DB('localhost', 'natnetApp', 'root', "");
$db->openConnect();
$result = $db->createQuery('SELECT * FROM `users_table` WHERE age >= 18');
$db->closeConnect();

$listFeedRows = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $listFeedRows[] = [
            'name' => "'" . $row["name"],
            'secondname' => "'" . $row["second_name"],
            'age' => "'" . $row["age"],
        ];
    }
}

print_r($listFeedRows);

if ($result->num_rows > 0) {
    putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $_SERVER['DOCUMENT_ROOT'] . '/client_id.json');

    $client = new Google_Client;
    try {
        $client->useApplicationDefaultCredentials();
        $client->setApplicationName("natnet2");
        $client->setScopes(['https://www.googleapis.com/auth/drive', 'https://spreadsheets.google.com/feeds']);
        if ($client->isAccessTokenExpired()) {
            $client->refreshTokenWithAssertion();
        }
        $accessToken = $client->fetchAccessTokenWithAssertion()["access_token"];
        ServiceRequestFactory::setInstance(
            new DefaultServiceRequest($accessToken)
        );
        // Get our spreadsheet
        $spreadsheet = (new Google\Spreadsheet\SpreadsheetService)
            ->getSpreadsheetFeed()
            ->getByTitle('Test');
        // Get the first worksheet (tab)
        $worksheets = $spreadsheet->getWorksheetFeed()->getEntries();
        $worksheet = $worksheets[0];
        $listFeed = $worksheet->getListFeed();
        foreach ($listFeedRows as $item){
            $listFeed->insert($item);
        }

    } catch (Exception $e) {
        echo $e->getMessage() . ' ' . $e->getLine() . ' ' . $e->getFile() . ' ' . $e->getCode;
    }

}

