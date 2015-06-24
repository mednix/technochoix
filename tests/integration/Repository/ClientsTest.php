<?php
namespace Repository;
use TechnoChoix\Client;

class ClientsTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    protected $clients;
    protected function _before()
    {
        $this->clients=$this->getModule('Symfony2')->container->get('techno_choix.repository.clients');
    }

    protected function _after()
    {
    }

    /** @test */
    public function trouver_un_client_par_numero_de_telephone()
    {
        $telephone='0666666666';
        $this->tester->haveInRepository('TechnoChoix\Client', ['name'=>'foo', 'telephone'=>$telephone]);
        $client=$this->clients->trouverParTelephone($telephone);
        $this->assertEquals($telephone, $client->getTelephone());
    }
    /** @test */
    public function retourner_null_si_client_pas_trouve()
    {
        $telephone='0666666666';
        $this->tester->haveInRepository('TechnoChoix\Client', ['name'=>'foo', 'telephone'=>'0111111111']);
        $resultat=$this->clients->trouverParTelephone($telephone);
        $this->assertNull($resultat);
    }

}