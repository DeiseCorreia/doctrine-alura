<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';


$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
//busca de todos os alunos
$classeAluno = Aluno::class;
$dql = "SELECT COUNT(a) FROM $classeAluno a";
$query = $entityManager->createQuery($dql);
$totalAlunos = $query->getSingleScalarResult();


echo "Total de alunos: " . $totalAlunos;



//singleResult ->traz um unico valor escalar, o scalarResult traz todos os valores