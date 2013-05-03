<?php

class Sklik_Model_Map_View2sklik2groupMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {

        $entry = new Sklik_Model_Map_View2sklik2group();
        $entry->setEgId($row->eg_id)
                ->setEgTiCreate($row->eg_ti_create)
                ->setEgTsUpdate($row->eg_ts_update)
                ->setEgIdMode($row->eg_id_mode)
                ->setEgGroupCpc($row->eg_group_cpc)
                ->setEgIdAd($row->eg_id_ad)
                ->setEgSklikId($row->eg_sklik_id)
                ->setEgGroupName($row->eg_group_name)
                ->setEgTgKeywordCount($row->eg_tg_keyword_count)
                ->setEgTgKeywordCountSklik($row->eg_tg_keyword_count_sklik)
                ->setEdId($row->ed_id)
                ->setEdIdCampaign($row->ed_id_campaign)
                ->setEdParamIndex($row->ed_param_index)
                ->setEdProdId($row->ed_prod_id)
                ->setEdParamPrice($row->ed_param_price)
                ->setEcSklikId($row->ec_sklik_id)
                ->setEaCreative1($row->ea_creative1)
                ->setEaCreative2($row->ea_creative2)
                ->setEaCreative3($row->ea_creative3)
                ->setViewEgTsUpdate($row->view_eg_ts_update)
                ->setViewIdDev($row->view_id_dev)
                ->setViewIdTree($row->view_id_tree)
                ->setViewName($row->view_name)
                ->setViewUrlGroup($row->view_url_group);

        return $entry;
    }

}

?>