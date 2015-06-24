<?php namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TechnoChoix\Compte;
class LoadCompteData extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        $compte=new Compte();
        $compte->setUsername('admin');
        $compte->setEmail('admin@technochoix.com');
        $compte->setPlainPassword('secret');
        $compte->setEnabled(true);
        $compte->setSuperAdmin(true);
        $this->addReference('compte_admin', $compte);
        $manager->persist($compte);
        $manager->flush();
    }
    public function getOrder(){
        return 1;
    }
}