<?php

namespace App\Controller\Iplan;

use App\Entity\IplanSousmenus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanSousmenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplanSousmenus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom_fr');
         yield SlugField::new('slug')
          ->setTargetFieldName('nom_fr');
         yield TextField::new('nom_ang');
         yield TextField::new('link');

    }
    
}
