<?php
use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];//a partir desse id quero remover um aluno
$aluno = $entityManager->getReference(Aluno::class, $id);//aluno gerenciado e buscado pelo doctrine,
//não precisa ir ao banco de dados e poupo perfomarce


$entityManager->remove($aluno);
$entityManager->flush();//roda o delete

