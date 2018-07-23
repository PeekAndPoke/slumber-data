[![Code Coverage](https://scrutinizer-ci.com/g/PeekAndPoke/slumber-data/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/PeekAndPoke/slumber-data/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PeekAndPoke/slumber-data/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PeekAndPoke/slumber-data/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/PeekAndPoke/slumber-data/badges/build.png?b=master)](https://scrutinizer-ci.com/g/PeekAndPoke/slumber-data/build-status/master)

# Slumber-Data

Slumber-data is a Object-Document-Maooer (ODM) built on top of [Slumber](https://github.com/PeekAndPoke/slumber). 
It uses to serializing / unserializing mechanism of Slumber under the hood.

Currently only a MongoDB storage driver is implemented.  
In theory it is possible to implement new drivers for other document databases, e.g. CouchDB. 


## Annotations

Slumber-Data uses annotations as well as Slumber does. Here are some examples


```php

/**
 *
 * Define a compound index on multiple fields 
 *
 * @Slumber\Store\CompoundIndex(
 *   background = true,
 *   def = { "email" : 1, "type" : 1 },
 *   unique = true,
 *   dropDups = true
 * )
 */

class MyClass {

    /**
     * @Slumber\AsString()
     * @Slumber\Store\Indexed(unique = true)
     */
    private $id;
   
    /**
     * @Slumber\AsString()
     * @Slumber\Store\Indexed(unique = true)
     */
    private $email;

    /**
     * @Slumber\AsString()
     */
    private $type;
    
    /* ... */
}

```


## Getting started

In order to used the Slumber storage some things need to be set up in the begging:

```php

// we need a PSR-11 ContainerInterface
$di = ...; 

// we need a PSR-3 logger
$logger = ...; 

// we need a doctrine cache ... ideall APCU as it is the fastest for our purpose
$cache = new ApcuCache();

// we need a doctrine annotation reader
$annotationReader = new CachedReader(new AnnotationReader(), $cache);

// SLUMBER: we need an instance of the entity config reader (the one that reads the Slumber annotations) 
$configReader = new MongoDbEntityConfigReaderCached(
    new MongoDbEntityConfigReaderImpl(
        new AnnotatedEntityConfigReader($di, $annotationReader, new MongoDbPropertyMarkerToMapper())
    ),
    $cache,
    'test',
    true
)

// SLUMBER: we need the codec set for serializing / unserializing
$codecSet = new MongoDbCodecSet($di, $configReader, $pool, $storage, $logger)

// SLUMBER: we need a storage instance
$storage  = new StorageImpl($entityPool, $registry);

// we need a mongo db connection
$dbClient = new MongoDB\Client('mongodb://localhost:27017', ['connect' => false]);
$database = $dbClient->selectDatabase("my-database");


// then we need to register repository providers on the storage

$registry->registerProvider(
  // the name in the registry
  "users",                                    
  // FQCNs of all classes stored in this collection
  "[User::class, AdvancedUser::class],                   
  // callback that creates the repository class
  function () use ($entityPool, $codecSet, $database) {   

    // get the collection from the database
    $collection = $database->selectCollection("users");
    // get a reflection of the main class stored in the collection
    $reflect    = new \ReflectionClass(User::class);

    return new EntityRepository(
      "users", 
      new MongoDbStorageDriver($entityPool, $codecSet, $collection, $reflect)
    );
});


```

## Core concepts

### Entity pooling

### RepositoryRegistry

### Storage Drivers


## Index builder




