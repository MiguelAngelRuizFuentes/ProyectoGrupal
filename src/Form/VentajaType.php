<?php

namespace App\Form;

use App\Entity\Ventaja;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VentajaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('nombreEmpresa')
            ->add('descripcion')
            ->add('imagen')
            ->add('enlace')
            ->add('codigoDescuento')
            ->add('autor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ventaja::class,
        ]);
    }
}
