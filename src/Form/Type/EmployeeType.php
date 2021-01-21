<?php
namespace App\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
class EmployeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add('Name',TextType::class)->add('Age',TextType::class)->add('Salary',TextType::class)->add('Department',TextType::class)->add('Email',TextType::class)
        ->add('plainPassword', RepeatedType::class, array(
            'type'              => PasswordType::class,
            'mapped'            => false,
            'first_options'     => array('label' => 'Password'),
            'second_options'    => array('label' => 'Confirm Password'),
            'invalid_message' => 'The password fields must match.',
        ))->add('Sign-Up',SubmitType::class);
    }
}