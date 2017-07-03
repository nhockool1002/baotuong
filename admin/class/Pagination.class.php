<?php
  class Pagination extends Db{
    protected $_config = array(
      'current_page' => 1, //Trang hiện tại
      'total_record' => 1, //Tổng số sản phẩm
      'total_page' => 1, //Tổng số Trang
      'limit' => 9, //Số sản phẩm mỗi Trang
      'from' => 0, //Bước nhảy
      'link_full' => '', // Hiển thị đầy đủ
      'link_first' => '', //Trang đầu tiên
    );

    function init($config = array()){
      foreach ($config as $key => $value) {
        if(isset($this->_config[$key])){
          $this->_config[$key] = $value;
        }
      }

      if($this->_config['limit'] < 0){
        $this->_config['limit'] = 0 ;
      }

      $this->_config['total_page'] = ceil($this->_config['total_record']/$this->_config['limit']);

      if(!$this->_config['total_page']){
        $this->_config['total_page'] = 1;
      }

      if ($this->_config['current_page'] < 1){
            $this->_config['current_page'] = 1;
        }

        if ($this->_config['current_page'] > $this->_config['total_page']){
            $this->_config['current_page'] = $this->_config['total_page'];
        }

        $this->_config['from'] = ($this->_config['current_page'] - 1) * $this->_config['limit'];
    }
    private function __link($tab)
    {

        if ($tab <= 1 && $this->_config['link_first']){
            return $this->_config['link_first'];
        }

        return str_replace('{tab}', $tab, $this->_config['link_full']);
    }

    function html()
    {
        $p = "";

        // Kiểm tra tổng số trang lớn hơn 1 mới phân trang
        if ($this->_config['total_record'] > $this->_config['limit'])
        {
            $p = "<div class='row'>
              <div class='col-sm-12 text-sm-center'>
                <nav aria-label=Pagination>
                  <ul class='pagination'>";

            // Nút prev và first
            if ($this->_config['current_page'] > 1)
            {
                $p .= '<li class="page-item"><a class="page-link" href="'.$this->__link('1').'">First</a></li>';
                $p .= '<li class="page-item"><a class="page-link" href="'.$this->__link($this->_config['current_page']-1).'">Prev</a></li>';
            }
            //
            // lặp trong khoảng cách giữa min và max để hiển thị các nút
            for ($i = 1; $i <= $this->_config['total_page']; $i++)
            {
              if ($this->_config['current_page'] == $i){
                  $p .= '<li class="page-item active"><a class="page-link" href="'.$this->__link($i).'">'.$i.'</a></li>';
                }
              else{
                    $p .= '<li class="page-item"><a class="page-link" href="'.$this->__link($i).'">'.$i.'</a></li>';
                  }
            }

            // Nút last và next
            if ($this->_config['current_page'] < $this->_config['total_page'])
            {
                $p .= '<li class="page-item"><a class="page-link" href="'.$this->__link($this->_config['current_page'] + 1).'">Next</a></li>';
                $p .= '<li class="page-item"><a class="page-link" href="'.$this->__link($this->_config['total_page']).'">Last</a></li>';
            }

            $p .= '</ul></nav>
        </div>
      </div>';
        }
        return $p;
    }
  }
?>
