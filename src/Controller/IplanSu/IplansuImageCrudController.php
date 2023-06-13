<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class IplansuImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return IplansuImage::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $mediasDir= $this->getParameter('medias_directory');
        $uploadsDir = $this->getParameter('uploads_directory');

        yield TextField::new('nom');

        $imageField= ImageField::new( 'filename','Media')
           ->setBasePath($uploadsDir)
           ->setUploadDir($mediasDir)
           ->setUploadedFileNamePattern('[slug]-[uuid].[extension]');

           if (Crud::PAGE_EDIT == $pageName){
             
               $imageField->setRequired(false);

           }
           yield $imageField;
    }
    
}
