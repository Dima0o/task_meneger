enctype="multipart/form-data"
									<div class="form-group">
                                        <label>Прикрепить файл</label>
                                        <input type="file" name="logo" class="form-control">
                                        <input type="hidden" name="filetype" value="1">
                                    </div>
<?php
	$last_id = mysql_insert_id();
//ЗАГРУЗКА ФАЙЛА
#Переменные картинок
	$file_type = $_POST['filetype'];
	$uploaddir = './files/';
	$logo = $uploaddir.basename($_FILES['logo']['name']);	
	#Ебучия массив и функция для транслита имён файлов
	function translit($str){
		$rus = array(
				'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц',  'Ч',  'Ш',  'Щ', 'Ъ', 'Ы',  'Ь', 'Э', 'Ю', 'Я', 
				'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч',   'ш',  'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я',
				'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
				'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'
				);
		$lat = array(
				'A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', '',  'i',  '',  'E', 'Yu', 'Ya', 
				'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', '', 'i', '',  'e', 'yu', 'ya',
				'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
				'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'
			);
    return str_replace($rus, $lat, $str);
	}
	#Проверка выбрал ли в форме файл
	if(!empty($_FILES["logo"]['name'])){
		#Транслит названия файла
		
		#Копирование файла
		if (copy($_FILES["logo"]["tmp_name"], $logo)){
			#Переписать этот мусор
			$name = $_FILES['logo']['name'];
			$pos = strpos($name, "."); //11
			$colvo = strlen ($name); //15
			$col_one = $pos + 1; //12
			$best_name = substr($name, 0,$pos);
			$new_name = translit($best_name);
			$rash_one = $colvo - $col_one;
			$minus = "-".$rash_one;
			$rash_two = substr($name, $minus);
			//echo $rash_two;
			$suka_file = "$new_name-$file_type-$last_id.$rash_two";
			//echo $name.'<br>'.$suka_file;
			copy($logo, "../files/$suka_file");
			unlink($logo);
			$file_sql = mysql_query("
				INSERT INTO `$db_name`.`files` 
				(`id`, `type`, `mod_id`, `name`) 
				VALUES 
				(NULL, '1', '$last_id', '$suka_file')
			");
		}
	}
//КОНЕЦ ЗАГРУХКИ ФАЙЛА
?>