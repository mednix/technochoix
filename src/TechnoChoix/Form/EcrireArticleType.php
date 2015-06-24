<?php namespace TechnoChoix\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EcrireArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre');
        $builder->add('sousTitre');
        $builder->add('image', 'file',[
            'attr'=>[
            'class'=>'file'
        ] 
        ]);
        $builder->add('body', 'textarea', array(
        'attr' => array(
            'class' => 'tinymce',
            'data-theme' => 'bbcode'
        )
    ));
        $builder->add('Enregistrer', 'submit',[
            'attr'=>[
                'class'=>'btn btn-primary'
            ]
        ]);
    }

    public function getName()
    {
        return 'ecrire_article';
    }
}