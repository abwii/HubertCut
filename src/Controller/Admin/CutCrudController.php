<?php

namespace App\Controller\Admin;

use App\Entity\Cut;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class CutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cut::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Cut')
            ->setEntityLabelInPlural('Cuts')
            ->setPageTitle('index', 'Uber Cut Administration - Cuts')
            ->setPaginatorPageSize(10);
    }
    

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('cutName'),
            TextField::new('cutSex'),
            TextField::new('cutLength'),
            NumberField::new('cutPrice')->setNumDecimals(2),
            TextField::new('cutDescription'),
        ];
    }
}
