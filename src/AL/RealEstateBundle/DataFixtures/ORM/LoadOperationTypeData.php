<?php
namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AL\RealEstateBundle\Entity\OperationType;

class LoadOperationTypeData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $sale = new OperationType();
        $sale->setType('Продажа');

        $buy = new OperationType();
        $buy -> setType('Покупка');

        $rent = new OperationType();
        $rent -> setType('Съём');

        $toRent = new OperationType();
        $toRent -> setType('Сдача');

        $em->persist($sale);
        $em->persist($buy);
        $em->persist($rent);
        $em->persist($toRent);


        $em->flush();

        $this->addReference('operation-type-sale', $sale);
        $this->addReference('operation-type-buy', $buy);
        $this->addReference('operation-type-rent', $rent);
        $this->addReference('operation-type-to-rent', $toRent);
    }

    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
?>