<?php
use TechnoChoix\Article;

class ArticleTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    protected $admin;
    protected $em;
    protected function _before()
    {
        $this->em= $this->getModule('Symfony2')->container->get('doctrine.orm.entity_manager');
        
        $adminId=$this->tester->haveInRepository('\TechnoChoix\Admin', []);
        $this->admin=$this->getModule('Symfony2')->container->get('techno_choix.repository.admins')->trouverParId($adminId);
    }

    protected function _after()
    {
    }

    /**
     * @test
     */
    public function ecrire_un_nouveau_article()
    {
        $foo=Article::ecrire('foo')
            ->par($this->admin)
            ->titre('foo')
            ->sousTitre('foo')
            ->image('articles/foo.png');
        $this->em->persist($foo);
        $this->em->flush();
        $this->tester->seeInRepository('\TechnoChoix\Article', ['titre'=>'foo', 'sousTitre'=>'foo', 'image'=>'articles/foo.png', 'body'=>'foo', 'admin'=>$this->admin]);
    }

}