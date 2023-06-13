<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuSection::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom');
        yield SlugField::new('slug')
        ->setTargetFieldName('nom');
        yield TextField::new('categorie');
        yield TextField::new('titre_fr');
        yield TextField::new('titre_ang');
        yield TextField::new('paragraphe_fr');
        yield TextField::new('paragraphe_fr');
        yield TextareaField::new('content_fr');
        yield TextareaField::new('content_ang');
        yield TextField::new('lien_fr');
        yield TextField::new('lien_ang');
        yield TextField::new('url');
        yield AssociationField::new('actualite');
        yield AssociationField::new('image');




    }

}
