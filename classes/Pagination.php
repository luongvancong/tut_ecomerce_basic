<?php

class Pagination {

    protected $total;

    protected $perPage;

    protected $link;

    protected $page;

    public function __construct($total, $perPage, $currentPage = 1, $link = null)
    {
        $this->total       = $total;
        $this->perPage     = $perPage;
        $this->currentPage = $currentPage;
        $this->link        = $link;
        $this->page        = ceil($this->getTotal() / $this->getPerPage());
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setPerPage($perPage)
    {
        $this->perPage = $perPage;
    }

    public function getPerPage()
    {
        return $this->perPage;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getPage()
    {
        return $this->page;
    }


    public function links()
    {
        $page = $this->getPage();

        $maxPage = $page >= 10 ? 10 : $page;
        $side = ceil($maxPage / 2);

        // Loop start
        $start = 1;
        if($this->getCurrentPage() >= $side) {
            $start = $this->getCurrentPage() - $side;
            if($start <= 0 ) $start = 1;
        }

        // Loop end
        $end = $maxPage + $start;
        if($end >= $page) $end = $page;

        $links = '<ul class="pagination">';

        // Prev page
        if($this->hasPrevPage()) {
            $links .= '<li><a href="'. $this->getPrevPageUrl() .'">Prev Page</a></li>';
        }

        for($i = $start; $i <= $end; $i ++) {
            $activeClass = '';
            if($i == $this->getCurrentPage()) {
                $activeClass = 'class="active"';
            }

            $permalink = $this->getLink() . '?' . http_build_query(array_merge($_GET, ['page' => $i]));

            if($activeClass) {
                $links .= '<li '. $activeClass .'><a href="javascript:;">'. $i .'</a></li>';
            } else {
                $links .= '<li><a href="'. $permalink .'">'. $i .'</a></li>';
            }
        }

        // Next page
        if($this->hasNextPage()) {
            $links .= '<li><a href="'. $this->getNextPageUrl() .'">Next Page</a></li>';
        }

        $links .= '</ul>';

        return $links;
    }


    public function hasNextPage()
    {
        return $this->getCurrentPage() < $this->getPage() ? true : false;
    }


    public function hasPrevPage()
    {
        return $this->getCurrentPage() > 1 ? true : false;
    }


    public function getPrevPage()
    {
        return $this->hasPrevPage() ? $this->getCurrentPage() - 1 : $this->currentPage();
    }

    public function getNextPage()
    {
        return $this->hasNextPage() ? $this->getCurrentPage() + 1 : $this->getPage();
    }


    public function getPrevPageUrl()
    {
        $permalink = $this->getLink() . '?' . http_build_query(array_merge($_GET, ['page' => $this->getPrevPage()]));
        return $permalink;
    }


    public function getNextPageUrl()
    {
        $permalink = $this->getLink() . '?' . http_build_query(array_merge($_GET, ['page' => $this->getNextPage()]));
        return $permalink;
    }


}