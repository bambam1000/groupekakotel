<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuActualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuActualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield SlugField::new('slug')
         ->setTargetFieldName('nom');
        yield TextField::new('categorie');
         yield TextField::new('titre_fr');
         yield TextField::new('titre_ang');
        yield TextField::new('nom');
        yield TextField::new('chapeau_fr');
        yield TextField::new('chapeau_ang');
        yield TextareaField::new('content_fr');
        yield TextareaField::new('content_ang');
        yield TextField::new('icon');
        yield TextField::new('categorie');
        yield AssociationField::new('image');

        
    }

}
