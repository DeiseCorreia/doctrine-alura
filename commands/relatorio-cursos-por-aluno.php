<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;
use Doctrine\DBAL\Logging\DebugStack;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();
$alunoRepository = $entityManager->getRepository(Aluno::class);

$debugStack = new DebugStack();
$entityManager->getConfiguration()->setSQLLogger($debugStack);//debug do que está
//acontecendo num ambiente de execução

/** @var Aluno[] $alunos*/
$alunos =  $alunoRepository->findAll();

foreach($alunos as $aluno) {
    $telefones = $aluno
        ->getTelefones()
        ->map(function (Telefone $telefone){
            return $telefone->getNumero();
        })
        ->toArray();

    echo "id: {$aluno->getId()}\n";
    echo "nome:{$aluno->getNome()}\n";
    echo "telefones: " . implode(", ", $telefones) . "\n";

    $cursos = $aluno->getCursos();
    foreach ($cursos as $curso){
        echo "\tID Curso: {$curso->getId()}";
        echo "\tCurso: {$curso->getNome()}";
        echo "\n";
    }
    echo "\n";
}
echo "\n";
foreach ($debugStack->queries as $queryInfo){
    echo $queryInfo['sql'] . "\n";
}
