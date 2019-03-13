<?php

namespace App\Form;

use App\Entity\Documento;
use App\Entity\TipoDocumento;
use App\Entity\FichaProcesos;
use App\Entity\Usuario;
use Doctrine\ORM\EntityRepository;
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

class DocumentoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('codigo', TextType::class, array(
                'label' => 'Código',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('titulo', TextType::class, array(
                'label' => 'Título',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('versionvigente', NumberType::class, array(
                'label' => 'Versión vigente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('vinculoarchivodig', FileType::class, array(
                'label' => 'Archivo digital',
                'required' => false
            ))
            ->add('vinculodiagflujo', FileType::class, array(
                'label' => 'Diagrama de flujo',
                'required' => false
            ))
            ->add('fechaPublicacion', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de publicación',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('carpetaOperativa', NumberType::class, array(
                'label' => 'Carpeta operativa',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkficha', EntityType::class, array(
                'class' => FichaProcesos::class,
                'query_builder' => function (EntityRepository $fp) {
                    return $fp->createQueryBuilder('f')
                        ->where('f.estado=1');
                },
                'choice_label' => 'codproceso',
                'label' => 'Proceso',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fktipo', EntityType::class, array(
                'class' => TipoDocumento::class,
                'query_builder' => function (EntityRepository $tp) {
                    return $tp->createQueryBuilder('t')
                        ->where('t.estado=1');
                },
                'choice_label' => 'nombre',
                'label' => 'Tipo de documento',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkaprobador', EntityType::class, array(
                'class' => Usuario::class,
                'query_builder' => function (EntityRepository $fc) {
                    return $fc->createQueryBuilder('u')
                        ->where('u.estado=1');
                },
                'choice_label' => function ($fkaprobador) {
                    return $fkaprobador->getNombre() . ' ' . $fkaprobador->getApellido();
                },
                'label' => 'Aprobador',
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
            'data_class' => Documento::class,
        ]);
    }
}
