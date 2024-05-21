<?php

namespace App\Controller\Admin;

use App\Entity\Rdv;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;


class RdvCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Rdv::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('RDV')
            ->setEntityLabelInPlural('RDV')
            ->setPageTitle('index', 'Uber Cut Administration - Reservations')
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('RdvStatus'),
            ArrayField::new('RdvCoordinatesX')
                ->hideOnForm(),
            ArrayField::new('RdvCoordinatesY')
                ->hideOnForm(),
            DateTimeField::new('RdvDate'),
        ];
    }
}
