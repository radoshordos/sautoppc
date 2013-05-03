<?php

class Sklik_Model_Map_View2sklik2finalMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {

        $entry = new Sklik_Model_Map_View2sklik2final();
        $entry->setEgaId($row->ega_id)
                ->setEgaTsUpdate($row->ega_ts_update)
                ->setEgaIdAd($row->ega_id_ad)
                ->setEgaIdGroup($row->ega_id_group)
                ->setEgaSklikId($row->ega_sklik_id)
                ->setEgaCreative1($row->ega_creative1)
                ->setEgaCreative2($row->ega_creative2)
                ->setEgaCreative3($row->ega_creative3)
                ->setEgaClickthruText($row->ega_clickthru_text)
                ->setEgaClickthruUrl($row->ega_clickthru_url)
                ->setEaTsUpdate($row->ea_ts_update)
                ->setEgaId($row->ega_id)
                ->setEgId($row->eg_id)
                ->setEgTsUpdate($row->eg_ts_update)
                ->setEgSklikId($row->eg_sklik_id)
                ->setEgGroupName($row->eg_group_name)
                ->setEdIdCampaign($row->ed_id_campaign)
                ->setViewIdDev($row->view_id_dev)
                ->setViewIdTree($row->view_id_tree);

        return $entry;
    }

}

?>