<?php

namespace App\Tests;

use App\Entity\Dummy;
use App\Repository\DummyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class DatabaseTest extends KernelTestCase
{
    /** @test */
    public function itShouldPersistDummy(): void
    {
        $this->expectNotToPerformAssertions();
        self::bootKernel();
        /** @var EntityManagerInterface $entityManager */
        $entityManager = self::$container->get(EntityManagerInterface::class);

        $dummy = new Dummy();
        $dummy->setName('test');

        $entityManager->persist($dummy);
        $entityManager->flush();
    }

    /** @test */
    public function itShouldNotReturnResults(): void
    {
        self::bootKernel();
        /** @var DummyRepository $dummyRepository */
        $dummyRepository = self::$container->get(DummyRepository::class);
        $this->assertEmpty($dummyRepository->findAll());
    }
}
