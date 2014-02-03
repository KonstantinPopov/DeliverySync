<?php
  class Delivery {
        public static function get_all_towns($page = "1") {
            $all_cities = null;
            global $DB; // Перпеменная базы данных
            $sSql = "
                SELECT twn.id, twn.name tname, obl.name oname, tnp.name np_name
                FROM `v_towns` twn
                JOIN v_obl obl ON twn.obl_id = obl.id
                LEFT JOIN `v_towns_np` tnp ON twn.id = tnp.town_id
            ";  // Запрос на все города по 3м службам
            //obj_dump($sSql );
            /*
            SELECT tw.id, tw.name, tav.name av_name, tnp.name np_name, tmx.name mx_name
            FROM `v_towns` tw
            LEFT JOIN `v_towns_av` tav ON tw.av_id = tav.av_id
            LEFT JOIN `v_towns_np` tnp ON tw.np_id = tnp.np_id
            LEFT JOIN `v_towns_mx` tmx ON tw.mx_id = tmx.mx_id
            */
            $rs = $DB->Query($sSql);  // ????????? ??????
            while($ar = $rs->Fetch()) {
                $all_cities[$ar['id']] = $ar;
                //obj_dump($ar);
            }
            //obj_dump("end");
            return $all_cities;
        }


    public static function get_all_towns_count($page = "1") {
        $all_towns_count = null;
        $err_mess = null;
        global $DB; // Перпеменная базы данных
        $sSql = "
            SELECT COUNT(twn.id) all_towns, COUNT(tnp.name) all_towns_np
            FROM `v_towns` twn
            JOIN v_obl obl ON twn.obl_id = obl.id
            LEFT JOIN `v_towns_np` tnp ON twn.id = tnp.town_id
        ";  // Запрос на все города по 3м службам
        //obj_dump($sSql );
        $rs = $DB->Query($sSql);
        while($ar = $rs->Fetch()) {
            $all_towns_count = $ar;
            //obj_dump($ar);
        }
        //obj_dump("end");
        return $all_towns_count;
      }

      // Возвращает массив областей (!!!! ИЗМЕНЕН  NAME  -> ОNAME !!!!!!!)
      public static function get_obl_array() {
          $all_obl = null;
          global $DB; // Перпеменная базы данных
          $sSql = "
          SELECT id, name
          FROM `v_obl`
         ";

          $rs = $DB->Query($sSql);
          while($ar = $rs->Fetch()) {
              $all_obl[$ar['id']] = $ar['name'];
              //obj_dump($ar);
          }
          //obj_dump("end");
          return $all_obl;
      }

      // Возвращает строку областей
      public static function get_obl_string($frst = ',', $second = ';') {
          $all_obl = "";
          global $DB; // Перпеменная базы данных
          $sSql = "
          SELECT id, name
          FROM `v_obl`
         ";

          $rs = $DB->Query($sSql);
          while($ar = $rs->Fetch()) {
              $all_obl .= $ar['id'] . $frst . $ar['name'] . $second;
              //obj_dump($ar);
          }
          $all_obl = substr($all_obl, 0, strlen($all_obl)-1);
          //obj_dump($all_obl);
          return $all_obl;
      }

      //  Функция возвращает похожие города по названию
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

      public static function get_all_towns_string($frst = ',') {
        $obl_string = "";
        global $DB; // Перпеменная базы данных
        $sSql = "
            SELECT twn.id, twn.name tname, obl.name oname, obl.id obl_id
            FROM `v_towns` twn
            JOIN v_obl obl ON twn.obl_id = obl.id
        ";  // Запрос на все города по 3м службам

        $rs = $DB->Query($sSql);
        while($ar = $rs->Fetch()) {
            $obl_string .= "\"" .  $ar['tname'] . "(" . $ar['oname'] . ")"  . "[NP+,AV-,MX+]" . "\"" . $frst;
            //$obl_string .= "\"" .  $ar['tname'] . "\"" . $frst;
        }
        $obl_string = substr($obl_string, 0, strlen($obl_string)-1);

        //obj_dump($obl_string);
        return $obl_string;
      }

      public static function google_town_parser($url) {
          $alltext =file_get_contents($url);
          //obj_dump($alltext);
          preg_match('|pp-headline-item(.*)<\/span>|Uis', $alltext, $out);
          //obj_dump($out[0]);
          preg_match('|<span>(.*)<\/span>|Uis', $out[0], $out);
          //obj_dump($out);
          return $out[1];
      }

      public static function get_obl_like($local_obl, $lang_db = 'ru') {
          global $DB; // Перпеменная базы данных
          $obl_info = null;
          $noresult = true; // Нету результата - пока эта переменная true цыкл продолжается
          $local_obl = mysql_real_escape_string ($local_obl); // экранирует специальные символы для безопасного запроса SQL
          switch($lang_db) {
              case 'ru':
                  $table_name = "v_obl";
                  break;

              case 'ua':
                  //obj_dump('work_ua');
                  $table_name = "v_obl_ua";
                  //obj_dump('work_ua');
                  break;

              default:

                  return 'Нету такой таблицы в БД';
          }

          while (strlen($local_obl) >= 3 && $noresult) {
              //obj_dump($local_obl);
              $sSql = "
                SELECT obl.name oname, obl.id obl_id
                FROM " . $table_name . " obl
                WHERE obl.`name` LIKE '" . $local_obl ."%'
              ";  // Запрос на все города по 3м службам

              //obj_dump($sSql );
              $rs = $DB->Query($sSql);
              while($ar = $rs->Fetch()) {
                  $obl_info[$ar['obl_id']] = $ar;
                  //obj_dump($ar);
                  $noresult = false;
              }

              $local_obl = substr($local_obl,0,strlen($local_obl) - 1);
          }
          return $obl_info;
      }

      public static function get_town_id_by_name_and_obl($town_name, $obl_id) {
          global $DB; // Перпеменная базы данных
          $name = mysql_real_escape_string ($town_name); // экранирует специальные символы для безопасного запроса SQL
          //obj_dump($name);
          //obj_dump($obl_id);
          $sSql = "
            SELECT twn.id, twn.name tname, obl.name oname, obl.id obl_id
            FROM `v_towns` twn
            JOIN v_obl obl ON twn.obl_id = obl.id
            WHERE twn.`name` LIKE '" . $name ."'
            AND obl.id = '" . $obl_id ."'
       ";  // Запрос на все города по 3м службам

          $rs = $DB->Query($sSql);
          $ar = $rs->Fetch();
          //obj_dump($ar);
          return $ar['id'];
      }

      public static function create_town_id_by_name_and_obl($town_name, $obl_id) {
          global $DB; // Перпеменная базы данных
          $town_name = mysql_real_escape_string ($town_name); // экранирует специальные символы для безопасного запроса SQL
          $obl_id = mysql_real_escape_string ($obl_id); // экранирует специальные символы для безопасного запроса SQL

          $sSql = "
          INSERT
          INTO `v_towns` (`id`, `name`, `obl_id`, `tmp`)
          VALUES (NULL, '" . $town_name . "', '" . $obl_id . "', NULL);
        ";

          $DB->Query($sSql);
          return $DB->LastID();
      }

      public static function get_towns_adn_exists($like_town_name) {
          //obj_dump($like_town_name);
          global $DB; // Перпеменная базы данных
          $towns_info = null;
          $like_town_name = mysql_real_escape_string ($like_town_name); // экранирует специальные символы для безопасного запроса SQL

          $sSql = "
            SELECT twn.id t_id, twn.name tname, obl.name oname, tnp.town_id np_id, tav.town_id av_id, tmx.town_id mx_id
            FROM `v_towns` twn
                JOIN v_obl obl ON twn.obl_id = obl.id
                LEFT JOIN `v_towns_np` tnp ON twn.id = tnp.town_id
                LEFT JOIN `v_towns_av` tav ON twn.id = tav.town_id
                          AND tav.is_main >= 0
                LEFT JOIN `v_towns_mx` tmx ON twn.id = tmx.town_id
            WHERE twn.`name` LIKE '" . $like_town_name ."%'
       ";  // Запрос на все города по 3м службам

          $rs = $DB->Query($sSql);
          while($ar = $rs->Fetch()) {
              $towns_info[$ar['t_id']] = $ar;
              //obj_dump($ar);
          }
          return $towns_info;
      }

      public static function get_options_from_db() {
          $options_info = null;
          global $DB; // Перпеменная базы данных

          $sSql = "
            SELECT *
            FROM `v_options`
          ";

          $rs = $DB->Query($sSql);
          while($ar = $rs->Fetch()) {
              $options_info[$ar['name']] = $ar;
          }
          return $options_info;
      }

      public static function set_options_to_db($options_array) {
          $options_info = null;
          global $DB; // Перпеменная базы данных
          $count_all = 0;
          foreach($options_array as $option_name=>$option_value) {
              $filtred_name = mysql_real_escape_string ($option_name); // экранирует специальные символы для безопасного запроса SQL
              $filtred_value = mysql_real_escape_string ($option_value); // экранирует специальные символы для безопасного запроса SQL
              $sSql = "UPDATE `v_options` SET `value` = '" . $filtred_value ."' WHERE `v_options`.`name` = '" . $filtred_name ."'";
              $DB->Query($sSql);
              $count_all++;
          }

          // returns input valuesd
          return $count_all;
      }

      public static function save_weight($product_id, $product_weight) {
          return self::save_property($product_id, "Product_Weight", $product_weight);
      }

      public static function save_property($ELEMENT_ID, $PROPERTY_CODE, $PROPERTY_VALUE) {
          CModule::IncludeModule("catalog");
          // Установим новое значение для данного свойства данного элемента
          $dbr = CIBlockElement::GetList(array(), array("=ID"=>$ELEMENT_ID), false, false, array("ID", "IBLOCK_ID"));
          if ($dbr_arr = $dbr->Fetch()) {
              $IBLOCK_ID = $dbr_arr["IBLOCK_ID"];
              CIBlockElement::SetPropertyValues($ELEMENT_ID, $IBLOCK_ID, $PROPERTY_VALUE, $PROPERTY_CODE);
              // Проверка или заполнилось значение

              $res = CIBlockElement::GetProperty($IBLOCK_ID, $ELEMENT_ID, "sort", "asc", array("CODE" => "$PROPERTY_CODE"));
              $ob = $res->GetNext();
              //obj_dump($ob["VALUE"]);
              if ($ob["VALUE"] == $PROPERTY_VALUE) {
                  return true;
              } else {
                  return false;
              }
          }
          return false;
          //Проверяем или свойство было установлено
      }

      public static function save_geom($product_id, $long, $width, $height) {
          $is_saved = "";

          if (self::save_property($product_id, "Product_Long", $long)) {
              if (self::save_property($product_id, "Product_Width", $width)) {
                  return self::save_property($product_id, "Product_Height", $height);
              }
          }

          return false;
      }

      public static function get_vWeight($long, $width, $height) {
          return $long * $width * $height / 4000;
      }

      public static function get_max_weight($long, $width, $height, $weight) {
          $vWeight = self::get_vWeight($long, $width, $height);
          $big_weight = $weight > $vWeight ? $weight : $vWeight;
          return $big_weight;
      }

  }
?>