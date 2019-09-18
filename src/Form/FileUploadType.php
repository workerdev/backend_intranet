<?php

namespace App\Form;

use Doctrine\ORM\EntityRepository;
use App\Entity\Documento;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileUploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('vinculodiagrama', FileType::class, array(
            'label' => 'Archivo diagrama flujo',
            'required' => false
        ))
        ->add('vinculodescarga', FileType::class, array(
            'label' => 'Archivo descarga',
            'required' => false
        ))
        ->add('fkdoc', EntityType::class, array(
            'class' => Documento::class,
            'query_builder' => function (EntityRepository $doc) {
                return $doc->createQueryBuilder('d')
                    ->where('d.estado=1')
                    ->orderBy('d.codigo', 'ASC');
            },
            'choice_label' => 'codigo',
            'label' => 'Documento',
            'required' => false,
            'attr' => ['class' => 'form-line form-label']
        ))
        ->add('vinculoarchivo', FileType::class, array(
            'label' => 'Archivo PDF',
            'required' => false
        ))
        ->add('submit',SubmitType::class, array(
            'label' => 'Aprobar',
            'attr' => ['class' => 'btn bg-blue waves-effect']
        ))
        ->add('id', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('codigo', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('ficha', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('tipo', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('titulo', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('version', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('aprobador', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('nuevoactualizacion', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('fechapublicacion', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('carpetaoperativa', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('documento', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
        ->add('formulario', TextType::class, array(
            'attr' => ['type' => 'hidden'],
            'required' => false
        ))
      
        ;
    }
}
