<?php namespace AppBundle\DataFixtures\ORM;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;
use TechnoChoix\Article;
class LoadClientData extends AbstractFixture implements OrderedFixtureInterface{
    public function load(ObjectManager $manager){
        $faker=Faker::create();
        
        $article1=Article::ecrire("Article à rédiger")
            ->par($this->getReference('admin'))
            ->titre('VIDÉOSURVEILLANCE')
            ->sousTitre('Vente et Installation des dispositifs de vidéosurveillance')
            ->image('articles/videosurveillance.png');
        $this->addReference('article_1'., $article1);
        $manager->persist($article1);
        $article2=Article::ecrire("Article à rédiger")
            ->par($this->getReference('admin'))
            ->titre('MATÉRIEL INFORMATIQUE')
            ->sousTitre('VENTE ET RÉPARATION DES ORDINATEURS, IMPRIMANTES, ETC.')
            ->image('articles/materiel_informatique.png');
        $this->addReference('article_2'., $article2);
        $manager->persist($article2);
        $article3=Article::ecrire("Article à rédiger")
            ->par($this->getReference('admin'))
            ->titre('RÉSEAUX INFORMATIQUES')
            ->sousTitre('ETUDE ET INSTALLATION DES RÉSEAUX INFORMATIQUES PERMETTANT UNE COMMUNICATION FIABLE ET EFFICACE AU SEIN DE VOTRE ENTREPRISE.')
            ->image('articles/reseaux_informatiques.png');
        $this->addReference('article_3'., $article3);
        $manager->persist($article3);

         $article4=Article::ecrire("Article à rédiger")
            ->par($this->getReference('admin'))
            ->titre('SÉCURITÉ INFORMATIQUE')
            ->sousTitre('MISE EN PLACE DES MÉCANISMES GARANTISSANT LA FIABILITÉ ET LA SÉCURITÉ DE VOTRE INFRASTRUCTURE INFORMATIQUE.')
            ->image('articles/securite_informatique.png');
        $this->addReference('article_4'., $article4);
        $manager->persist($article4);

        $article5=Article::ecrire("Article à rédiger")
            ->par($this->getReference('admin'))
            ->titre('SUPPORT ET MAINTENANCE')
            ->sousTitre('NOTRE ÉQUIPE EST DISPONIBLE POUR VOUS GARANTIR LE MEILLEUR SUPPORT POSSIBLE.')
            ->image('articles/support.png');
        $this->addReference('article_5'., $article5);
        $manager->persist($article5);

        $manager->flush();
    }
    public function getOrder(){
        return 5;
    }
}