<?php

namespace App\Form;

use App\Entity\DelegacionAutoridad;
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

class DelegacionAutoridadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('nombre', TextType::class, array(
                'label' => 'Nombre',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('cargo', TextType::class, array(
                'label' => 'Cargo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('foto',Filetype::class, array(
                'label' => 'Elegir imagen',
                'attr' => ['class' => 'form-line form-label'],
                'required' => false
            ))
            ->add('archivo',Filetype::class, array(
                'label' => 'Elegir archivo',
                'attr' => ['class' => 'form-line form-label'],
                'required' => false
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
            'data_class' => DelegacionAutoridad::class,
        ]);
    }
}
