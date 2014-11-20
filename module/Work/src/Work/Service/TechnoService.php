<?php
namespace Work\Service;

class TechnoService {
    private $em = null;

    public function getEntityManager()
    {
        return $this->em;
    }

    public function setEntityManager($em) {
        $this->em = $em;
    }

    public function findRefs($references) {
        $refObjects = [];

        foreach ($references as $key => $reference) {
            array_push($refObjects, $this->getEntityManager()->getRepository('Work\Entity\Ref')->find($reference));
        }

        return $refObjects;
    }
}