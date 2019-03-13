<?php

namespace App\Form;

use App\Entity\DocumentoProceso;
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

class DocumentoProcesoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('nuevoactualizacion', ChoiceType::class, array(
                'choices'  => array(
                    'NUEVO' => 'NUEVO',
                    'ACTUALIZACION' => 'ACTUALIZACION',
                ),
                'label' => 'Nuevo/Actualización',
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
            ->add('vinculoarchivo', FileType::class, array(
                'label' => 'Archivo',
                'required' => false
            ))
            ->add('carpetaoperativa', NumberType::class, array(
                'label' => 'Carpeta operativa',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('aprobadorechazado', ChoiceType::class, array(
                'choices'  => array(
                    'APROBADO' => 'APROBADO',
                    'RECHAZADO' => 'RECHAZADO',
                ),
                'label' => 'Aprobado/Rechazado',
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
            ->add('fechaaprobacion', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de aprobación',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkdocumento', EntityType::class, array(
                'class' => Documento::class,
                'query_builder' => function (EntityRepository $doc) {
                    return $doc->createQueryBuilder('d')
                        ->where('d.estado=1');
                },
                'choice_label' => 'codigo',
                'label' => 'Documento',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkproceso', EntityType::class, array(
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
            
            ->add('submit',SubmitType::class, array(
                'label' => 'Guardar',
                'attr' => ['class' => 'btn bg-indigo waves-effect']
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => DocumentoProceso::class,
        ]);
    }
}
