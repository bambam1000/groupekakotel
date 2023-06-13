<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuHeader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuHeaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuHeader::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield TextField::new('contact');
        yield TextField::new('email');
        yield AssociationField::new('menus');
        yield AssociationField::new('logo');

    }
    
}
