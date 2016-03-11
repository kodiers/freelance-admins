<?php
/**
 * Created by PhpStorm.
 * User: kodiers
 * Date: 08/03/16
 * Time: 04:26
 */
namespace Techforline\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, array('label' => 'Order title'))
            ->add('description', TextareaType::class, array('label' => 'Order description'))
            ->add('cost', IntegerType::class, array('label' => 'Order cost'))
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array('data_class' => 'Techforline\MainBundle\Entity\Orders')
        );
    }
}