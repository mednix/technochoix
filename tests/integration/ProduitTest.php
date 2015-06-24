<?php

use TechnoChoix\Produit;
class ProduitTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    protected $em;
    protected function _before()
    {
        $this->em= $this->getModule('Symfony2')->container->get('doctrine.orm.entity_manager');
    }

    protected function _after()
    {
    }

    
    /**
     * @test
     */
    public function ajouter_un_nouveau_produit()
    {
        $foo=Produit::ajouter('foo')
            ->prix(500)
            ->detailsTechniques('foo1'.PHP_EOL.'foo2')
            ->image('produits/foo.png');
        $this->em->persist($foo);
        $this->em->flush();
        $this->tester->seeInRepository('\TechnoChoix\Produit', ['nom'=>'foo', 'prix'=>500, 'image'=>'produits/foo.png', 'detailsTechniques'=>'foo1'.PHP_EOL.'foo2']);
    }

}