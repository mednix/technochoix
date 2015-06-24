<?php
use \FunctionalTester;

class FaireDemandeDevisCest
{
    public function _before(FunctionalTester $I)
    {
        $I->am('un client');
        $I->wantTo('faire une demande de devis');
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tester_le_cas_ideal(FunctionalTester $I)
    {
        
        $I->sendAjaxPostRequest('/devis', ['nom' => 'foo' , 'telephone'=> '0666666666', 'demande' =>'bar']);
        $I->seeInRepository('TechnoChoix\Client', ['telephone'=> '0666666666']);
        $I->see('Merci');
    }
    public function tester_le_cas_des_donnees_vides(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('/devis', ['nom' => '' , 'telephone'=> '', 'demande' =>'']);
        $I->see('Erreur');
    }
    public function tester_le_cas_ou_aucune_donnee_n_est_entree(FunctionalTester $I)
    {
        $I->sendAjaxPostRequest('/devis', []);
        $I->see('Erreur');
    }
}