<?php

namespace App\Controller\Iplan;

use App\Entity\Iplanfooter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanfooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Iplanfooter::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom');
         yield TextField::new('titre1_fr');
         yield TextField::new('titre1_ang');
         yield TextField::new('titre2_fr');
         yield TextField::new('titre2_ang');
         yield TextField::new('titre3_fr');
         yield TextField::new('titre3_ang');
         yield TextField::new('titre4_fr');
         yield TextField::new('titre4_ang');
         yield TextField::new('paragraphe_fr');
         yield TextField::new('paragraphe_ang');
         yield AssociationField::new('iplanmenus');
         yield AssociationField::new('iplansousmenus');
         
          
    }
    
}
