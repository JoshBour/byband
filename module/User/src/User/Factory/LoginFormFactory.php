<?php
namespace User\Factory;


use User\Entity\User;
use User\Form\LoginFieldset;
use User\Form\LoginForm;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\InputFilter\InputFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginFormFactory implements FactoryInterface
{
    const FORM_FIELDSET = '\User\Form\LoginFieldset';
    const FORM_ENTITY = '\User\Entity\User';


    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /**
         * @var \Doctrine\ORM\EntityManager $entityManager
         */
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');
        $formManager = $serviceLocator->get('FormElementManager');

        /**
         * @var LoginFieldset $fieldset
         */
        $fieldset = $formManager->get(self::FORM_FIELDSET);
        $form = new LoginForm();
        $hydrator = new DoctrineHydrator($entityManager, self::FORM_ENTITY);

        $fieldset->setUseAsBaseFieldset(true)
            ->setHydrator($hydrator)
            ->setObject(new User);

        $form->add($fieldset)
            ->setInputFilter(new InputFilter())
            ->setHydrator($hydrator);

        return $form;
    }

} 