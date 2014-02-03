<?php
require_once("delivery.class.php");

class Avtolux {

    public static function get_price_av($sender_city, $recipient_city, $weight, $long, $width, $height, $price, $beckCheck=false, $beckSum=false) {
        $url = "http://cabinet.autolux.ua/cabinet/api_calculator.php?departure=" . $sender_city . "&arrival=" . $recipient_city;
        $alltext = file_get_contents($url);
        $result_from_site = json_decode($alltext);

        $options = Delivery::get_options_from_db();

        //obj_dump($result_from_site);
        if ($result_from_site->distance == 0) {
            // Обновить города с автолюкса с теми что в БД
            self::check_av_towns_in_db();

            $alltext = file_get_contents($url);
            $result_from_site = json_decode($alltext);

            if ($result_from_site->distance == 0)  {
                $result['date'] = "error";
                $result['cost'] =  "error";
                $result['skidka'] = "error";
                $result['cost_do_dveri'] = "error";

                return $result;
            }
        }

        $bigest_value = ($long * 0.01) * ($width * 0.01) * ($height * 0.01) * $result_from_site->volume;
        if($weight * $result_from_site->weight > $bigest_value) {
            $bigest_value = $weight * $result_from_site->weight;
        }

        $result['dost'] = $bigest_value + $options['av_service']['value'] + $options['av_strahovka']['value'] * $price / 100;

        $result['obr'] = null;
        if ($beckCheck == "true") {
//
//  Изменены тарифы на обратную доставку денег за товар, в связи с этим изменена логика расчета стоимости доставки.
//  19.07.13

//  Backup кода предыдущей логики
//            if ($beckSum < $options['av_min_nalpl_value']['value']) {
//                $result['obr'] = $options['av_min_nalpl_paid']['value'];
//            } else {
//                $result['obr'] = $options['av_min_nalpl_percent']['value'] * $beckSum / 100;
//            }


              $result['obr'] = ceil(($options['av_min_nalpl_percent']['value'] * $beckSum / 100) + 14);
        }

        $result['date'] = "";
        $result['cost'] =  ceil($result['dost']  + $result['obr']);
        $result['skidka'] = "";
        $result['cost_do_dveri'] = "";

        return $result;
    }


    public static function get_av_towns_array($color = false, $only_new = false) {
        // Свойство color может принимать 2 значения blue, red
        if($color != "blue" && $color != "red") {
            $color = false;
        }

        $towns = self::get_av_towns_list($color, $only_new);
        return $towns;
    }

    public static function get_av_towns_list($color = false, $only_new = false) {
        $url = "http://cabinet.autolux.ua/cabinet/api_calculator.php";
        //include('/srv/www/htdocs/kontrabas.loc/www/new_admin/libraries/simplehtmldom_1_5/simple_html_dom.php');
        $alltext=file_get_contents($url);

        //$html = new simple_html_dom();
        // Load a file
        //$html->load('http://cabinet.autolux.ua/cabinet/api_calculator.php');
        //$items = $html->find("opt");
        $alltext = str_replace("<select>", "", $alltext);
        $alltext = str_replace("</select>", "", $alltext);

        $arr_options = null;
        $arr_options = preg_split("/<option value = '/", $alltext);
        $towns = null;

        $exist_towns = null;
        if ($only_new) {
            $exist_towns = self::get_towns_from_db();
        }

        //obj_dump($arr_options);

        foreach($arr_options as $curr_option) {

            if ($curr_option) {
                //preg_match('/(.+)(?=\'[^\']*$)/', $curr_option, $id_town); На всякий случай - регулярное выражение, достает ид-городов
                $tmp_town = null;
                $town_name = preg_split('/(\'>)/', $curr_option);

                if (!$only_new || !$exist_towns[$town_name[0]]) {
                    $town_name[1] = str_replace("</option>", "", $town_name[1]);
                    $tmp_town[$town_name[0]]['full_name'] = $town_name[1];
                    //$towns_info = explode(',', $town_name[1]);
                    $towns_info = preg_split('/\((.+)(\))/', $town_name[1]);

                    // ==========================================
                    //obj_dump($tmp_town);
                    //obj_dump($town_name[1]);
                    //$tii= preg_split('/\((.+)(\))/', $town_name[1]);
                    //obj_dump($tii);
                    // ==========================================

                    // Разбор строки
                    $tmp_town[$town_name[0]]['town_name'] = trim($towns_info[0]);
                    $tmp_town[$town_name[0]]['by_name'] = self::get_town_by_name(trim($towns_info[0]));

                    //$towns[$town_name[0]]['main'] = self::get_smart_output_values($towns[$town_name[0]]);
                    //$towns[$town_name[0]]['by_name'] = self::get_town_by_name($town_name[1]);

                    $tmp_town[$town_name[0]]['count_towns'] = count($tmp_town[$town_name[0]]['by_name']);

                    if ($tmp_town[$town_name[0]]['count_towns'] == 0 ) {
                        // Если нету ни одной области
                        if ($color == "red" || !$color) {
                            $tmp_town[$town_name[0]]['color_class'] = "text_red";
                            $tmp_town[$town_name[0]]['by_name']  = self::get_obl_array($tmp_town[$town_name[0]]['town_name']);
                            $tmp_town[$town_name[0]]['links'] = self::get_links($tmp_town[$town_name[0]]['by_name']);
                            $towns[$town_name[0]] = $tmp_town[$town_name[0]];
                        }
                    } if ($tmp_town[$town_name[0]]['count_towns'] == 1) {
                        // Область только одна
                        if ($color == "blue" || !$color) {
                            $tmp_town[$town_name[0]]['color_class'] = "text_navy";
                            $tmp_town[$town_name[0]]['links'] = self::get_links($tmp_town[$town_name[0]]['by_name']);
                            $towns[$town_name[0]] = $tmp_town[$town_name[0]];
                        }

                    } else {
                        // областей много
                        if ($color == "red" || !$color) {
                            $tmp_town[$town_name[0]]['color_class'] = "text_red";
                            //$tmp_town[$town_name[0]]['by_name']  = self::get_obl_array($tmp_town[$town_name[0]]['town_name']);
                            $tmp_town[$town_name[0]]['links'] = self::get_links($tmp_town[$town_name[0]]['by_name']);
                            $towns[$town_name[0]] = $tmp_town[$town_name[0]];
                        }
                    }
                }
            }
        }

        //obj_dump($towns);
        return $towns;
    }

    public static function get_links($obl_array) {
        $returned_array = null;
        foreach($obl_array as $obl_id=>$obl_info) {
            $returned_array[$obl_info['oname']] = $obl_info['tname'] . ", " . $obl_info['oname'];
        }
        return $returned_array;
    }

    public static function get_obl_array($tname) {
        $all_obl = Delivery::get_obl_array();
        $returned_array = null;
        foreach($all_obl as $obl_id=>$obl_name) {
            $returned_array[$obl_id]['tname'] = $tname;
            $returned_array[$obl_id]['oname'] = $obl_name;
            $returned_array[$obl_id]['obl_id'] = $obl_id;
        }
        return $returned_array;
    }

    public static function get_town_by_name($name) {
        // 1й параметр указывает обласные центры - yes,no,all
        // 2й параметр указывает нужно ли в значения добавлять информацию по таким-же именам с нашей БД
        $town_info = null;
        global $DB; // Перпеменная базы данных
        $name= mysql_real_escape_string ($name); // экранирует специальные символы для безопасного запроса SQL

        $sSql = "
            SELECT twn.id, twn.name tname, obl.name oname, obl.id obl_id
            FROM `v_towns` twn
            JOIN v_obl obl ON twn.obl_id = obl.id
            WHERE twn.`name` LIKE '" . $name ."'
       ";  // Запрос на все города по 3м службам

        //obj_dump($sSql );
        /*
        SELECT tw.id, tw.name, tav.name av_name, tnp.name np_name, tmx.name mx_name
        FROM `v_towns` tw
        LEFT JOIN `v_towns_av` tav ON tw.av_id = tav.av_id
        LEFT JOIN `v_towns_np` tnp ON tw.np_id = tnp.np_id
        LEFT JOIN `v_towns_mx` tmx ON tw.mx_id = tmx.mx_id
        */
        $rs = $DB->Query($sSql);
        while($ar = $rs->Fetch()) {
            $town_info[$ar['id']] = $ar;
            //obj_dump($ar);
        }
        return $town_info;
    }

    public static function get_towns_from_db() {
        $all_cities = null;
        global $DB; // Перпеменная базы данных
        $sSql = "
            SELECT tav.av_id, tav.name av_name, twn.name tname, obl.name oname
            FROM `v_towns` twn
            JOIN v_obl obl ON twn.obl_id = obl.id
            RIGHT JOIN `v_towns_av` tav ON twn.id = tav.town_id
            ORDER BY av_name
            ";

        $rs = $DB->Query($sSql);
        while($ar = $rs->Fetch()) {
            $all_cities[$ar['av_id']] = $ar;
        }
        return $all_cities;
    }

    // Сохранение городов Автолюкса
    public static function smart_save_town_by_obl($assoc_ids) {
        $all_towns = self::get_av_towns_array();
        //obj_dump($all_towns);
        $history = "added:<br />";

        foreach ($assoc_ids as $av_town_id => $k_obl_id) {
            // 1 По области ищем или есть такой город в бд.
            $town_name = $all_towns[$av_town_id]['town_name'];
            //$town_name = preg_split('/(\()/', $town_name); // Разделяем строку по символу  "("
            $town_name = trim($town_name);
            $k_town_id = Delivery::get_town_id_by_name_and_obl($town_name, $k_obl_id);
            // Если нету - создаем и возвращаем ид
            if (!$k_town_id) {
                $k_town_id = Delivery::create_town_id_by_name_and_obl($town_name, $k_obl_id);
                //obj_dump($town_name);
            }
            //присваиваем ид и сохраняем.
            $result = self::input_av($av_town_id , $all_towns[$av_town_id]['full_name'], $k_town_id, false);
            $history .= $result;
        }

        return $history;
    }

    //  Добавление в бд Автолюкса записи с новым городом
    public static function input_av($av_id, $name, $town_id, $is_main = false) {
        global $DB; // Перпеменная базы данных
        $err_mess = null;

        $av_id = mysql_real_escape_string ($av_id);
        $name = mysql_real_escape_string ($name);
        $town_id = mysql_real_escape_string ($town_id);
        $is_main = mysql_real_escape_string ($is_main);

        // ИСПРАВИТЬ - ЗАБРАТЬ  `verfus_db`
        $sSql = "
           REPLACE INTO `v_towns_av` (
                `av_id` ,
                `name` ,
                `town_id` ,
                `is_main`
                )
            VALUES (
                '" . $av_id . "', '" . $name . "', '" . $town_id . "', '" . $is_main . "'
            )
        ";

        $rs = $DB->Query($sSql);
        return $rs->result;
    }

    public static function remote_from_db($town_id) {
        $rstl = null;
        global $DB; // Перпеменная базы данных
        $town_id = mysql_real_escape_string ($town_id);
        $sSql = "
        DELETE FROM `v_towns_av` WHERE `v_towns_av`.`av_id` = '" . $town_id . "'
      ";

        $rs = $DB->Query($sSql);
        while($ar = $rs->Fetch()) {
            $rstl[$ar['id']] = $ar['name'];
            //obj_dump($ar);
        }
        //obj_dump("end");
        return $rstl;
    }

    public static function get_town_by_site_town_id($curr_town) {
        global $DB; // Перпеменная базы данных
        $town_output = null;
        $curr_town = mysql_real_escape_string ($curr_town);

        $sSql = "
            SELECT `av_id`, `name`
            FROM `v_towns_av`
            WHERE town_id = '" . $curr_town . "'
         ";

        $rs = $DB->Query($sSql);

        return $rs->Fetch();
    }

    public static function check_av_towns_in_db() {
        global $DB; // Перпеменная базы данных
        // Получаем все города с Автолюкса, в массив
        $allready_exists_towns = false;
        while (!$allready_exists_towns) {
            $allready_exists_towns = implode(",",array_keys(self::get_av_towns_array()));
        }


        if ($allready_exists_towns) {
            // города, которых нет в списке ставим с признаком "нет"
            $sSql = "
            UPDATE `v_towns_av`
            SET `is_main` = '-1'
            WHERE `av_id` NOT IN (" . $allready_exists_towns . ")
         ";

            // Города, которые есть ставим с признаком "есть"
            $sSql = "
            UPDATE `v_towns_av`
            SET `is_main` = '0'
            WHERE `av_id` IN (" . $allready_exists_towns . ") AND `is_main` < '0'
         ";

            $rs = $DB->Query($sSql);
            return $rs->result;
        }

    }

    /*                                                                                                                                                                                       ============   delete this   ============
    public static function get_smart_output_values($av_town) {
        obj_dump($av_town);

        [color_class] => text_green
                    [selected_id] => 1
                    [obl_ids] => Array
            (
                            [1] => АР Крым(Алушта)[БД,РД-Симферополь]
                        )

                    [links] => Array
            (
                            [АР Крым] => Алушта, АР Крым
                        )

        $output_value = null; // Уже добавленные в конечный список ид
        $select_random_obl_id = null;
        //unset($np_town['info']['by_name'][2188]); - test
        $output_value['color_class'] = "";
        $exist_obl = false;


        foreach($av_town['by_name'] as $curr_town_info) {
            $where_is_string = "";
            // Совпадение по Имени области

            // Совпадение области по родителю
            if (isset($np_town['info']['by_parrent'][$curr_town_info['obl_id']])) {
                $where_is_string .= ",РД-" . $np_town['info']['by_parrent'][$curr_town_info['obl_id']]['parent_tname'] . "";
                if (!$output_value['selected_id']) {
                    $output_value['selected_id'] = $curr_town_info['obl_id'];
                    $output_value['color_class'] = "text_green";
                }
                unset($np_town['info']['by_parrent'][$curr_town_info['obl_id']]);
            }
            // Первая область из списка городов в БД
            if (!$select_random_obl_id) {
                $select_random_obl_id = $curr_town_info['obl_id'];
            }

            $output_value['obl_ids'][$curr_town_info['obl_id']] = $curr_town_info['oname']  . "(" . $curr_town_info['tname'] . ")[БД" . $where_is_string . "]";
            $google_url = self::make_google_url($np_town['nameRu'], $curr_town_info['oname']);
            $output_value['links'][$curr_town_info['oname'] . $google_url['find_in_google_maps']] = $google_url['url'];
        }


        return $output_value;
    }
    */
}
?>