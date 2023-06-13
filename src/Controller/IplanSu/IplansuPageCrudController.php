<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuPage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\SlugType;

class IplansuPageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuPage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom');
         yield SlugField::new('slug')
          ->setTargetFieldName('nom');
         yield AssociationField::new('section');
    }
    
}
