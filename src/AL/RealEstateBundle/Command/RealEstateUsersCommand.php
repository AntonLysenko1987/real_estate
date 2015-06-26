<?php
namespace AL\RealEstateBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use AL\RealEstateBundle\Entity\User;


class RealEstateUsersCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('al:realestate:users')
            ->setDescription('Add Real Estate users')
            ->addArgument('username', InputArgument::REQUIRED, 'The username')
            ->addArgument('password', InputArgument::REQUIRED, 'The password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');

        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $user = new User();
        $user->setUsername($username);
        $user->setName($username);
        $user->setEmail('anton@test.com');
        $user->setPhoneNumber('1111111');
        $user->setToken('1ss1111');

        // encode the password
        $factory = $this->getContainer()->get('security.encoder_factory');
        $encoder = $factory->getEncoder($user);
        $encodedPassword = $encoder->encodePassword($password, $user->getSalt());
        $user->setPassword($encodedPassword);
        $em->persist($user);
        $em->flush();

        $output->writeln(sprintf('Added %s user with password %s', $username, $password));
    }

}
?>