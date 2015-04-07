<?php
namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AL\RealEstateBundle\Entity\RealEstate;
//use Symfony\Component\Validator\Constraints\DateTime;

class LoadRealEstateData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $real_estate_flat = new RealEstate();
        $real_estate_flat -> setCategory($em->merge($this->getReference('category-flat')));
        $real_estate_flat -> setOperationType($em->merge($this->getReference('operation-type-sale')));
        $real_estate_flat -> setAddress('ул. Киевская д.63');
        $real_estate_flat -> setPrice(36500);
        $real_estate_flat -> setDescription('Квартира с евроремонтом');
        $real_estate_flat -> setIsPublic(true);
        $real_estate_flat -> setIsActivated(true);
        $real_estate_flat -> setExpiresAt(new \DateTime('tomorrow'));
        $real_estate_flat -> setOwners($em->merge($this->getReference('owner-alex')));

        $real_estate_house = new RealEstate();
        $real_estate_house -> setCategory($em->merge($this->getReference('category-house')));
        $real_estate_house -> setOperationType($em->merge($this->getReference('operation-type-rent')));
        $real_estate_house -> setAddress('Щемиловка');
        $real_estate_house -> setPrice(200000);
        $real_estate_house -> setDescription('Большой пацанский котедж');
        $real_estate_house -> setIsPublic(true);
        $real_estate_house -> setIsActivated(true);
        $real_estate_house -> setExpiresAt(new \DateTime('tomorrow'));
        $real_estate_house -> setOwners($em->merge($this->getReference('owner-john')));

        $em->persist($real_estate_flat);
        $em->persist($real_estate_house);

        for($i = 1; $i <= 30; $i++)
        {
            $real_estate = new RealEstate();
            $real_estate -> setCategory($em->merge($this->getReference('category-land')));
            $real_estate -> setOperationType($em->merge($this->getReference('operation-type-to-rent')));
            $real_estate -> setAddress('Поле_'.$i);
            $real_estate -> setPrice(20000+$i);
            $real_estate -> setDescription('Земельный участок за городом_'.$i);
            $real_estate -> setIsPublic(true);
            $real_estate -> setIsActivated(true);
            $real_estate -> setExpiresAt(new \DateTime('tomorrow'));
            $real_estate -> setOwners($em->merge($this->getReference('owner-john')));

            $em->persist($real_estate);
        }

        $em->flush();
    }

    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
?>