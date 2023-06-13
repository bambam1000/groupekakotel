<?php

namespace App\Controller\Iplan;

use App\Entity\IplanMenus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanMenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplanMenus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom_fr');
         yield SlugField::new('slug')
          ->setTargetFieldName('nom_fr');
         yield TextField::new('nom_ang');
         yield TextField::new('link');
         yield AssociationField::new('iplansousmenus');
    }
    
}
