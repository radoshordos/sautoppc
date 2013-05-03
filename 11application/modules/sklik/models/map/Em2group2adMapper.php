<?php

class Sklik_Model_Map_Em2group2adMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_Em2group2ad();
        $entry->setEgaId($row->ega_id)
                ->setEgaTsUpdate($row->ega_ts_update)
                ->setEgaIdAd($row->ega_id_ad)
                ->setEgaIdGroup($row->ega_id_group)
                ->setEgaSklikId($row->ega_sklik_id)
                ->setEgaCreative1($row->ega_creative1)
                ->setEgaCreative2($row->ega_creative2)
                ->setEgaCreative3($row->ega_creative3)
                ->setEgaClickthruText($row->ega_clickthru_text)
                ->setEgaClickthruUrl($row->ega_clickthru_url);

        return $entry;
    }

}

?>
