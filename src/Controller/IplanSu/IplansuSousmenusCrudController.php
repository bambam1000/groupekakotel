<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuSousmenus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuSousmenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuSousmenus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom_fr');
         yield TextField::new('nom_ang');
         yield SlugField::new('slug')
         ->setTargetFieldName('nom_fr');
         yield TextField::new('link');
    }
    
}
