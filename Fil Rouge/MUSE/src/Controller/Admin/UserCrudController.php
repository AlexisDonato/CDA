<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Address;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    // public function configureFields(string $pageName): iterable
    // {
    //     yield ArrayField::new('roles')
    //         ->setHelp('Available roles: ROLE_SUPER_ADMIN, ROLE_ADMIN, ROLE_MODERATOR, ROLE_USER');

    //     yield AssociationField::new('address')
    //             ->autocomplete();

    //     yield DateField::new('registerDate')
    //             ->hideOnForm();
    // }
    
}