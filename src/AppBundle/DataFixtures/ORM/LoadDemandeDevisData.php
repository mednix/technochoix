<?php namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;
use TechnoChoix\DemandeDevis;
class LoadDemandeDevisData extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        $faker=Faker::create();
        $admin=$this->getReference('admin');
        foreach(range(1, 5) as $i){
            $client=$this->getReference('client_'.$i);
            foreach(range(1, 5) as $j){
                $demande=$client->faireDemandeDevis($faker->paragraph($faker->numberBetween(2, 5)));
                
                if($faker->randomElement([true, false])){
                    $admin->prendreEnChargeDemandeDevis($demande);
                }
                $this->addReference('demande_devis_'.$i.'_'.$j, $demande);
                $manager->persist($demande);
            }
           
        }
        
        $manager->flush();
    }
    public function getOrder(){
        return 4;
    }
}