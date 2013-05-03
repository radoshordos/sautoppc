<?php

class Sklik_Model_Map_Em2ad2target {

    protected $_eat_id;
    protected $_eat_id_dev;
    protected $_eat_id_tree;
    protected $_eat_index;

    public function getEatId() {
        return $this->_eat_id;
    }

    public function setEatId($eat_id) {
        ($eat_id ? $this->_eat_id = (int) $eat_id : NULL);
        return $this;
    }

    public function getEatIdDev() {
        return $this->_eat_id_dev;
    }

    public function setEatIdDev($eat_id_dev) {
        ($eat_id_dev ? $this->_eat_id_dev = (int) $eat_id_dev : NULL);
        return $this;
    }

    public function getEatIdTree() {
        return $this->_eat_id_tree;
    }

    public function setEatIdTree($eat_id_tree) {
        ($eat_id_tree ? $this->_eat_id_tree = (int) $eat_id_tree : NULL);
        return $this;
    }

    public function getEatIndex() {
        return $this->_eat_index;
    }

    public function setEatIndex($eat_index) {
        ($eat_index ? $this->_eat_index = (int) $eat_index : NULL);
        return $this;
    }

}

?>