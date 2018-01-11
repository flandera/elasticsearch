<?php
/**
 * Created by PhpStorm.
 * User: FlanderaT
 * Date: 23.11.2017
 * Time: 16:44
 */

namespace Flandera\ElasticaExtension;

use Elastica\Connection;
use Nette\DI\CompilerExtension;

class ElasticaExtension extends CompilerExtension
{

	/**
	 * @var array
	 */
	public $defaults = [
		'debugger' => '%debugMode%',
	];

	/**
	 * @var array
	 */
	public $elasticaDefaults = [
		'connections' => [],
		'roundRobin' => FALSE,
		'retryOnConflict' => 0,
	];

	/**
	 * Default configuration options
	 * @var array
	 */
	private $connectionDefaults = [
		'host' => 'localhost',
		'port' => 9200,
		'path' => NULL,
		'proxy' => NULL,
		'transport' => Connection::DEFAULT_TRANSPORT,
		'persistent' => TRUE,
		'timeout' => Connection::TIMEOUT,
		'username' => 'elastic',
		'password' => 'changeme',
		'config' => array(
			'curl' => array(), # curl options
			'headers' => array(), # additional curl headers
			'url' => NULL, # completely custom URL endpoint
			'username' => 'elastic',
			'password' => 'changeme',
		)
	];

	public function loadConfiguration()
	{
		$configuration = $this->config;
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig($configuration + $this->defaults + $this->elasticaDefaults + $this->connectionDefaults);

		$builder->addDefinition($this->prefix('elasticSearch'))
			->setClass('Flandera\ElasticaExtension\Services\Client', [$config]);
	}

}
