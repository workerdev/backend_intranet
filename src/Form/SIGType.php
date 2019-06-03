<?php

namespace App\Form;

use App\Entity\SIG;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SIGType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('titulo', TextType::class, array(
                'label' => 'Titulo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('ruta',Filetype::class, array(
                'label' => 'Elegir archivo',
                'attr' => ['class' => 'form-line form-label'],
                'required' => false
            ))
            ->add('fksuperior', EntityType::class, array(
                'class' => SIG::class,
                'query_builder' => function (EntityRepository $sp) {
                    return $sp->createQueryBuilder('s')
                        ->where('s.estado=1');
                },
                'choice_label' => 'titulo',
                'label' => 'Superior',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('submit',SubmitType::class, array(
                'label' => 'Guardar',
                'attr' => ['class' => 'btn bg-indigo waves-effect']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SIG::class,
        ]);
    }
}
