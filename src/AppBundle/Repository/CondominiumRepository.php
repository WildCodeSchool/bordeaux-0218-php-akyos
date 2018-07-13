<?php

namespace AppBundle\Repository;

/**
 * CondominiumRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CondominiumRepository extends \Doctrine\ORM\EntityRepository
{
    public function condoBySyndicQueryBuilder( $syndicateId)
    {
        return $this->createQueryBuilder('condominium')
            ->andWhere('condominium.syndicate = :syndicate_id')
            ->setParameter('syndicate_id', $syndicateId);
    }
}
