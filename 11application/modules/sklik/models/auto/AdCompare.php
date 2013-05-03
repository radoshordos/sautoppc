<?php

class Sklik_Model_Auto_AdCompare extends Sklik_Model_Auto_AbstractCompare {

    public function initSklikResponce(array $adListResponce = NULL) {
        if (!empty($adListResponce)) {
            $smmaam = new Sklik_Model_Map_Api2adMapper();
            foreach ($smmaam->fetchAll($adListResponce) as $val) {
                $smaao = new Sklik_Model_Auto_AdObject();
                $smaao->setEgaCreative1($val->getCreative1())
                        ->setEgaCreative2($val->getCreative2())
                        ->setEgaCreative3($val->getCreative3())
                        ->setEgaClickthruText($val->getClickthruText())
                        ->setEgaClickthruUrl($val->getClickthruUrl());

                ($val->getRemoved() ? $this->setSklikRemove($val->getId(), serialize($smaao->getArr())) : $this->setSklikActive($val->getId(), serialize($smaao->getArr())));
                $this->setSklikAll($val->getId(), serialize($smaao->getArr()));
            }
        }
    }

    public function initDbWithSklikId2Name($inputDataDb) {
        if (!empty($inputDataDb)) {
            $smmvsfm = new Sklik_Model_Map_View2sklik2finalMapper();
            foreach ($smmvsfm->fetchAll($inputDataDb) as $val) {
                $smaao = new Sklik_Model_Auto_AdObject();
                $smaao->setEgaCreative1($val->getEgaCreative1())
                        ->setEgaCreative2($val->getEgaCreative2())
                        ->setEgaCreative3($val->getEgaCreative3())
                        ->setEgaClickthruText($val->getEgaClickthruText())
                        ->setEgaClickthruUrl($val->getEgaClickthruUrl());
                $this->setDbWords($val->getEgaSklikId(), serialize($smaao->getArr()));
            }
        }
    }

    public function initDbNoSklikId2Name($inputDataDb) {
        if (!empty($inputDataDb)) {
            $smmvsfm = new Sklik_Model_Map_View2sklik2finalMapper();
            foreach ($smmvsfm->fetchAll($inputDataDb) as $val) {
                $smaao = new Sklik_Model_Auto_AdObject();
                $smaao->setEgaCreative1($val->getEgaCreative1())
                        ->setEgaCreative2($val->getEgaCreative2())
                        ->setEgaCreative3($val->getEgaCreative3())
                        ->setEgaClickthruText($val->getEgaClickthruText())
                        ->setEgaClickthruUrl($val->getEgaClickthruUrl());
                $this->setDbWords($val->getEgaId() . "|" . $val->getEgId(), serialize($smaao->getArr()));
            }
        }
    }

    public function compareData() {
        $this->setCompareCorrect(array_intersect($this->getSklikActive(), $this->getDbWords()));
        $this->setCompareRemove(array_diff($this->getSklikActive(), $this->getDbWords()));
        $this->setCompareCreate(array_diff($this->getDbWords(), $this->getSklikAll()));
        $this->setCompareRestore(array_intersect($this->getDbWords(), $this->getSklikRemove()));
    }

}

?>