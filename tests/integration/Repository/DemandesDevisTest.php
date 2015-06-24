<?php
namespace Repository;

use TechnoChoix\DemandeDevis;
class DemandesDevisTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    protected $demandes;
    protected function _before()
    {
        $this->demandes=$this->clients=$this->getModule('Symfony2')->container->get('techno_choix.repository.demandes_devis');
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function trouver_nouvelles_demandes_non_prises_en_charge()
    {
        $client=$this->tester->haveInRepository('TechnoChoix\Client', ['nom'=>'foo','telephone'=>'0666666666']);
        $bar=$this->tester->haveInRepository('TechnoChoix\DemandeDevis', ['texte'=>'bar', 'etat'=> DemandeDevis::ETAT_NON_PRISE_EN_CHARGE, 'client_id'=>$client]);
        $baz=$this->tester->haveInRepository('TechnoChoix\DemandeDevis', ['texte'=>'baz', 'etat'=> DemandeDevis::ETAT_PRISE_EN_CHARGE, 'client_id'=>$client]);
        
        $nouvelles=$this->demandes->trouverDemandesNonPrisesEnCharge();
        $this->assertNotEmpty($nouvelles);
        $this->assertContains($this->demandes->trouverParId($bar), $nouvelles);
        $this->assertNotContains($this->demandes->trouverParId($baz), $nouvelles);
        
    }
    /**
     * @test
     */
    public function trouver_anciennes_demandes_deja_prises_en_charge()
    {
         $client=$this->tester->haveInRepository('TechnoChoix\Client', ['nom'=>'foo','telephone'=>'0666666666']);
        $bar=$this->tester->haveInRepository('TechnoChoix\DemandeDevis', ['texte'=>'bar', 'etat'=> DemandeDevis::ETAT_NON_PRISE_EN_CHARGE, 'client_id'=>$client]);
        $baz=$this->tester->haveInRepository('TechnoChoix\DemandeDevis', ['texte'=>'baz', 'etat'=> DemandeDevis::ETAT_PRISE_EN_CHARGE, 'client_id'=>$client]);
        
        $anciennes=$this->demandes->trouverDemandesPrisesEnCharge();

        $this->assertNotEmpty($anciennes);
        $this->assertContains($this->demandes->trouverParId($baz), $anciennes);
        $this->assertNotContains($this->demandes->trouverParId($bar), $anciennes);
    }

}