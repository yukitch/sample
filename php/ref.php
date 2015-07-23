<?php
class Beam {
    private $h_now = 0;
    private $w_now = 0;
    private $dir   = '→';
    private $line  = [];
    private $count = 0;
    
    public function __construct()
    {
        $s = trim(fgets(STDIN));
        list($h, $w) = explode(' ', $s);
        
        $this->h = $h;
        $this->w = $w;
        
        for($i = 0; $i < $h; $i++) {
            $this->line[$i] = trim(fgets(STDIN));
        }
    }
    
    //1マス進む
    public function go() 
    {
        switch($this->dir) {
            case '→':
                $this->w_now++;
                break;
            case '↑':
                $this->h_now--;
                break;
            case '↓':
                $this->h_now++;
                break;
            case '←':
                $this->w_now--;
                break;
        }
    }
    
    //反射イベント
    public function ref()
    {
        $h   = $this->h_now;
		$w   = $this->w_now;

		if(empty($this->line[$h])) return;
		elseif(empty($this->line[$h][$w])) return;
        $now = $this->line[$h][$w];
     
        if($now == '/') {
            switch($this->dir) {
            case '→':
                $this->dir = '↑';
                break;
            case '↑':
                $this->dir = '→';
                break;
            case '↓':
                $this->dir = '←';
                break;
            case '←':
                $this->dir = '↓';
                break;
       }
        } 
        elseif($now == '\\') {
            switch($this->dir) {
            case '→':
                $this->dir = '↓';
                break;
            case '↑':
                $this->dir = '←';
                break;
            case '↓':
                $this->dir = '→';
                break;
            case '←':
                $this->dir = '↑';
                break;
        }
       }
    }
    
    //外に出たかチェック
    public function check()
    {
		var_dump($this->count);
		var_dump('ライン'.$this->h_now.' '.$this->w_now);
        //高さ
        if($this->h_now < 0 || $this->h_now >= $this->h) {
            return false;
        }
        //幅
        elseif($this->w_now <  0 || $this->w_now >= $this->w) {
            return false;
        }
        
        return true;
    }
    
    
    public function countUp() 
    {
        $this->count++;
    }
    
    public function getCount()
    {
        return $this->count;
    }
}


//実行

$beam = new Beam;

for(;;) {
    $beam->countUp();
    $beam->ref();
    $beam->go();
    
    if(!$beam->check()) {
        break;   
    }
}

echo $beam->getCount()."\n";



