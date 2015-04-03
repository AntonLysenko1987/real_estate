<?php
namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AL\RealEstateBundle\Entity\Owner;

class LoadOwnerData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $alex = new Owner();
        $alex->setName('Александр Анатольевич');
        $alex->setEmail('joril@rambler.ru');
        $alex->setPhoneNumber('0672365789');
        $alex->setToken('token1');

        $john = new Owner();
        $john->setName('Джон Васильевич');
        $john->setEmail('joril90@gmail.com');
        $john->setPhoneNumber('0972835835');
        $john->setToken('token2');

        $em->persist($alex);
        $em->persist($john);


        $em->flush();

        $this->addReference('owner-alex', $alex);
        $this->addReference('owner-john', $john);
    }

    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
?>