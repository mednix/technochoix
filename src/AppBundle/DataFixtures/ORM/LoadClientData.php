<?php namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;
use TechnoChoix\Client;
class LoadClientData extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        $faker=Faker::create();
        foreach(range(1, 5) as $i){
            $client=Client::nouveau($faker->name(), $faker->phoneNumber());
            $this->addReference('client_'.$i, $client);
            $manager->persist($client); 
        }
        
        $manager->flush();
    }
    public function getOrder(){
        return 3;
    }
}