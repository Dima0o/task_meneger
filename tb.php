<?php
/**
 * Created by PhpStorm.
 * User: Дмитрий
 * Date: 06.08.2016
 * Time: 22:58
 */


$array = array ('фигня' , 'ботва' , 'ерунда') ; //Массив для примера
print_r ($array) ;
$value_to_delete = 'фигня' ; //Элемент с этим значением нужно удалить
$array = array_flip($array); //Меняем местами ключи и значения
unset ($array[$value_to_delete]) ; //Удаляем элемент массива
$array = array_flip($array); //Меняем местами ключи и значения

print_r ($array) ; //Распечатываем массив


?>
<!-- <select class="form-control" onchange="window.location.href=this.options[this.selectedIndex].value">
                                    <option VALUE="#">Новое cообщение</option>
                                    <?php
//залупа строим список конциренций в которых есть авторизованный а потом  берем и делаем вещи
#дописать условие
/* $roster_sql = mysql_query("SELECT * FROM `$db_name`.`new_message_list` WHERE party=$id and type_conf=0  ")
 or die(mysql_error());
 while($roster = mysql_fetch_array($roster_sql)){
     $mass_conf[]=$roster['id_conf'];
 }
 //создание списка тех кто участвует в диалогах с этим пользователем
 foreach ($mass_conf as $roll){
     $roster_sql = mysql_query("SELECT * FROM `$db_name`.`new_message_list` WHERE id_conf=$roll and party!=$id   ")
     or die(mysql_error());
     $roster = mysql_fetch_array($roster_sql);
     $mass_id[]=$roster['party'];

 }


 //создание всех участников
 $all_roster_sql = mysql_query("SELECT * FROM `$db_name`.`trans_users`   ")
 or die(mysql_error());
 while($all_roster = mysql_fetch_array($all_roster_sql)){
     $mass_all[]=$all_roster['id'];
 }
 # $array = array ('фигня' , 'ботва' , 'ерунда') ; //Массив для примера

 # $value_to_delete = 'фигня' ; //Элемент с этим значением нужно удалить
 $mass_all = array_flip($mass_all);
 unset ($mass_all[$id]) ;
 foreach ($mass_id as $value){
     unset ($mass_all[$value]) ;
 }

 //Меняем местами ключи и значения
 #unset ($array[$value_to_delete]) ; //Удаляем элемент массива
 #$array = array_flip($array); //Меняем местами ключи и значения
 $mass_all = array_flip($mass_all);
 foreach ($mass_all as $no_list){
     $no_name_sql = mysql_query("SELECT * FROM `$db_name`.`trans_users` WHERE id=$no_list ")
     or die(mysql_error());
     $no_name = mysql_fetch_array($no_name_sql);
     printf ('<option value="scr/message_direct.php?id=%s">%s %s</option>',$no_name['id'],$no_name['fname'],$no_name['lname']);
 }
 /* $id_aut = $_SESSION['auth'];
  $qwery_msg = mysql_query("SELECT * FROM `$db_name`.`message` WHERE id_sender = '$id_aut' OR id_resender = '$id_aut' ORDER BY id") or die(mysql_error());//$id это номер отображённой задачи
  $mass_msg = mysql_fetch_array($qwery_msg);
  $mass_msg_rows = mysql_num_rows($qwery_msg);

  $qwery_user = mysql_query("SELECT * FROM `".$db_name."`.`trans_users` ORDER BY id DESC") or die(mysql_error());
  $colvo  = mysql_num_rows($qwery_user);

  if($colvo > 1){
      $mass_user = mysql_fetch_array($qwery_user);
      //$y = 0;
      do{

          if($mass_user['id']<>$id_aut){
              printf ('
                      <option value="index.php?act=message&add_sob=%s">%s %s</option>
                  ',$mass_user['id'],$mass_user['fname'],$mass_user['lname']);
          }
      }while ($mass_user = mysql_fetch_array($qwery_user));
  }else{
      echo "<option>Пользователи не найдены</option>";
  }*/
?>
                                </select>-->
<select data-placeholder="Поиск диалогов" class="chosen-select"  tabindex="5"  onchange="window.location.href=this.options[this.selectedIndex].value">
    <optgroup label="С ними нет диалогов">
        <?php
        //залупа строим список конциренций в которых есть авторизованный а потом  берем и делаем вещи
        #дописать условие
        $roster_sql = mysql_query("SELECT * FROM `$db_name`.`new_message_list` WHERE party=$id and type_conf=0  ")
        or die(mysql_error());
        while($roster = mysql_fetch_array($roster_sql)){
            $mass_conf[]=$roster['id_conf'];
        }
        //создание списка тех кто участвует в диалогах с этим пользователем
        foreach ($mass_conf as $roll){
            $roster_sql = mysql_query("SELECT * FROM `$db_name`.`new_message_list` WHERE id_conf=$roll and party!=$id   ")
            or die(mysql_error());
            $roster = mysql_fetch_array($roster_sql);
            $mass_id[]=$roster['party'];

        }


        //создание всех участников
        $all_roster_sql = mysql_query("SELECT * FROM `$db_name`.`trans_users`   ")
        or die(mysql_error());
        while($all_roster = mysql_fetch_array($all_roster_sql)){
            $mass_all[]=$all_roster['id'];
        }
        # $array = array ('фигня' , 'ботва' , 'ерунда') ; //Массив для примера

        # $value_to_delete = 'фигня' ; //Элемент с этим значением нужно удалить
        $mass_all = array_flip($mass_all);
        unset ($mass_all[$id]) ;
        foreach ($mass_id as $value){
            unset ($mass_all[$value]) ;
        }

        //Меняем местами ключи и значения
        #unset ($array[$value_to_delete]) ; //Удаляем элемент массива
        #$array = array_flip($array); //Меняем местами ключи и значения
        $mass_all = array_flip($mass_all);
        foreach ($mass_all as $no_list){
            $no_name_sql = mysql_query("SELECT * FROM `$db_name`.`trans_users` WHERE id=$no_list ")
            or die(mysql_error());
            $no_name = mysql_fetch_array($no_name_sql);
            printf ('<option value="scr/message_direct.php?id=%s">%s %s</option>',$no_name['id'],$no_name['fname'],$no_name['lname']);
        }
        /* $id_aut = $_SESSION['auth'];
         $qwery_msg = mysql_query("SELECT * FROM `$db_name`.`message` WHERE id_sender = '$id_aut' OR id_resender = '$id_aut' ORDER BY id") or die(mysql_error());//$id это номер отображённой задачи
         $mass_msg = mysql_fetch_array($qwery_msg);
         $mass_msg_rows = mysql_num_rows($qwery_msg);

         $qwery_user = mysql_query("SELECT * FROM `".$db_name."`.`trans_users` ORDER BY id DESC") or die(mysql_error());
         $colvo  = mysql_num_rows($qwery_user);

         if($colvo > 1){
             $mass_user = mysql_fetch_array($qwery_user);
             //$y = 0;
             do{

                 if($mass_user['id']<>$id_aut){
                     printf ('
                             <option value="index.php?act=message&add_sob=%s">%s %s</option>
                         ',$mass_user['id'],$mass_user['fname'],$mass_user['lname']);
                 }
             }while ($mass_user = mysql_fetch_array($qwery_user));
         }else{
             echo "<option>Пользователи не найдены</option>";
         }*/
        ?>
    </optgroup>
    <!--
    <optgroup label="AFC WEST">
        <option>Denver Broncos</option>
        <option>Kansas City Chiefs</option>
        <option>Oakland Raiders</option>
        <option>San Diego Chargers</option>
    </optgroup>-->
</select>
