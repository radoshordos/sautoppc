<?php

class Model_Paginator {

    private $_pager;

    public function __construct(Zend_Paginator $pager) {
        $this->_pager = $pager;
    }

    public function getPageLinks($itemsPerPage = NULL) {

        $pages = $this->_pager->getPages('Sliding');
        $this->_pageLinks[] = Model_Simple::getLink($pages->first, $itemsPerPage, '«');

        if (!empty($pages->previous)) {
            $this->_pageLinks[] = Model_Simple::getLink($pages->previous, $itemsPerPage, '‹');
        }

        foreach ($pages->pagesInRange as $x) {
            if ($x == $pages->current) {
                $this->_pageLinks[] = "<strong>" . $x . "</strong>";
            } else {
                $this->_pageLinks[] = Model_Simple::getLink($x, $itemsPerPage, $x);
            }
        }

        if (!empty($pages->next)) {
            $this->_pageLinks[] = Model_Simple::getLink($pages->next, $itemsPerPage, '›');
        }

        $this->_pageLinks[] = Model_Simple::getLink($pages->last, $itemsPerPage, '»');
        return $this->_pageLinks;
    }

}

?>