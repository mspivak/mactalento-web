<?php

namespace Mactalento;

class Jobs {

	static protected $url = 'http://api.rms.mactalento.com/';

	static protected $path = 'jobs';

	static protected $cacheExpire = 300; // Cinco minutos

	static protected function cacheGet() {

		$file = dirname(__FILE__) . '/jobs.json';
		$url = self::$url . self::$path;

		if (file_exists($file) && (filemtime($file) > (time() - self::$cacheExpire))) {
			$data = json_decode(file_get_contents($file));
		} else {
			$jsonData = file_get_contents($url);
			$data = json_decode($jsonData);
			if (!is_object($data)) {
				throw new \Exception('Ocurrió un error al recuperar la información desde el servidor. Por favor, intente mas tarde.');
			}
			file_put_contents($file, $jsonData, LOCK_EX);
		}

		return $data;

	}

	static protected function get() {

		$data = self::cacheGet();

		return $data->jobs;

	}

	static public function all() {

		return self::get();

	}

	static public function one($id) {

		$jobs = self::all();

		foreach ($jobs as $job) {
			if ($job->id === $id) {
				return $job;
			}
		}

		return null;

	}
	
	static public function oportunidad($id) {

		$jobs = self::all();

		foreach ($jobs as $job) {
			/* if ($job->id === $id) {
				return $job;
			} */
			echo $job['title'];
		}
		/* foreach($results['data'] as $result) {
			echo $result['type'], '<br>';
		} */

		return null;

	}

}