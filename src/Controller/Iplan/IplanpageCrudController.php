<?php

namespace App\Controller\Iplan;

use App\Entity\Iplanpage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanpageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Iplanpage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom');
         yield SlugField::new('slug')
          ->setTargetFieldName('nom');
         yield AssociationField::new('section'); 
    }
    
}
