<?php namespace TechnoChoix\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TemoignerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom');
        $builder->add('client');
        $builder->add('logo', 'file',[
            'attr'=>[
                'class'=>'file'
            ] 
        ]);
        $builder->add('Enregistrer', 'submit',[
            'attr'=>[
                'class'=>'btn btn-primary'
            ]
        ]);
    }

    public function getName()
    {
        return 'temoigner';
    }
}