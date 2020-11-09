<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_NoticeView extends CI_Model {

    function __construct() {
        parent:: __construct();
        $this->load->database();
    }


    public function head($id) {
        $this->db->limit(1);
        $this->db->where('id_cat_noticia', $id);
        $sec = $this->db->get('cat_noticia');
        $resultado = $sec->result();
        return $resultado;
    }

    public function head_edit($id) {
        $this->db->limit(1);
        $this->db->where('id_edicion', $id);
        $sec = $this->db->get('edicion');
        $resultado = $sec->result();
        return $resultado;
    }

    public function list_notice($f,$l) {
        $Cat_N = $this->uri->segment(4);
        $this->db->query('SET lc_time_names = "es_ES"');
        $query = "SELECT noticias.id_noticia,noticias.id_cat_nivel,
        noticias.id_cat_noticia,
        cat_noticia.nc_noticia,cat_nivel.nc_nivel,noticias.Titular,
        LEFT(noticias.Subtitulo,75) AS Subtitulo,
        upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
        noticias.Nota,
        noticias.Editor,noticias.Reportero,
        (
            select url from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            order by fecha
            limit 1
        ) as url,
        (
            select titulo_foto from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            order by fecha
            limit 1
        ) as foto,
        (
            select fotografo from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            limit 1
        ) as fotografo,
        (
            select convert(fecha,date) from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            order by fecha
            limit 1
        ) as fechafoto,
        (
            select edicion.estado from edicion_noticia 
            inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
            where edicion_noticia.id_noticia = noticias.id_noticia 
            group by id_noticia    limit 1
        ) as estado,
        (
            select edicion.num_edicion from edicion_noticia 
            inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
            where edicion_noticia.id_noticia = noticias.id_noticia 
            group by id_noticia    limit 1
        ) as edicion
        from  noticias
        inner join cat_noticia on cat_noticia.id_cat_noticia=noticias.id_cat_noticia
        inner join cat_nivel on cat_nivel.id_cat_nivel = noticias.id_cat_nivel
            where noticias.id_noticia !=".$f." AND noticias.id_cat_noticia = ".$Cat_N."
            order by noticias.Fecha desc
            limit ".$l;
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;
    }

    function NoticCarrousel() {
            $this->db->query('SET lc_time_names = "es_ES"');
        $query = "SELECT idcarrousel,titulo,foto,url from carrousel where estado= 'Activo' limit 5;";
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;
    }

    function NotPerfiles() {
        $query = "SELECT idperfiles,nombre,cargo,info,url_foto,estado 
                from perfiles where estado = 'Activo'
                order by fecha_crea desc 
                limit 2;";
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;
    }

function AllPerf() {
        $query = "SELECT idperfiles,nombre,cargo,info,url_foto,estado from perfiles where estado = 'Activo';";
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;
    }

    public function pricipal() {
        $this->db->query('SET lc_time_names = "es_ES"');
        $query = "SELECT noticias.id_noticia,noticias.id_cat_nivel,
        noticias.id_cat_noticia,edicion.num_edicion,
        cat_noticia.nc_noticia,cat_nivel.nc_nivel,noticias.Titular,
        noticias.Subtitulo,
        upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
        noticias.Nota,
        noticias.Editor,noticias.Reportero,
        (
            SELECT url from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        ) as url,
        (
            SELECT titulo_foto from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        ) as foto,
        (
            SELECT fotografo from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        ) as fotografo,
        (
            SELECT Fecha from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        ) as fechafoto
    from  noticias
    inner join cat_noticia on cat_noticia.id_cat_noticia=noticias.id_cat_noticia
    inner join edicion_noticia on edicion_noticia.id_noticia = noticias.id_noticia
    inner join  edicion on edicion.id_edicion= edicion_noticia.id_edicion
    inner join cat_nivel on cat_nivel.id_cat_nivel = noticias.id_cat_nivel
    where edicion.estado = 'Activo'
    group by noticias.id_noticia
    order by edicion.id_edicion,noticias.Fecha
    limit 1";
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;
    }

    // public function noti($f) {
    //     $this->db->query('SET lc_time_names = "es_ES"');
    //     $query = "SELECT 
    //     cat_noticia.nc_noticia,
    //     noticias.id_noticia,
    //     noticias.Titular,
    //     noticias.Subtitulo,
    //     upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
    //     LEFT(noticias.Nota,100) as Nota,
    //     fotografia.url,
    //     noticias.Reportero
    //         from  noticias
    //         inner join cat_noticia on noticias.id_cat_noticia = cat_noticia.id_cat_noticia
    //         inner join noticia_foto on noticias.id_noticia = noticia_foto.id_noticia
    //         inner join fotografia on noticia_foto.id_foto = fotografia.id_foto
    //         where noticias.id_cat_noticia =".$f;
    //     $sql = $this->db->query($query);
    //     $resultado = $sql->result();
    //     return $resultado;
    // }

    public function noti($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
        
        $Cat_N = $this->uri->segment(3);
        $this->db->query('SET lc_time_names = "es_ES"');
        $this->db->where('noticias.id_cat_noticia',$Cat_N);
        $this->db->like('noticias.Titular',$buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("noticias.id_noticia,noticias.id_cat_nivel,
                                  noticias.id_cat_noticia,noticias.Titular,LEFT(noticias.Subtitulo,27) AS Subtitulo,
                                  upper(DATE_FORMAT(noticias.Fecha,'%W %d de %M')) as Fecha,noticias.Nota,
                                  noticias.Editor,noticias.Reportero,
                                  (
                                    select url 
                                    from fotografia 
                                    inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto 
                                    where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                                    limit 1
                                ) as url,
                                (
                                    select titulo_foto from fotografia
                                    inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                                    where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                                    limit 1
                                ) as foto,
                                (
                                    select fotografo from fotografia
                                    inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                                    where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                                    limit 1
                                ) as fotografo,
                                (
                                    select fotografo from fotografia
                                    inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                                    where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                                    limit 1
                                ) as fechafoto,
                                (
                                    select edicion.estado from edicion_noticia 
                                    inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
                                    where edicion_noticia.id_noticia = noticias.id_noticia 
                                    group by id_noticia
                                    limit 1
                                ) as estado");
        $this->db->from('noticias');
        $this->db->join('cat_noticia','noticias.id_cat_noticia = cat_noticia.id_cat_noticia');
        $this->db->join('cat_nivel','noticias.id_cat_nivel = cat_nivel.id_cat_nivel');
        $this->db->order_by('noticias.Fecha desc');
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;


        // $this->db->query('SET lc_time_names = "es_ES"');
        // $query = "SELECT noticias.id_noticia,noticias.id_cat_nivel,
        // noticias.id_cat_noticia,
        // cat_noticia.nc_noticia,cat_nivel.nc_nivel,noticias.Titular,
        // LEFT(noticias.Subtitulo,75) AS Subtitulo,
        // upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
        // noticias.Nota,
        // noticias.Editor,noticias.Reportero,
        // (
        //     select url from fotografia
        //     inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //     where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        // ) as url,
        // (
        //     select titulo_foto from fotografia
        //     inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //     where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        // ) as foto,
        // (
        //     select fotografo from fotografia
        //     inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //     where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        // ) as fotografo,
        // (
        //     select fotografo from fotografia
        //     inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //     where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        // ) as fechafoto,
        // (
        //     select edicion.estado from edicion_noticia 
        //     inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
        //     where edicion_noticia.id_noticia = noticias.id_noticia 
        //     group by id_noticia
        // ) as estado
        // from  noticias
        // inner join cat_noticia on cat_noticia.id_cat_noticia=noticias.id_cat_noticia
        // inner join cat_nivel on cat_nivel.id_cat_nivel = noticias.id_cat_nivel
        // where noticias.id_cat_noticia = ".$Cat_N." AND noticias.Titular like '%".$buscar."%' 
        // ";

        // $sql = $this->db->query($query);
        // $resultado = $sql->result();
        // return $resultado;
    }

    // public function noti($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {
    //     $xd = $this->uri->segment(3);


    //     $this->db->query('SET lc_time_names = "es_ES"');
    //     $this->db->like("Titular", $buscar);
    //     $this->db->where("id_cat_noticia", $xd);
    //     if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
    //         $this->db->limit($cantidadregistro, $inicio);
    //     }
    //     $consulta = $this->db->get("n");
    //     return $consulta->result();
    // }

    public function Editions($buscar, $inicio = FALSE, $cantidadregistro = FALSE) {

        $this->db->query('SET lc_time_names = "es_ES"');
        $this->db->where('noticias.id_cat_nivel',1);
        $this->db->like('noticias.Titular',$buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("edicion.id_edicion,edicion.num_edicion,noticias.id_noticia,
                    noticias.Titular,LEFT(noticias.Subtitulo,27) AS Subtitulo,
                    upper(DATE_FORMAT(edicion.fecha_publicacion,'%W %d de %M')) as Fecha,
                    (
                        SELECT url from fotografia
                        inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                        where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                        limit 1
                    ) as url,
                    (
                        SELECT edicion.estado from edicion_noticia 
                        inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
                        where edicion_noticia.id_noticia = noticias.id_noticia 
                        group by id_noticia
                        limit 1
                    ) as estado");
        $this->db->from('edicion');
        $this->db->join('edicion_noticia','edicion_noticia.id_edicion = edicion.id_edicion');
        $this->db->join('noticias','noticias.id_noticia = edicion_noticia.id_noticia');
        $this->db->group_by('edicion.id_edicion');
        $this->db->order_by('edicion.fecha_publicacion','desc');
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;

        // $query = "SELECT edicion.id_edicion,edicion.num_edicion,noticias.id_noticia,
        //             noticias.Titular,LEFT(noticias.Subtitulo,75) AS Subtitulo,
        //             upper(DATE_FORMAT(edicion.fecha_publicacion,'%W %d de %M')) as Fecha,
        //             (
        //                 SELECT url from fotografia
        //                 inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //                 where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        //             ) as url,
        //             (
        //                 SELECT edicion.estado from edicion_noticia 
        //                 inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
        //                 where edicion_noticia.id_noticia = noticias.id_noticia 
        //                 group by id_noticia
        //             ) as estado
        //         from edicion
        //         inner join edicion_noticia on edicion_noticia.id_edicion = edicion.id_edicion
        //         inner join noticias on noticias.id_noticia = edicion_noticia.id_noticia
        //         where noticias.id_cat_nivel = 1 and noticias.Titular like '%$buscar%'
        //         group by edicion.id_edicion
        //         limit $inicio,$cantidadregistro
        //         ";
        // $sql = $this->db->query($query);
        // $resultado = $sql->result();
        // return $resultado;
    }

    public function Notic($f) {
        $this->db->query('SET lc_time_names = "es_ES"');
        $query = "SELECT noticias.id_noticia,noticias.id_cat_nivel,
        noticias.id_cat_noticia,
        cat_noticia.nc_noticia,cat_nivel.nc_nivel,noticias.Titular,
        noticias.Subtitulo,
        upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
        noticias.Nota,
        noticias.Editor,noticias.Reportero,
        (
            select url from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            order by fecha
            limit 1
        ) as url,
        (
            select titulo_foto from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            order by fecha
            limit 1
        ) as foto,
        (
            select fotografo from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        ) as fotografo,
        (
            select convert(fecha,date) from fotografia
            inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
            order by fecha
            limit 1
        ) as fechafoto,
        (
            select count(*) from noticia_foto
            where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 0
            limit 1
        ) as cantidad,
        (
            select edicion.estado from edicion_noticia 
            inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
            where edicion_noticia.id_noticia = noticias.id_noticia 
            group by id_noticia
            limit 1
        ) as estado,
        (
            select edicion.id_edicion from edicion_noticia 
            inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
            where edicion_noticia.id_noticia = noticias.id_noticia 
            group by id_noticia
            limit 1
        ) as id_edicion,
        (
            select edicion.num_edicion from edicion_noticia 
            inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
            where edicion_noticia.id_noticia = noticias.id_noticia 
            group by id_noticia
            limit 1
        ) as edicion
        from  noticias
        inner join cat_noticia on cat_noticia.id_cat_noticia=noticias.id_cat_noticia
        inner join cat_nivel on cat_nivel.id_cat_nivel = noticias.id_cat_nivel
            where noticias.id_noticia = ".$f;
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;
    }

    function Not_edit($buscar, $inicio = FALSE, $cantidadregistro = FALSE){
        $f = $this->uri->segment(3);

        $this->db->query('SET lc_time_names = "es_ES"');
        $this->db->where('edicion.id_edicion',$f);
        $this->db->like('noticias.Titular',$buscar);
        if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
            $this->db->limit($cantidadregistro, $inicio);
        }
        $this->db->select("noticias.id_noticia,
                    edicion.id_edicion,edicion.num_edicion,
                    noticias.Titular,noticias.id_cat_noticia,
                    LEFT(noticias.Subtitulo,27) AS Subtitulo,
                    upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
                    noticias.Nota,
                    noticias.Editor,noticias.Reportero,
                    (
                        select url from fotografia
                        inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                        where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                        limit 1
                    ) as url,
                    (
                        select titulo_foto from fotografia
                        inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                        where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                        limit 1
                    ) as foto,
                    (
                        select fotografo from fotografia
                        inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                        where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                        limit 1
                    ) as fotografo,
                    (
                        select fotografo from fotografia
                        inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                        where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
                        limit 1
                    ) as fechafoto,
                    (
                        select edicion.estado from edicion_noticia 
                        inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
                        where edicion_noticia.id_noticia = noticias.id_noticia 
                        group by id_noticia
                        limit 1
                    ) as estado");
        $this->db->from('noticias');
        $this->db->join('cat_noticia','cat_noticia.id_cat_noticia=noticias.id_cat_noticia');
        $this->db->join('edicion_noticia','edicion_noticia.id_noticia = noticias.id_noticia');
        $this->db->join('edicion','edicion.id_edicion = edicion_noticia.id_edicion');
        $sql = $this->db->get();
        $result = $sql->result();
        return $result;

        // $this->db->query('SET lc_time_names = "es_ES"');
        // $this->db->like("Titular", $buscar);
        // $this->db->where("id_edicion", $f);
        // if ($inicio !== FALSE && $cantidadregistro !== FALSE) {
        //     $this->db->limit($cantidadregistro, $inicio);
        // }
        // $consulta = $this->db->get("e");
        // return $consulta->result();
        // $this->db->query('SET lc_time_names = "es_ES"');
        // $query = "SELECT noticias.id_noticia,
        //             edicion.id_edicion,edicion.num_edicion,
        //             noticias.Titular,
        //             LEFT(noticias.Subtitulo,75) AS Subtitulo,
        //             upper(DATE_FORMAT(noticias.`Fecha`,'%W %d de %M')) as Fecha,
        //             noticias.Nota,
        //             noticias.Editor,noticias.Reportero,
        //             (
        //                 select url from fotografia
        //                 inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //                 where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        //             ) as url,
        //             (
        //                 select titulo_foto from fotografia
        //                 inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //                 where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        //             ) as foto,
        //             (
        //                 select fotografo from fotografia
        //                 inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //                 where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        //             ) as fotografo,
        //             (
        //                 select fotografo from fotografia
        //                 inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
        //                 where noticia_foto.id_noticia = noticias.id_noticia and noticia_foto.principal = 1
        //             ) as fechafoto,
        //             (
        //                 select edicion.estado from edicion_noticia 
        //                 inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
        //                 where edicion_noticia.id_noticia = noticias.id_noticia 
        //                 group by id_noticia
        //             ) as estado
        // from  noticias
        // inner join cat_noticia on cat_noticia.id_cat_noticia=noticias.id_cat_noticia
        // inner join edicion_noticia on edicion_noticia.id_noticia = noticias.id_noticia
        // inner join edicion on edicion.id_edicion = edicion_noticia.id_edicion
        // where edicion.id_edicion = ".$f;
        // $sql = $this->db->query($query);
        // $resultado = $sql->result();
        // return $resultado;   
    }

    public function visor(){
        $xd = $this->uri->segment(3);
        $query = "SELECT noticias.id_noticia,fotografia.titulo_foto,
                        fotografia.Fotografo,
                        fotografia.url,noticia_foto.principal
                    from fotografia
                inner join noticia_foto on noticia_foto.id_foto = fotografia.id_foto
                inner join noticias on noticias.id_noticia = noticia_foto.id_noticia
                where noticias.id_noticia = ".$xd." AND  noticia_foto.principal = 0";
        $sql = $this->db->query($query);
        $resultado = $sql->result();
        return $resultado;   
    }
}