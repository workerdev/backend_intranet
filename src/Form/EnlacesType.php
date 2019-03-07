<?php

namespace App\Form;

use App\Entity\Enlaces;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class EnlacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'Enlaces ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('nombre', TextType::class, array(
                'label' => 'Nombre',
                'attr' => ['class' => 'form-line form-label']
            ))

            ->add('descripcion', TextType::class, array(
                'label' => 'Descripción',
                'attr' => ['class' => 'form-line form-label']
            ))

            ->add('ruta',Filetype::class, array(
                'label' => 'Elegir archivo',
                'attr' => ['class' => 'form-line form-label']
            ))

            ->add('link', UrlType::class, array(
                'label' => 'Link',
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
            'data_class' => Enlaces::class,
        ]);
    }
}
