<?php
// src/AppBundle/Form/Type/TaskType.php

namespace BSMS\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
                ->add('fname', 'text', array('label'=>false, 'required'=>true, 'attr'=>array('placeholder'=>'First Name')))
                ->add('lname', 'text', array('label'=>false, 'required'=>true, 'attr'=>array('placeholder'=>'Last Name')))
                ->add('email', 'email', array('required'=>true, 'attr'=>array('placeholder'=>'Email')))
                ->add('pid', 'number', array('label'=>'PID'))
                ->add('minor', 'text', array('label'=>false, 'required'=>true, 'attr'=>array('placeholder'=>'Minor')))                
                ->add('gpa', 'text', array('label'=>'GPA', 'attr'=>array('placeholder'=>'GPA'), 'required'=>true))
                ->add('advisor1', 'entity', array('class' => 'BSMSMainBundle:Admin', 'property'=>'username'))
                ->add('advisor2', 'entity', array('class' => 'BSMSMainBundle:Admin', 'property'=>'username'))
                ->add('term', 'date')
                ->add('file1', 'file', array('label'=>'Upload Transcript as PDF', 'required'=>false))
                ->add('file2', 'file', array('label'=>'Upload Statement of Purpose as PDF', 'required'=>false))
                ->add('file3', 'file', array('label'=>'Upload Resume as PDF', 'required'=>false))
                ->add('submit', 'submit', array('label' => 'Submit'));
                // ->add('addr1', 'text', array('label'=>'Address', 'attr'=>array('placeholder'=>'Street Address Line 1'), 'required'=>true))
                // ->add('addr2', 'text', array('label'=>false, 'attr'=>array('placeholder'=>'Street Address Line 2 (optional)'), 'required'=>false))
                // ->add('state', 'choice', array('choices'=> array('select' => 'Select'), 'required' => true,))
                // ->add('zip', 'number', array('label'=>false, 'required'=>true, 'attr'=>array('placeholder'=>'Zip Code')))
    }

    public function getName()
    {
        return 'application';
    }
}