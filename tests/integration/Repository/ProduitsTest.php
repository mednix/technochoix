<?php
namespace Repository;


class ProduitsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    protected $produits;

    protected function _before()
    {
      $this->produits=$this->getModule('Symfony2')->container->get('techno_choix.repository.produits');
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function trouver_un_produit_par_id()
    {
        $fooId=$this->tester->haveInRepository('TechnoChoix\Produit', ['nom'=>'foo', 'prix'=>500, 'image'=>'produits/foo.png', 'detailsTechniques'=>'foo'.PHP_EOL.'bar']);
        $foo=$this->produits->trouverParId($fooId);
        $this->assertEquals('foo', $foo->getNom());
    }
    /**
     * @test
     */
    public function trouver_tous_les_produits()
    {
        $foo=$this->tester->haveInRepository('TechnoChoix\Produit', ['nom'=>'foo', 'prix'=>500, 'image'=>'produits/foo.png', 'detailsTechniques'=>'foo'.PHP_EOL.'bar']);
        $bar=$this->tester->haveInRepository('TechnoChoix\Produit', ['nom'=>'bar', 'prix'=>500, 'image'=>'produits/bar.png', 'detailsTechniques'=>'foo'.PHP_EOL.'bar']);
        $tous=$this->produits->trouverTous();
        $this->assertNotEmpty($tous);
        $this->assertContains($this->produits->trouverParId($foo), $tous);
        $this->assertContains($this->produits->trouverParId($bar), $tous);
    }

}