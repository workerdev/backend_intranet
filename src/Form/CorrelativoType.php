<?php

namespace App\Form;

use App\Entity\Correlativo;
use App\Entity\Personal;
use App\Entity\ControlCorrelativo;
use App\Entity\TipoNota;
use App\Entity\EstadoCorrelativo;
use App\Entity\Unidad;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CorrelativoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', TextType::class, array(
                'label' => 'ID',
                'attr' => ['class' => 'form-line form-label'],
                'attr' => ['type' => 'hidden']
            ))
            ->add('fktiponota', EntityType::class, array(
                'class' => TipoNota::class,
                'query_builder' => function (EntityRepository $tpn) {
                    return $tpn->createQueryBuilder('tn')
                        ->where('tn.estado=1');
                },
                'choice_label' => 'nombre',
                'label' => 'Tipo de nota',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fechareg', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de registro',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('redactor', TextType::class, array(
                'label' => 'Redactor',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fksolicitante', EntityType::class, array(
                'class' => Personal::class,
                'query_builder' => function (EntityRepository $per) {
                    return $per->createQueryBuilder('p')
                        ->where('p.estado=1');
                },
                'choice_label' => function ($fksolicitante) {
                    return $fksolicitante->getNombre() . ' ' . $fksolicitante->getApellido();
                },
                'label' => 'Solicitante',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('numcorrelativo', NumberType::class, array(
                'label' => 'Número correlativo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('destinatario', TextType::class, array(
                'label' => 'Destinatario',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('referencia', TextType::class, array(
                'label' => 'Referencia',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkcorrelativo', EntityType::class, array(
                'class' => ControlCorrelativo::class,
                'query_builder' => function (EntityRepository $ctr) {
                    return $ctr->createQueryBuilder('c')
                        ->where('c.estado=1');
                },
                'choice_label' => 'nombre',
                'label' => 'Centro de control correlativo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('equipo', TextType::class, array(
                'label' => 'Equipo',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('ip', TextType::class, array(
                'label' => 'IP',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('url', FileType::class, array(
                'label' => 'Url',
                'required' => false
            ))
            ->add('antecedente', TextType::class, array(
                'label' => 'Antecedente',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('item', TextType::class, array(
                'label' => 'Item',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('urleditable', FileType::class, array(
                'label' => 'Url editable',
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('entrega', DateType::class, array(
                'widget' => 'single_text',
                'label' => 'Fecha de entrega',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('urlorigen', FileType::class, array(
                'label' => 'Url origen',
                'required' => false,
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkestado', EntityType::class, array(
                'class' => EstadoCorrelativo::class,
                'query_builder' => function (EntityRepository $ectr) {
                    return $ectr->createQueryBuilder('ec')
                        ->where('ec.estado=1');
                },
                'choice_label' => 'nombre',
                'label' => 'Estado',
                'attr' => ['class' => 'form-line form-label']
            ))
            ->add('fkunidad', EntityType::class, array(
                'class' => Unidad::class,
                'query_builder' => function (EntityRepository $und) {
                    return $und->createQueryBuilder('u')
                        ->where('u.estado=1');
                },
                'choice_label' => 'nombre',
                'label' => 'Unidad',
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
            'data_class' => Correlativo::class,
        ]);
    }
}
