<?php
namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AL\RealEstateBundle\Entity\RealEstateCategory;

class LoadRealEstateCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $house = new RealEstateCategory();
        $house -> setName('Дома');

        $flat = new RealEstateCategory();
        $flat -> setName('Квартиры');

        $land = new RealEstateCategory();
        $land -> setName('Земельные участки');

        $commercialEstate = new RealEstateCategory();
        $commercialEstate -> setName('Коммерческая недвижимость');

        $em->persist($house);
        $em->persist($flat);
        $em->persist($land);
        $em->persist($commercialEstate);


        $em->flush();

        $this->addReference('category-house', $house);
        $this->addReference('category-flat', $flat);
        $this->addReference('category-land', $land);
        $this->addReference('category-commercial', $commercialEstate);
    }

    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
?>