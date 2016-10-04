<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="tmp/images/favicon_1.ico">
    <title>Профиль события</title>
    <link href="tmp/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="tmp/css/core.css" rel="stylesheet" type="text/css">
    <link href="tmp/css/components.css" rel="stylesheet" type="text/css">
    <link href="tmp/css/pages.css" rel="stylesheet" type="text/css">
    <link href="tmp/css/menu.css" rel="stylesheet" type="text/css">
    <link href="tmp/css/responsive.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php include "page/menu.php";
$id = $_GET['id'];
$qr_result = mysql_query("SELECT * FROM `$db_name`.`auto_jornal` WHERE id=".$id)
or die(mysql_error());
$data4 = mysql_fetch_array($qr_result);
										$name_sob=$data4['name_sob'];
										$more_buy=$data4['more_buy'];
										$user_autor=$data4['user_autor'];
										$user_buy=$data4['user_buy'];
										$tipe=0;
										$type1='Ремонт';
                                            $type2='Заказ';
                                            if($data4['type_sob']==1){$type =$type1;}
                                            else{$type=$type2;};
											
											$qr_result14 = mysql_query("SELECT * FROM `$db_name`.`auto_data` WHERE 	jornal='".$id."'")
									or die(mysql_error());
									$num_rows = mysql_num_rows($qr_result14);
									while($data5 = mysql_fetch_array($qr_result14)){
										$date[] = $data5['data_sob'];
										$lola1[]=$data5['lola'];
										
												$qqr_result24 = mysql_query("SELECT * FROM `$db_name`.`auto_list` WHERE id ='".$data5['resurses']."'")
														or die(mysql_error());
														
														
														while($data12 = mysql_fetch_array($qqr_result24)){
															$car[]=$data12['gos'].' '. $data12['model'];}		
																					}
																					#$lola2 = array_unique($lola1);
																					$date2=max($date);
																					$date1=min($date);
																					
																					$lola=$lola1[0];
											
											

?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="btn-group pull-right">
                    <button onClick="location.href = '../index.php?act=update_sob&id_jornal=<?=$id?>'" type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Редактировать <span class="m-l-5"></span></button>
<!--http://a0080586.xsph.ru/index.php?act=update_car  <a href="index.php?act=update_car&id_auto=<?=$id?>">Редактировать</a> -->   
               </div>

                <h4 class="page-title">Механик </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Просмотер события</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
							
							


                            <div class="col-md-12">
							
                                   <div class="table-responsive">
											<table class="table table-bordered">
									
													<thead>
													<tr>
														<th colspan="2">Описание события</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Тип события</td>
														<td><?  echo $type;?></td>
													</tr>
													<tr>
														<td>Имя события</td>
														<td><?  echo $name_sob;?></td>
													</tr>
													<tr>
														<td>Описание</td>
														<td><?  echo $more_buy;?></td>
													</tr>
													<tr>
														<td>Автор события</td>
														<td><?  echo $user_autor;?></td>
													</tr>
													<tr>
														<td>Имя закзчика</td>
														<td><?  echo $user_buy;?></td>
													</tr>
													<?
													if($lola==0){print('<tr>
														<td>Начало</td>
														<td>'.$date1.'</td>
													</tr>
													<tr>
														<td>Окончание</td>
														<td>'.$date2.'</td>
													</tr>
													');}
													else{echo "<tr>
														<td>Даты события</td>
														<td>";
														foreach ($date as $value) {
															
														echo $value." ";
													
														}echo"</td></tr> ";
													}
													?>
													
														<tr><td>Задействоанные  машины</td>
														<td><?php $car = array_unique($car);
															foreach ($car as $value) {echo $value." ";}
														?></td></tr>
												
												</tbody>
											</table>
									
                            </div></div>
                                



							
								
                        </div>
                    </div>
                </div> </div>
                </div>
				<script type="text/javascript">
					window.onload = function(){
						var block = document.getElementById("scroll_down");
						block.scrollTop = block.scrollHeight;
					}
				</script>
				<?
		//Comments 
								
									$qwery_comments = mysql_query("SELECT * FROM  `$db_name`.`comments_sob`   WHERE id_recipient = '$id' ORDER BY id") or die(mysql_error());//$id это номер отображённой задачи
									$mass_comments = mysql_fetch_array($qwery_comments);
									$mass_comments_row = mysql_num_rows($qwery_comments);
									
									echo'<div class="col-lg-4">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Комментарии</h3>
												</div>
												<div class="panel-body" id="scroll_down" style="height:515px; overflow: auto;">
													<div class="chat-conversation">
														<ul class="conversation-list nicescroll">';
									if($mass_comments_row > '0'){
										do{
											$qwery = mysql_query("SELECT * FROM `$db_name`.`trans_users`   WHERE id = '".$mass_comments['id_sender']."' ORDER BY id") or die(mysql_error());//$id_user это session пользователя
											$mass_comments_users = mysql_fetch_array($qwery);
											if($mass_comments['id_sender'] == $_SESSION['auth']){
												printf('
													
																<li class="clearfix">
																	<div class="chat-avatar">
																		<img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png" alt="male">
																		<i>%s:%s</i>
																	</div>
																	<div class="conversation-text">
																		<div class="ctext-wrap">
																			<i>%s %s</i>
																			<p>
																			   %s
																			</p>
																		</div>
																	</div>
																</li>
															
												',$mass_comments['h'],$mass_comments['min'],$mass_comments_users['lname'],$mass_comments_users['fname'],$mass_comments['text']);
											}else{
												printf('
													<li class="clearfix odd">
														<div class="chat-avatar">
															<img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/1024/user-male-icon.png" alt="male">
															<i>%s:%s</i>
														</div>
														<div class="conversation-text">
															<div class="ctext-wrap">
																<i>%s %s</i>
																<p>
																   %s
																</p>
															</div>
														</div>
													</li>
													',$mass_comments['h'],$mass_comments['min'],$mass_comments_users['lname'],$mass_comments_users['fname'],$mass_comments['text']);
											}
										}while($mass_comments = mysql_fetch_array($qwery_comments));
									}?>
									
									</div></div>
									<div class="row">
										<form action="scr/orb.php?id_sob=<?echo $id;?>" method="POST" role="form">
											<div class="col-xs-8 chat-inputbar">
                                                <input name="text" type="text" class="form-control">
                                            </div>
                                            <div class="col-xs-4 chat-send">
                                                <button type="submit" class="btn btn-purple waves-effect waves-light">Добавить</button>
                                            </div>
										</form>
									</div>
										<br>
                                    </div>
                                </div>
                            </div>
            </div>
        </div>
		
    </div>

    <footer class="footer text-right">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    2016 © Вектор
                </div>
                <div class="col-xs-6">
                    <ul class="pull-right list-inline m-b-0">
                        <li>
                            <a href="#">Помощь</a>
                        </li>
                        <li>
                            <a href="#">Контакты</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<!-- jQuery  -->
<script src="tmp/js/jquery.min.js"></script>
<script src="tmp/js/bootstrap.min.js"></script>
<script src="tmp/js/jquery.app.js"></script>
</body>
</html>