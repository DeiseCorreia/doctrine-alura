<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';
//gerenciando a entidade
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$aluno = new Aluno();
$aluno->setNome($argv[1]);

for($i = 2;$i <$argc;$i++){
    $numeroTelefone = $argv[$i];
    $telefone = new Telefone();
    $telefone->setNumero($numeroTelefone);



    $aluno->addTelefone($telefone);
}



$entityManager->persist($aluno);//que dizer que essa entidade está sendo observada
//tudo o que eu alterar também estará sendo observado!

//terminei tudo pode ir no banco e salvar
$entityManager->flush();//efetivar a manipulação no banco