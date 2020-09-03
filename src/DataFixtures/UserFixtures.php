<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    /**
     * UserFixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname("John");
        $admin->setLastname("Doe");
        $admin->setEmail("vetradu10p@gmail.com");
        $admin->setPassword($this->encoder->encodePassword($admin, "12345"));
        $admin->setRoles(["ROLE_ADMIN"]);
        $this->setReference("john", $admin); //implements userId
        $manager->persist($admin);

        $emma = new User();
        $emma->setFirstname("Emma");
        $emma->setLastname("Swann");
        $emma->setEmail("emma.swann@yahoo.fr");
        $emma->setPassword($this->encoder->encodePassword($admin, "rumple"));
        $emma->setRoles(["ROLE_USER"]);
        $this->setReference("emma", $emma); //implements userId
        $manager->persist($emma);

        $manager->flush();
    }
}
