<?php

class Sklik_Model_Auto_KeywordCompare extends Sklik_Model_Auto_AbstractCompare {

    public function initSklikResponce(array $keywordsListResponce = NULL) {
        if (!empty($keywordsListResponce)) {
            $smmakm = new Sklik_Model_Map_Api2keywordMapper();
            foreach ($smmakm->fetchAll($keywordsListResponce) as $val) {
                ($val->getRemoved() ? $this->setSklikRemove($val->getId(), $val->getName()) : $this->setSklikActive($val->getId(), $val->getName()));
                $this->setSklikAll($val->getId(), $val->getName());
            }
        }
    }

    public function initDbWithSklikId2Name($inputDataDb) {
        if (!empty($inputDataDb)) {
            $smmvskm = new Sklik_Model_Map_View2sklik2keywordMapper();
            foreach ($smmvskm->fetchAll($inputDataDb) as $val) {
                $this->setDbWords($val->getEkSklikId(), $val->getEkKeyword());
            }
        }
    }

    public function initDbNoSklikId2Name($inputDataDb) {
        if (!empty($inputDataDb)) {
            $smmvskm = new Sklik_Model_Map_View2sklik2keywordMapper();
            foreach ($smmvskm->fetchAll($inputDataDb) as $val) {
                $this->setDbWords($val->getEkId(), $val->getEkKeyword());
            }
        }
    }

}

?>