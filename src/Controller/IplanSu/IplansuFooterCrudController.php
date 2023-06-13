<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuFooter;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuFooterCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuFooter::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield TextField::new('titre_1');
        yield TextField::new('titre_2fr');
        yield TextField::new('titre_2ang');
        yield TextField::new('titre_3fr');
        yield TextField::new('titre_3ang');
        yield TextField::new('titre_4fr');
        yield TextField::new('titre_4fr');
        yield TextField::new('paragraphe_fr');
        yield TextField::new('paragraphe_ang');
        yield AssociationField::new('menus');
        yield AssociationField::new('sousmenus');
         

    }
    
}
