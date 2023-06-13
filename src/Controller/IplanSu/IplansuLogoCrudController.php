<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuLogo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuLogoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuLogo::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom');
         yield AssociationField::new('image');
    }
    
}
