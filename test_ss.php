<?
$messages_sql = mysql_query("SELECT * FROM `$db_name`.`new_message` WHERE conf=$conf_get ORDER BY date ASC")
or die(mysql_error());
$row_for_comparison = mysql_num_rows($messages_sql);
if(  $row_for_comparison > 0 ){
    while($messages = mysql_fetch_array($messages_sql)) {
        $id_look=$messages['id'];
        $conf_update = "UPDATE `$db_name`.`new_messages_spis` SET `new_messages_spis`.`look` = '1' WHERE `new_messages_spis`.`id_user`=$id and `new_messages_spis`.`id_meseges`=$id_look";
        $result_update = mysql_query($conf_update) or die(mysql_error());


        //
        if (file_exists('files/avatar/'.$id.'.png')){
            $avatype = "png";
            $avatar_my='files/avatar/'.$id.'.png';
        }elseif(file_exists('files/avatar/'.$id.'.jpg')){
            $avatype = "jpg";
            $avatar_my='files/avatar/'.$id.'.jpg';
        }elseif(file_exists('files/avatar/'.$id.'.jpeg')){
            $avatype = "jpeg";
            $avatar_my='files/avatar/'.$id.'.jpeg';
        }elseif(file_exists('../files/avatar/'.$id.'.gif')){
            $avatype = "gif";
            $avatar_my='files/avatar/'.$id.'.gif';
        }else{
            $avatar_my="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png";
        };

        //
        if ($messages['from'] == $id) {

            printf('<div class="message-feed right" id="%s">
                                                <div class="pull-right">
                                                    <img src="%s" alt="" class="img-avatar">
                                                </div>
                                                <div class="media-body">
                                                    <div class="mf-content">
                                                        %s
                                                    </div>
                                                    <small class="mf-date"><i class="fa fa-clock-o"></i> %s</small>
                                                </div>
                                            </div>
            
                                            ',$messages['id'],$avatar_my, $messages['message'], $messages['date']);
        } else {
            $value =$messages['from'];
            // выясняем суку
            $conf_name_sql = mysql_query("SELECT * FROM `$db_name`.`trans_users` WHERE id=$value ")
            or die(mysql_error());
            $conf_name = mysql_fetch_array($conf_name_sql);
            $lname =$conf_name['lname'];
            $fname= $conf_name['fname'];
            $id_user_img= $conf_name['id'];

            if (file_exists('files/avatar/'.$id_user_img.'.png')){
                $avatype = "png";
                $avatar='files/avatar/'.$id_user_img.'.png';
            }elseif(file_exists('files/avatar/'.$id_user_img.'.jpg')){
                $avatype = "jpg";
                $avatar='files/avatar/'.$id_user_img.'.jpg';
            }elseif(file_exists('files/avatar/'.$id_user_img.'.jpeg')){
                $avatype = "jpeg";
                $avatar='files/avatar/'.$id_user_img.'.jpeg';
            }elseif(file_exists('files/avatar/'.$id_user_img.'.gif')){
                $avatype = "gif";
                $avatar='files/avatar/'.$id_user_img.'.gif';
            }else{
                $avatar="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png";
            }

            printf('
                                                <div class="message-feed media">
                                                    <div class="pull-left">
                                                        <img src="%s" alt="" class="img-avatar">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="mf-content">
                                                            <b>%s %s :</b><br>
                                                            %s
                                                        </div>
                                                        <small class="mf-date"><i class="fa fa-clock-o"></i> %s</small>
                                                    </div>
                                                </div>
                                                ',$avatar,$lname, $fname, $messages['message'], $messages['date']);
        }
    }
}
else{
    echo '<div class="col-md-6 col-md-offset-3"><h3>Сообщений в даннной беседе нет</h3></div>';

}


?>