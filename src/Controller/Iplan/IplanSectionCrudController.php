<?php

namespace App\Controller\Iplan;

use App\Entity\IplanSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplanSection::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield SlugField::new('slug')
         ->setTargetFieldName('nom');
        yield TextField::new('Categorie');
        yield TextField::new('titre_fr');
        yield TextField::new('titre_ang');
        yield TextField::new('paragraphe_fr');
        yield TextField::new('paragraphe_ang');
        yield TextField::new('lien_fr');
        yield TextField::new('lien_ang');
        yield TextField::new('url');
        yield TextareaField::new('content_fr');
        yield TextareaField::new('content_ang');
        yield AssociationField::new('iplanactualite');
        yield AssociationField::new('iplanimage');

        
    }
    
}
