<?php

namespace App\Controller\Iplan;

use App\Entity\IplanActualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplanActualite::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield SlugField::new('slug')
          ->setTargetFieldName('nom');
        yield TextField::new('categorie');       
        yield TextField::new('titre_fr');
        yield TextField::new('titre_ang');
        yield TextField::new('chapeau_fr');
        yield TextField::new('chapeau_ang');
        yield TextareaField::new('content_fr');
        yield TextareaField::new('content_ang');
        yield TextField::new('icon');
        yield AssociationField::new('iplanimage');


    }
    
}
