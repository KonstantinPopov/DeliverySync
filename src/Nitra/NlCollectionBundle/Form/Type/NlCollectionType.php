<?php

namespace Nitra\NlCollectionBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class NlCollectionType extends AbstractType
{

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->set('allow_delete', $options['allow_delete']);
    }

    public function getParent()
    {
        return 'collection';
    }

    public function getName()
    {
        return 'nlcollection';
    }

}