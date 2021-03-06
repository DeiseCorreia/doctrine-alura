<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * Undocumented function
     *
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException 
     */
    public function getEntityManager() :EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration([$rootDir . '/src'], true);
        $connection =[
                'driver' => 'pdo_mysql',
                'host' => 'localhost',
                'dbname' => 'curso_doctrine',
                'user'=> 'root',
                'password'=>'123456'
            ];
        return EntityManager::create($connection, $config);
    }
}