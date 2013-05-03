<?php

class Sklik_Model_Run_ActiveDbCacheRule extends Sklik_Model_Run_Abstract {

    public function __construct(Sklik_Model_Map_Em2exec $ex) {
        parent::__construct($ex);
        $this->runActiveDbCacheRule();
    }

    public function runActiveDbCacheRule() {

        $i = 0;
        $arr_edc_id = array();
        $db = Model_Zendb::myfactory();
        $edcrm = new Sklik_Model_Map_Em2rulesMapper();
        $rules = $edcrm->getAllFromRulesOrderPriority($db);     
        
        if (!empty($rules)) {
            foreach ($rules as $val) {

                $arr_edc_id = $db->fetchCol($db->select()
                                ->from('view2sklik2db', array('ed_id'))
                                ->where(($val->getErIdCampagn() ? $db->quoteInto('ed_id_campaign = ?', $val->getErIdCampagn()) : '1=1'))
                                ->where(($val->getErIdDev() ? $db->quoteInto('view_id_dev = ?', $val->getErIdDev()) : '1=1'))
                                ->where(($val->getErIdTree() ? $db->quoteInto('view_id_tree = ?', $val->getErIdTree()) : '1=1'))
                                ->where(($val->getErParamNameLenghtMin() ? $db->quoteInto('ed_param_name_count >= ?', $val->getErParamNameLenghtMin()) : '1=1'))
                                ->where(($val->getErParamNameLenghtMax() ? $db->quoteInto('ed_param_name_count <= ?', $val->getErParamNameLenghtMax()) : '1=1'))
                                ->where(($val->getErParamNameWordMin() ? $db->quoteInto('ed_param_name_word >= ?', $val->getErParamNameWordMin()) : '1=1'))
                                ->where(($val->getErParamNameWordMax() ? $db->quoteInto('ed_param_name_word <= ?', $val->getErParamNameWordMax()) : '1=1'))
                                ->where(($val->getErParamPriceMin() ? $db->quoteInto('ed_param_price >= ?', $val->getErParamPriceMin()) : '1=1'))
                                ->where(($val->getErParamPriceMax() ? $db->quoteInto('ed_param_price <= ?', $val->getErParamPriceMax()) : '1=1'))
                                ->where(($val->getErParamSell() ? $db->quoteInto('ed_param_sell = ?', $val->getErParamSell()) : '1=1'))
                                ->where(($val->getErParamAction() ? $db->quoteInto('ed_param_action = ?', $val->getErParamAction()) : '1=1'))
                                ->where(($val->getErParamSendNow() ? $db->quoteInto('ed_param_sendnow = ?', $val->getErParamSendNow()) : '1=1'))
                                ->where('edm_alias = ?', 'noset')
                );

                if (count($arr_edc_id) > 0) {
                    $i += $db->update('em2db', array("ed_id_mode" => $val->getErIdSetDbmode()), array($db->quoteInto("ed_id IN (?)", $arr_edc_id)));
                }
            }
        }
        $this->addMessage("Přiřazeno pro zpracování : <b>" . $i . "</b>");
    }

}

?>