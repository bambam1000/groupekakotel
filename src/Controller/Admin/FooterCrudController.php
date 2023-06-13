<?php

namespace App\Controller\Admin;

use App\Entity\Footer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Footer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield TextField::new('phrase');
        yield AssociationField::new('logo');
    }
    
}
