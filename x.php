<div class="col-md-9" >
    <div id="content">
        <div class="panel panel-default" >
            <div class="p-15">

                <?
                #isset($var)

                $str = $conf_get;
                if (isset($str)){
                    $messages_sql = mysql_query("SELECT * FROM `$db_name`.`new_message_list` WHERE id_conf=$conf_get")
                    or die(mysql_error());
                    while($name_messeg = mysql_fetch_array($messages_sql)){
                        $member[]=$name_messeg['party'];
                    }
                    $member = array_flip($member); //Меняем местами ключи и значения
                    unset ($member[$id]) ; //Удаляем элемент массива
                    $member = array_flip($member);
                    $count_key = count($member);
                    $i=0;
                    $max_key=$count_key-1;echo 'В диалоге присутствет(ют):';
                    foreach ($member as $id_member){

                        $member_name_sql = mysql_query("SELECT * FROM `$db_name`.`trans_users` WHERE id=$id_member ")
                        or die(mysql_error());
                        $member_name = mysql_fetch_array($member_name_sql);
                        if($i==$max_key){$zap=' ';}else{$zap=',';}
                        echo $member_name['lname']." ".$member_name['fname'].$zap;
                        $i++;
                    }echo '<hr>';
                }
                else{
                    echo '<div class="col-md-6 col-md-offset-3"><h3>Сообщений нет в  принципе</h3></div>
                                            <style>
                                            #scroll{
                                            display: none;
                                            }
</style>';
                }



                ?>

            </div>

            <div  class="ms-body" id="scroll" style="height:300px; overflow: auto;  " >
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
                <div id="smallModal" > </div>
            </div>
            <div class="msb-reply">
                <form method="post" action="" id="form_id">

                    <textarea   name="text" placeholder="Что у тебя на уме..."></textarea>
                    <button  type="button" onclick="AjaxFormRequest('result_div_id', 'form_id', 'scr/add_new_message.php?id_conf=<? echo $conf_get?>')"><i class="fa fa-paper-plane-o"></i></button>
                </form>
                <script type="text/javascript">

                </script>
                <?/*
        <input type="button" value="<i class='fa fa-paper-plane-o'></i>" onclick="AjaxFormRequest('result_div_id', 'form_id', 'scr/add_new_message.php?id_conf=<? echo $conf_get?>')" />
                                    printf('<form id="myForm"  >
                                                <textarea name="text" placeholder="Что у тебя на уме..."></textarea>
                                                <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                            </form>');*/
                ?>
            </div>

            <!--<script>
                                    $(document).ready(function(){
                                        //scr/add_new_message.php?id_conf=%s"
                                        $('#myForm').submit(function(){
                                            $.ajax({
                                                type: "POST",
                                                url: "scr/add_new_message.php?id_conf=<? echo $conf_get?>",
                                                //data: "text="+$("#text").val(),

                                            });
                                            return false;
                                        });

                                    });
                                </script>-->
        </div>

    </div>
</div>
</div>