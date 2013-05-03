<?php

class Sklik_Model_Map_View2sklik2keywordMapper implements Sklik_Model_Map_iMapper {

    public function fetchAll($res) {
        foreach ($res as $row) {
            $entries[] = $this->fetchRow($row);
        }
        return $entries;
    }

    public function fetchRow($row) {
        $entry = new Sklik_Model_Map_View2sklik2keyword();
        $entry->setEkId($row->ek_id)
                ->setEkTsUpdate($row->ek_ts_update)
                ->setEkIdGroup($row->ek_id_group)
                ->setEkIdMatch($row->ek_id_match)
                ->setEkSklikId($row->ek_sklik_id)
                ->setEkKeyword($row->ek_keyword)
                ->setEkKeywordCpc($row->ek_keyword_cpc)
                ->setEkmCode($row->ekm_code)
                ->setEkmStringBefore($row->ekm_string_before)
                ->setEkmStringAfter($row->ekm_string_after)
                ->setEktName($row->ekt_name)
                ->setEgId($row->eg_id)
                ->setEgTsUpdate($row->eg_ts_update)
                ->setEgIdMode($row->eg_id_mode)
                ->setEgTgKeywordCount($row->eg_tg_keyword_count)
                ->setEgTgKeywordCountSklik($row->eg_tg_keyword_count_sklik)
                ->setEgSklikId($row->eg_sklik_id)
                ->setEgGroupName($row->eg_group_name)
                ->setViewEkTsUpdate($row->view_ek_ts_update);

        return $entry;
    }

}

?>