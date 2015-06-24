<?php namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use TechnoChoix\Admin;
class LoadAdminData extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        $admin=new Admin();
        $admin->setCompte($this->getReference('compte_admin'));
        $this->addReference('admin', $admin);
        $manager->persist($admin);
        $manager->flush();
    }
    public function getOrder(){
        return 2;
    }
}