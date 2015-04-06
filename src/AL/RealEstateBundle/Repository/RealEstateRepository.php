<?php

namespace Ens\JobeetBundle\Repository;
use Doctrine\ORM\EntityRepository;

class RealEstateRepository extends EntityRepository
{
    public function getActiveRealEstates($max = null)
    {
        $qb = $this->createQueryBuilder('j')
            ->where('j.is_activated = :activated')
            ->setParameter('activated', 1)
            ->orderBy('j.created_at', 'DESC');

        if($max)
        {
            $qb->setMaxResults($max);
        }
        $query = $qb->getQuery();
        return $query-getResult();
    }
}
?>