<?
	// Задача 1
	$count = 3;
	$array = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm');
	
	for($i = 0;$i < $count; $i++){
		$first = $array[$i];
		unset($array[$i]);
		$array[] = $first;
	}

	print_r($array);
	
	
	
	// Задача 2
	$string = "Номер моей карты: 4321321021091098.";
	$pattern = '/\b(\d{6})\d{6}(\d{4})/';
	$res = preg_replace($pattern, '$1******$2', $string);
	
	echo $res;
	
	
	
	// Задача 3
	/*
		Без запуска кода я бы сказал так 

		4: 4
		3: 3
		2: 2


		Но реально получилось без переносов

		4: 4\n3: 3\n2: 2\n
	*/
	
	

	// Задача 4
	//Использовал бы htmlspecialchars и в зависимости от ситуации filter_var	
	
	// обход примера
	$_POST['text'] = "<SCRIPT>alert();</script>";

	// пример
	echo clean1($_POST['text']);
	function clean1($text) {
		return str_replace("<script", "", $text);
	}
	
	// исправленный пример
	echo clean($_POST['text']);
	function clean($text) {
		$text = htmlspecialchars($text);
		// $text = filter_var($text, "подставить нужное");
		return $text;
	}
	
	
	
	// Задача 5
	/*
		Структура:
		
		books - id, name,
		authors - id, name,
		book_author - id, id_author, id_book
	
		Запрос:
	
		SELECT books.name as `book name`, COUNT(*) as `count authors` FROM `authors`
		INNER JOIN `book_author` ON authors.id = book_author.id_author 
		INNER JOIN `books` ON book_author.id_book = books.id
		GROUP BY books.name 
		HAVING COUNT(*) > 2;
	*/
	
	
	// Задача 6
	
	// Не запускал, прикинул примерно по тексту задания
	$user = 3;
	$amount = 200;
	
	$stmt = $pdo->prepare('SELECT balance FROM balances WHERE userid = ?');
	$stmt->execute(array($user));
	$balance = $stmt->fetchColumn();
	
	if($balance >= $amount)
	{		
		$balance = $balance - $amount;
		$stmt1 = $pdo->prepare("UPDATE `balances` SET `balance`=:balance WHERE `userid`=:user");
		$stmt1->bindParam(':balance', $amount);
		$stmt1->bindParam(':user', $user);
		$stmt1->execute()
				
		$result = PayOut::pay($user, $amount);
		
		if($result)
		{
			$stmt2 = $pdo->prepare("INSERT INTO `payouts`(`id`, `userid`, `amount`, `status`) VALUES (:userid, :amount, :status)");
			$stmt2->bindParam(':userid', $user);
			$stmt2->bindParam(':amount', $amount);
			$stmt2->bindParam(':status', $result);
			$stmt2->execute()
		}
	}
	
	// Задача 7
	/*
		Оно же даже подписано после команды git status
	
		# On branch master
		# Changes to be committed:
		#   (use "git reset HEAD <file>..." to unstage)
	*/
	
	// Задача 8
	
	//Вроде 1/x		
?>