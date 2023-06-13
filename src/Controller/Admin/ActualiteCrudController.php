<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActualiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Actualite::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('titre');
        yield SlugField::new('slug')
          ->setTargetFieldName('titre');
         yield TextField::new('category');

        yield TextField::new('lien');
        yield TextField::new('lien_ang');
        yield TextField::new('url');
        yield TextField::new('icon');
        yield TextField::new('chapeau_fr');
        yield TextField::new('chapeau_ang');
        yield TextField::new('phrase1_fr');
        yield TextField::new('phrase2_fr');
        
    }
    
}
