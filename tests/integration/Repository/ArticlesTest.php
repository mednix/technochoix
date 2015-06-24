<?php
namespace Repository;


class ArticlesTest extends \Codeception\TestCase\Test
{
    /**
     * @var \IntegrationTester
     */
    protected $tester;
    protected $admin;
    protected $articles;
    protected function _before()
    {
        $this->articles=$this->getModule('Symfony2')->container->get('techno_choix.repository.articles');
        $adminId=$this->tester->haveInRepository('\TechnoChoix\Admin', []);
        $this->admin=$this->getModule('Symfony2')->container->get('techno_choix.repository.admins')->trouverParId($adminId);
    }

    protected function _after()
    {
    }
    /**
     * @test
     */
    public function trouver_un_article_par_id()
    {
        $fooId=$this->tester->haveInRepository('TechnoChoix\Article', ['titre'=>'foo', 'sousTitre'=>'foo', 'image'=>'articles/foo.png', 'body'=>'foo', 'admin'=>$this->admin]);
        $foo=$this->articles->trouverParId($fooId);
        $this->assertEquals('foo', $foo->getTitre());
    }
    /**
     * @test
     */
    public function trouver_tous_les_articles()
    {
        $foo=$this->tester->haveInRepository('TechnoChoix\Article', ['titre'=>'foo', 'sousTitre'=>'foo', 'image'=>'articles/foo.png', 'body'=>'foo', 'admin'=>$this->admin]);
        $bar=$this->tester->haveInRepository('TechnoChoix\Article', ['titre'=>'bar', 'sousTitre'=>'bar', 'image'=>'articles/bar.png', 'body'=>'bar', 'admin'=>$this->admin]);
        $tous=$this->articles->trouverTous();
        $this->assertNotEmpty($tous);
        $this->assertContains($this->articles->trouverParId($foo), $tous);
        $this->assertContains($this->articles->trouverParId($bar), $tous);
    }

}