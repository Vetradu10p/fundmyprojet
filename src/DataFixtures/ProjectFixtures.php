<?php

namespace App\DataFixtures;

use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $goodgirl = new Project();
        $goodgirl->setName("Good Girl");
        $goodgirl->setImage("project1.jpg");
        $goodgirl->setExcerpt("Ce film parle de ...");
        $goodgirl->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $goodgirl->setGoal(5500.00);
        $goodgirl->prePersist();
        $goodgirl->addCategory($this->getReference("category-film")); //implements category
        $goodgirl->setUser($this->getReference("emma"));
        $manager->persist($goodgirl);
        $this->addReference("good-girl", $goodgirl);

        $lesyeuxdanslebus = new Project();
        $lesyeuxdanslebus->setName("Les yeux dans les bleus");
        $lesyeuxdanslebus->setImage("project2.jpg");
        $lesyeuxdanslebus->setExcerpt("Revivez la grande épopée de l'équipe de France de football lors du mondial de football 2010");
        $lesyeuxdanslebus->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $lesyeuxdanslebus->setGoal(2250.00);
        $lesyeuxdanslebus->prePersist();
        $lesyeuxdanslebus->addCategory($this->getReference("category-film"));
        $lesyeuxdanslebus->addCategory($this->getReference("category-sport"));
        $lesyeuxdanslebus->setUser($this->getReference("emma"));
        $manager->persist($lesyeuxdanslebus);
        $this->addReference("les-yeux-dans-le-bus", $lesyeuxdanslebus);

        $dabado = new Project();
        $dabado->setName("Dabado");
        $dabado->setImage("project3.jpg");
        $dabado->setExcerpt("Un jeu fantastique peint à la main. Plongez dans des aventures extra-ordinaires !");
        $dabado->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $dabado->setGoal(7500.00);
        $dabado->prePersist();
        $dabado->addCategory($this->getReference("category-jeux"));
        $dabado->setUser($this->getReference("emma"));
        $manager->persist($dabado);
        $this->addReference("Dabado", $dabado);

        $doosh = new Project();
        $doosh->setName("DOOSH");
        $doosh->setImage("project4.jpg");
        $doosh->setExcerpt("Venez m'accompagner dans mon projet de création musicale avec clip vidéo ");
        $doosh->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet at aut blanditiis corporis culpa deleniti dignissimos eos ex facilis inventore iusto laudantium odit, quibusdam rerum, sapiente sequi temporibus.");
        $doosh->setGoal(8500.00);
        $doosh->prePersist();
        $doosh->addCategory($this->getReference("category-musique"));
        $doosh->addCategory($this->getReference("category-film"));
        $doosh->setUser($this->getReference("emma"));
        $manager->persist($doosh);
        $this->addReference("Doosh", $doosh);


        $manager->flush();
    }


    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class
        ];
    }
}
