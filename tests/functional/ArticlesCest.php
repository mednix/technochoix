<?php
use \FunctionalTester;

class ArticlesCest
{
    public function _before(FunctionalTester $I)
    {
      
    }

    public function afficher_liste_articles_et_formulaire(FunctionalTester $I)
    {
        $I->amOnPage('/backend/articles');
    }

    public function ecrire_un_nouvel_article(FunctionalTester $I)
    {
    }
}