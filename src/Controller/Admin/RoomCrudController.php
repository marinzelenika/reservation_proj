<?php

namespace App\Controller\Admin;

use App\Entity\Room;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RoomCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Room::class;
    }


    public function configureFields(string $pageName): iterable
    {
        $imageFile =  ImageField::new('thumbnailFile')->setFormType(VichImageType::class);
        $image =    ImageField::new('thumbnail')->setBasePath('/images/thumbnails');
        $fields = [

            TextField::new('title'),
            IntegerField::new('beds'),

        ];

        if ($pageName == Crud::PAGE_INDEX || $pageName == Crud::PAGE_DETAIL ){
            $fields[] = $image;
        } else{
            $fields[] = $imageFile;
        }
        return $fields;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX,'detail');
    }

}
