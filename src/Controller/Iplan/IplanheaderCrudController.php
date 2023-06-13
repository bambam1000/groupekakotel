<?php

namespace App\Controller\Iplan;

use App\Entity\Iplanheader;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplanheaderCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Iplanheader::class;
    }


    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom');
         yield TextField::new('email');
         yield TextField::new('contact');
         yield AssociationField::new('logoIplan');
         yield AssociationField::new('iplanmenus');
    }
    
}
