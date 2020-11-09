<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_visitas extends CI_Model {

    function visitas()
    {
         if (!isset($_COOKIE['counte'])) 
        {
  
            $dtz = new DateTimeZone("America/El_Salvador"); 
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d"); 
            $dtz2 = new DateTimeZone("America/El_Salvador"); 
            $currentv2 = new DateTime('NOW', $dtz2);
            $currentv2 = $currentv2->format("H:i"); 
            $user_agent = $_SERVER['HTTP_USER_AGENT'];
            $user_agentn = $_SERVER['HTTP_USER_AGENT'];
            $user_agentm = $_SERVER['HTTP_USER_AGENT'];
            function base_os($user_agent) {
                    $plataformas = array(
                        'Windows 10'        => 'Windows NT 10.0+',
                        'Windows 8.1'       => 'Windows NT 6.3+',
                        'Windows 8'         => 'Windows NT 6.2+',
                        'Windows 7'         => 'Windows NT 6.1+',
                        'Windows Vista'     => 'Windows NT 6.0+',
                        'Windows XP'        => 'Windows NT 5.1+',
                        'Windows 2003'      => 'Windows NT 5.2+',
                        'Windows'           => 'Windows otros',
                        'iPhone'            => 'iPhone',
                        'iPad'              => 'iPad',
                        'Mac OS X'          => '(Mac OS X+)|(CFNetwork+)',
                        'Mac otros'         => 'Macintosh',
                        'Android'           => 'Android',
                        'BlackBerry'        => 'BlackBerry',
                        'Linux'             => 'Linux'
                    );
                    foreach ($plataformas as $plataforma => $pattern) {
                        if (preg_match('/'.$pattern.'/i', $user_agent))
                            return $plataforma;
                    }
                    return 'Otras';
                }
                function nav($user_agentn) {
                    $nav = array(
                    'Flock'                 => 'Flock',
                    'Chrome'                => 'Chrome',
                    'Opera'                 => 'Opera',
                    'MSIE'                  => 'Internet Explorer',
                    'Internet Explorer'     => 'Internet Explorer',
                    'Shiira'                => 'Shiira',
                    'Firefox'               => 'Firefox',
                    'Chimera'               => 'Chimera',
                    'Phoenix'               => 'Phoenix',
                    'Firebird'              => 'Firebird',
                    'Camino'                => 'Camino',
                    'Netscape'              => 'Netscape',
                    'OmniWeb'               => 'OmniWeb',
                    'Safari'                => 'Safari',
                    'Mozilla'               => 'Mozilla',
                    'Konqueror'             => 'Konqueror',
                    'icab'                  => 'iCab',
                    'Lynx'                  => 'Lynx',
                    'Links'                 => 'Links',
                    'hotjava'               => 'HotJava',
                    'amaya'                 => 'Amaya',
                    'IBrowse'               => 'IBrowse'
                    );
                    foreach ($nav as $nav => $pattern) {
                        if (preg_match('/'.$pattern.'/i', $user_agentn))
                            return $nav;
                    }
                    return 'Otras';
                }
                function mobile($user_agentm) {
                    $mobile = array(
                    'mobileexplorer'        => 'Mobile Explorer',
                    'openwave'              => 'Open Wave',
                    'opera mini'            => 'Opera Mini',
                    'operamini'             => 'Opera Mini',
                    'elaine'                => 'Palm',
                    'palmsource'            => 'Palm',
                    'digital paths'         => 'Palm',
                    'avantgo'               => 'Avantgo',
                    'xiino'                 => 'Xiino',
                    'palmscape'             => 'Palmscape',
                    'nokia'                 => 'Nokia',
                    'ericsson'              => 'Ericsson',
                    'blackberry'            => 'BlackBerry',
                    'motorola'              => 'Motorola',
                    'nokia'                 => "Nokia",
                    'palm'                  => "Palm",
                    'iphone'                => "Apple iPhone",
                    'ipad'                  => "iPad",
                    'ipod'                  => "Apple iPod Touch",
                    'sony'                  => "Sony Ericsson",
                    'ericsson'              => "Sony Ericsson",
                    'blackberry'            => "BlackBerry",
                    'cocoon'                => "O2 Cocoon",
                    'blazer'                => "Treo",
                    'lg'                    => "LG",
                    'amoi'                  => "Amoi",
                    'xda'                   => "XDA",
                    'mda'                   => "MDA",
                    'vario'                 => "Vario",
                    'htc'                   => "HTC",
                    'samsung'               => "Samsung",
                    'sharp'                 => "Sharp",
                    'sie-'                  => "Siemens",
                    'alcatel'               => "Alcatel",
                    'benq'                  => "BenQ",
                    'ipaq'                  => "HP iPaq",
                    'mot-'                  => "Motorola",
                    'playstation portable'  => "PlayStation Portable",
                    'hiptop'                => "Danger Hiptop",
                    'nec-'                  => "NEC",
                    'panasonic'             => "Panasonic",
                    'philips'               => "Philips",
                    'sagem'                 => "Sagem",
                    'sanyo'                 => "Sanyo",
                    'spv'                   => "SPV",
                    'zte'                   => "ZTE",
                    'sendo'                 => "Sendo",
                    'symbian'               => "Symbian",
                    'SymbianOS'             => "SymbianOS",
                    'elaine'                => "Palm",
                    'palm'                  => "Palm",
                    'series60'              => "Symbian S60",
                    'windows ce'            => "Windows CE",
                    'obigo'                 => "Obigo",
                    'netfront'              => "Netfront Browser",
                    'openwave'              => "Openwave Browser",
                    'mobilexplorer'         => "Mobile Explorer",
                    'operamini'             => "Opera Mini",
                    'opera mini'            => "Opera Mini",
                    'digital paths'         => "Digital Paths",
                    'avantgo'               => "AvantGo",
                    'xiino'                 => "Xiino",
                    'novarra'               => "Novarra Transcoder",
                    'vodafone'              => "Vodafone",
                    'docomo'                => "NTT DoCoMo",
                    'o2'                    => "O2",
                    'mobile'                => "Generic Mobile",
                    'wireless'              => "Generic Mobile",
                    'j2me'                  => "Generic Mobile",
                    'midp'                  => "Generic Mobile",
                    'cldc'                  => "Generic Mobile",
                    'up.link'               => "Generic Mobile",
                    'up.browser'            => "Generic Mobile",
                    'smartphone'            => "Generic Mobile",
                    'cellphone'             => "Generic Mobile"
                    );
                    foreach ($mobile as $mobile => $pattern) {
                        if (preg_match('/'.$pattern.'/i', $user_agentm))
                            return $mobile;
                    }
                    return 'Otras';
                }
                $SOS = base_os($user_agent);
                $nav = nav($user_agentn);
                $mob = mobile($user_agentm);

            $this->fecha = $currentv;
            $this->hora  = $currentv2;
            $this->host   = gethostbyaddr($_SERVER['REMOTE_ADDR']); 
            $this->ip  = ip2long($_SERVER['REMOTE_ADDR']); 
            $this->os  = $SOS;
            $this->navegador  = $nav;
            $this->movil  = $mob;
            $this->db->insert('visitas', $this); 
        }
        setcookie('counte', 1, time()+3700);
    }

    public function vistas_view(){
        $dtz = new DateTimeZone("America/El_Salvador"); 
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d");
        $consulta = 'SELECT count(*) as visitas FROM visitas where fecha ="'.$currentv.'"';  
        $sql = $this->db->query($consulta) ;
        $res      = $sql->row();  
        return $res;
    }




    public function estadistica_navegador() {
        $dtz = new DateTimeZone("America/El_Salvador"); 
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d");
        $query = "SELECT navegador, count(navegador) as total  from visitas where fecha = '".$currentv."'  group by navegador  order by total desc";
        $sql = $this->db->query($query);
        $navegador = $sql->result();
        return $navegador;
    }
    public function estadistica_os() {
        $dtz = new DateTimeZone("America/El_Salvador"); 
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d");
        $query = "SELECT os, count(os) as total from visitas where fecha = '".$currentv."' group by os order by total desc";
        $sql = $this->db->query($query);
        $os = $sql->result();
        return $os;
    }
    public function estadistica_movil() {
        $dtz = new DateTimeZone("America/El_Salvador"); 
            $currentv = new DateTime('NOW', $dtz);
            $currentv = $currentv->format("Y-m-d");
        $query = "SELECT movil, count(movil) as total from visitas where fecha = '".$currentv."' group by movil order by total desc";
        $sql = $this->db->query($query);
        $movil = $sql->result();
        return $movil;
    }

   public function estadistica_nav_fecha($fecha) {
    $query=$this->db->query('SET lc_time_names = "es_ES"');
    $query = "SELECT DATE_FORMAT(`fecha`,'%W %d de %M') as fecha,navegador, count(navegador) as total  from visitas where fecha = '".$fecha."' group by fecha,navegador order by fecha desc;";
        $sql = $this->db->query($query);
        $movil_fecha = $sql->result();
        return $movil_fecha;
    }
}