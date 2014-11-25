<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		$client = new Transmission\Client();
		$client->authenticate('transmission', 'transmission');
		$transmission = new  Transmission\Transmission();
		$transmission->setClient($client);

		$session = $transmission->getSession();
		$queue = $transmission->all();
		echo "Downloading to: {$transmission->getSession()->getDownloadDir()}\n";
		foreach ($queue as $torrent) {
			echo "{$torrent->getName()}";
			if ($torrent->isFinished()) {
				echo ": done\n";
			} else {
				if ($torrent->isDownloading()) {
					echo ": {$torrent->getPercentDone()}% ";
					echo "(eta: ". gmdate("H:i:s", $torrent->getEta()) .")\n";
				} else {
					echo ": paused\n";
				}
			}

		}
		// var_dump($torrents);
		return View::make('hello');
	}

}
