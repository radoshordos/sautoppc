<?php

class Sklik_Model_Auto_GroupCompare extends Sklik_Model_Auto_AbstractCompare {

    public function initSklikResponce(array $inputSklikResponce) {
        if (!empty($inputSklikResponce)) {
            $smmagm = new Sklik_Model_Map_Api2groupMapper();
            foreach ($smmagm->fetchAll($inputSklikResponce) as $val) {
                ($val->getRemoved() ? $this->setSklikRemove($val->getId(), $val->getName()) : $this->setSklikActive($val->getId(), $val->getName()));
                $this->setSklikAll($val->getId(), $val->getName());
            }
        }
    }

    public function initDbWithSklikId2Name($inputDataDb) {
        if (!empty($inputDataDb)) {
            $smmegm = new Sklik_Model_Map_Em2groupMapper();
            foreach ($smmegm->fetchAll($inputDataDb) as $val) {
                $this->setDbWords($val->getEgSklikId(), $val->getEgGroupName());
            }
        }
    }

    public function initDbNoSklikId2Name($inputDataDb) {
        if (!empty($inputDataDb)) {
            $smmegm = new Sklik_Model_Map_Em2groupMapper();
            foreach ($smmegm->fetchAll($inputDataDb) as $val) {
                $this->setDbWords($val->getEgId(), $val->getEgGroupName());
            }
        }
    }

}

?>