<?php

namespace FastVPS\CpanelBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;

class HostRepository extends EntityRepository {

    public function findAll() {

/*        $q = $this->getEntityManager()
            ->createQuery("SELECT h
                               FROM FastVPSCpanelBundle:Host h
                               ORDER BY h.hostName ASC");*/

        $result = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('q')
            ->from('FastVPSCpanelBundle:Host', 'q')
            ->orderBy('q.hostName', 'ASC')
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);

        return $result;

    }

    public function findOneById($id) {

        $q = $this->getEntityManager()
            ->createQuery("SELECT h
                               FROM FastVPSCpanelBundle:Host h
                               WHERE h.hostName = " . $id);

        return $q->getResult();


    }

}