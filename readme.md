## Elasticsearch connector
Extension for using Elastica client in Nette aplications.
Functional for connecting to Elasticsearch 6.1
Class is focused to autoload config values for Elastica and instantiate client.
Uses Ruflin/Elastica for connect and operate over elasticsearch in object oriented style
(source: https://github.com/ruflin/Elastica)
(documentation: http://elastica.io/)

- Easy config
- Autowired config values, instantiated client

## Requirements

+ PHP >=5.6
+ Composer >= 1.0
+ Ruflin/Elastica >= 5.3

## Instalation
Install with composer:
    1, Add this repository to your composer.json
    2, Manually run `composer require flandera/elastica_extension`
	3, Add to your config.neon configuration

## Configuration
        1. Register this extension in config.neon:

        extensions:
        	elasticSearch: Flandera\ElasticaExtension\ElasticaExtension
        	
        services:
            ElasticService:
            		factory: Flandera\ElasticaExtension\ElasticaExtension
            		inject: true	
            		
        2. Set configuration for extension (in your config.local.neon):

        elasticSearch:
        	host: 127.0.0.1
        	port: 9200
        	user: elastic
        	password: changeme
        	path: NULL
        	proxy: NULL
        	transport: 'Http'
        	persistent: on
        	timeout: 300
        	config:
        		curl: [] # curl options
        		headers: [] # additional curl headers
        		url: [] # completely custom URL endpoint
        		user: elastic
        		password: changeme
        	roundRobin: off
        	retryOnConflict: 0

#### Main configuration
- host - ip or url of elasticsearch server 
- user - for use with Xpack
- password - for use with Xpack


## Usage
Instantitate in constructor of class:

	public function __construct(Client $client) {
			$this->client = $client;
		}
		
Use Elastica methods:

	$this->client->getIndex('MyIndex');
