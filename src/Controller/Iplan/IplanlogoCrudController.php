<?php

namespace App\Controller\Iplan;

use App\Entity\Iplanlogo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanlogoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Iplanlogo::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom');
         yield AssociationField::new('iplanimage');
    }
    
}
