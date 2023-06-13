<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Section::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom_fr');
         yield TextField::new('nom_ang');
         yield TextField::new('category');
         yield AssociationField::new('actualite');
    }
    
}
