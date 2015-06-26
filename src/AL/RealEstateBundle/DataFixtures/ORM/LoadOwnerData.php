<?php
namespace Ens\JobeetBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AL\RealEstateBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $alex = new User();
        $alex->setName('Александр Анатольевич');
        $alex->setUsername('Lexx');
        $alex->setEmail('joril@rambler.ru');
        $alex->setPhoneNumber('0672365789');
        $alex->setPassword('token1');

        $john = new User();
        $john->setName('Джон Васильевич');
        $john->setUsername('John');
        $john->setEmail('joril90@gmail.com');
        $john->setPhoneNumber('0972835835');
        $john->setPassword('token2');

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