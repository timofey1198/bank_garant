<pre>
<?
	include_once('lib/config.php');
	include_once('lib/mysql.php');
    //
	//$DB = new MYSQL($dblogin, $dbpass, $dbhost, $dbname, true, true, false);
	//$DB = new MYSQL($config['db_user'], $config['db_pass'], $config['db_host'], $config['db_name'], true, true, false);
	//
	//$DB->connection();
	//$query = 'SET CHARACTER SET UTF8';
	//mysql_unbuffered_query($query);
	//
	//$DB->sql_query('SELECT * FROM settings WHERE');
	//$res = $DB->get_all();
?>
</pre>
<!DOCTYPE html>
<html lang="en">
	<head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>UniBank</title>
<!--[if lt IE 9]>
		<script type="text/javascript" src="js/css3-mediaqueries.min.js"></script>
		<script type="text/javascript" src="js/html5shiv-printshiv.min.js"></script>
<![endif]-->
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/style2.css" type="text/css" media="screen">
		<!--<script defer type="text/javascript" src="js/jquery-1.10.0.min.js"></script>-->
		<script defer type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
		<script defer type="text/javascript" src="js/script.jquery.js"></script>
		<script defer type="text/javascript" src="js/main.js"></script>
		<script defer type="text/javascript" src="js/datepicker.min.js"></script>
		<link href="css/datepicker.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!--<script src="js/datepicker.min.js"></script>-->
	</head>
	
	<div id="content" style="display:none;"></div>
	
	<body>
		<div class="header shadow">
			<div class="wrapper clear">
			
				<h1 class="logo">
					<a href="#">UniBank</a>
				</h1>

				<a class="btn-menu" href="#menu">
					<span class="ib top-bar"></span>
					<span class="ib middle-bar"></span>
					<span class="ib bottom-bar"></span>
				</a>
				
				<div class="hm-modal"></div>
				
				<div class="hm-box">
				
					<h2 class="hm-logo">
						UniBank
						<a class="btn-close" href="#menu-close"></a>						
					</h2>
					
					<div class="hm-item">
						<ul class="hm">
							
							<?
								$DB = new MYSQL($config['db_user'], $config['db_pass'], $config['db_host'], $config['db_name'], true, true, false);
								
								$DB->connection();
								$query = 'SET CHARACTER SET UTF8';
								mysql_unbuffered_query($query);
								
								$DB->sql_query('SELECT * FROM settings WHERE type="top_link"');
								$res = $DB->get_all();
								
								for($i = 0; $i < count($res); $i++){
									echo '<li>';
									echo '<a href="'.$res[$i]['content'].'">'.$res[$i]['name'].'</a>';
									echo '</li>';
								}
							?>
							
							<!--
							
								Можно сделать класс active
								
								Пример с этим классом:
								<li class="active">
									<a href="#">Онлайн Калькулятор</a>
								</li>
							
							-->
							
						</ul>
					</div>

					<div class="hm-social">
						<a href="#facebook" class="fb"></a>
						<a href="#twitter" class="tw"></a>
						<a href="#gplus" class="gp"></a>
						<a href="#vk" class="vk"></a>
						<a href="#pinterest" class="pin"></a>
						<a href="#instagram" class="in"></a>
						<a href="#linkedin" class="lin"></a>
					</div>

				</div>
				
			</div>
		</div>
		
		<?if(!$_GET or $_GET['main']){?>
		
		<div class="content pagemain">

			<div class="calculator">
				<div class="wrapper">
				
					<h1 class="page-title">Рассчитайте стоимость банковской гарантии</h1>
					<p class="page-desc">Сократите расходы на гарантии до 60%, используя онлайн-калькулятор</p>

					<div class="calculator-form">

						<form action="" method="GET" id="mainForm">
						
							<div class="radio-box-wrap custom">
							
								<p class="radio-desc"><b>Гарантия в рамках</b></p><br>
								
								<div class="radio-box">
									<input type="radio" name="radiobox1" value="0" id="radio_b11" checked>
									<label for="radio_b11">44-ФЗ</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox1" value="1" id="radio_b12">
									<label for="radio_b12">223-ФЗ</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox1" value="2" id="radio_b13">
									<label for="radio_b13">615-ПП (185-ФЗ)</label>
								</div>
								
								<div class="radio-box">
									<input type="radio" name="radiobox1" value="3" id="radio_b14">
									<label for="radio_b14">Коммерческий контракт</label>
								</div>
							</div>
							
							<div class="radio-box-wrap custom">
							
								<p class="radio-desc">Цель банковской гарантии</p><br>
								
								<div class="radio-box">
									<input type="radio" name="radiobox2" value="0" id="radio_b21" checked>
									<label for="radio_b21">Исполнение</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox2" value="1" id="radio_b22">
									<label for="radio_b22">Участие</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox2" value="2" id="radio_b23">
									<label for="radio_b23">Возврат аванса</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox2" value="3" id="radio_b24">
									<label for="radio_b24">Гаратийные обязательства</label>
								</div>									
								
							</div>
							
							<div class="radio-box-wrap">
							
								<p class="radio-desc">Бесспорное списание</p><br>
								
								<div class="radio-box">
									<input type="radio" name="radiobox3" value="1" id="radio_b31" checked>
									<label for="radio_b31">Да</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox3" value="0" id="radio_b32">
									<label for="radio_b32">Нет</label>
								</div>								
								
							</div>
							
							<div class="radio-box-wrap">
							
								<p class="radio-desc">Форма БГ заказчика</p><br>
								
								<div class="radio-box">
									<input type="radio" name="radiobox4" value="1" id="radio_b41">
									<label for="radio_b41">Есть</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox4" value="0" id="radio_b42" checked>
									<label for="radio_b42">Нет</label>
								</div>				
								
							</div>
							
							<div class="radio-box-wrap custom">
							
								<p class="radio-desc">Авансирование по контракту</p><br>
								
								<div class="radio-box">
									<input type="radio" name="radiobox5" value="1" id="radio_b51">
									<label for="radio_b51">Есть</label>
								</div>

								<div class="radio-box">
									<input type="radio" name="radiobox5" value="0" id="radio_b52" checked>
									<label for="radio_b52">Нет</label>
								</div>	
								
							</div>
							
							<div class="form-box">
								<div class="input-box big">
									<label for="city">Укажите реестровый номер</label>
									<input type="text" id="regnum" name="regnum" placeholder="Например - 0372100005617000313" style="max-width:518px;" onkeyup="parseInfo(this.value);">
								</div>
								<br>
								<br>
								<div class="input-box big">
									<label for="city">Информация о компании</label>
									<input type="text" id="info" name="info" placeholder="ИНН, ОГРН" style="max-width:518px;">
								</div>
								<br>
								<br>
								<div class="input-box">
									<label for="city">Укажите сумму гарантии</label>
									<input type="text" id="garant" name="garant" placeholder="Рублей">
								</div>
								<div class="input-box">
									<label for="cash">Укажите срок гарантии</label>
									<input type="text" id="term" name="term" placeholder="ДД.ММ.ГГ / ДД.ММ.ГГ" class="datepicker-here" data-range="true" data-multiple-dates-separator=" / ">
								</div>

							</div>
							
							<input type="textarea" style="display:none;" name="out" value="1">
							
							<a class="btn calc" onclick="checkForm();">Подобрать предложения</a>
							
						</form>
					</div>
					
				</div>
			</div>
			
			<div class="propose">
				<div class="wrapper">
					<h1 class="page-title">Что еще предлагает наш сервис?</h1>
					
					<ul class="propose-list clear">
						<li>
							<span></span>
							<p>Ваш кредитный рейтинг</p>
						</li>
						<li>
							<span></span>
							<p>Отчет по кредитной истории</p>
						</li>
						<li>
							<span></span>
							<p>Подписка на изменение рейтинга</p>
						</li>
						<li>
							<span></span>
							<p>Улучшение кредитной истории</p>
						</li>
						<li>
							<span></span>
							<p>Погашение заемных средств</p>
						</li>
						<li>
							<span></span>
							<p>Финансовая грамотность</p>
						</li>
					</ul>
					
					<p class="propose-desc">Чтобы получить доступ ко всем услугам пройдите быструю регистрацию и Вы получите отчет по кредитному рейтингу БЕСПЛАТНО!</p>
				</div>
			</div>
		
			<div class="slogan">
				<div class="wrapper">
					<h1 class="page-title">Онлайн-расчет стоимости банковских гарантий для участников закупок</h1>
					<p>Самостоятельно рассчитывайте стоимость обеспечения online в нескольких банках без регистрации. Получайте актуальные цены от банков – лидеров рынка в любое время вместе с progarantii.ru</p>
				</div>
			</div>
			
			<div class="feature">
				<div class="wrapper">
				
					<ul class="feature-list clear">
						<li>
							<span></span>
							<h4>Доступность</h4>
							<p>Не требуется регистрация, контакт с банком или посредником. Результаты находятся в открытом доступе.</p>
						</li>
						<li>
							<span></span>
							<h4>Актуальность тарифов</h4>
							<p>Все расчеты основываются только на актуальных тарифах банков.</p>
						</li>
						<li>
							<span></span>
							<h4>Лучшая цена</h4>
							<p>Выберите самую выгодную стоимость оформления гарантии из нескольких предложений.</p>
						</li>
					</ul>
					
				</div>
			</div>
		
			<div class="clients">
				<div class="wrapper">
			
					<h1 class="page-title">Мы сотрудничаем с крупнейшими банками</h1>
					
					<div class="clients-slider open">
						<ul class="slider-list clear">
							<li class="active">
								<div class="slide" style="background-image:url('img/bank1.jpg');">
									<a class="slide-link" href="#">
										<span>Client 1</span>
									</a>
								</div>
							</li>
							<li>
								<div class="slide" style="background-image:url('img/bank2.jpg');">
									<a class="slide-link" href="#">
										<span>Client 2</span>
									</a>
								</div>
							</li>
							<li>
								<div class="slide" style="background-image:url('img/bank3.jpg');">
									<a class="slide-link" href="#">
										<span>Client 3</span>
									</a>
								</div>
							</li>
							<li>
								<div class="slide" style="background-image:url('img/bank4.jpg');">
									<a class="slide-link" href="#">
										<span>Client 4</span>
									</a>
								</div>
							</li>
							<li>
								<div class="slide" style="background-image:url('img/bank5.jpg');">
									<a class="slide-link" href="#">
										<span>Client 5</span>
									</a>
								</div>
							</li>
						</ul>
						<a href="#prev" class="btn-slider prev"></a>
						<a href="#next" class="btn-slider next"></a>
					</div>
			
				</div>
			</div>
			
		</div>
		
		<?}?>
		
		<?if($_GET['out']){?>
			
			<div class="content pagemain">
			
			<div class="calculator-filter">
			
				<div class="wrapper">
				
					<form class="calculator-filter-form" id="scndForm" action="" method="GET">

						<div class="calculator-filter-form-box clear">
					
							<div class="calculator-filter-box">
							
								<div class="select-box">
									<div class="select-desc">
										<p class="select-desc-text"></p>
										<input class="select-input" type="hidden" name="radiobox1">
										<span class="caret"></span>
									</div>
									<ul class="select-list" value="1">
										<?
											if($_GET['radiobox1'] == 0){
												echo '<li data-value="0">44-ФЗ</li>';
												echo '<li data-value="1">223-ФЗ</li>';
												echo '<li data-value="2">615-ПП (185-ФЗ)</li>';
												echo '<li data-value="3">Ком. контракт</li>';
											}
											
											if($_GET['radiobox1'] == 1){
												echo '<li data-value="1">223-ФЗ</li>';
												echo '<li data-value="0">44-ФЗ</li>';
												echo '<li data-value="2">615-ПП (185-ФЗ)</li>';
												echo '<li data-value="3">Ком. контракт</li>';
											}
											
											if($_GET['radiobox1'] == 2){
												echo '<li data-value="2">615-ПП (185-ФЗ)</li>';
												echo '<li data-value="0">44-ФЗ</li>';
												echo '<li data-value="1">223-ФЗ</li>';
												echo '<li data-value="3">Ком. контракт</li>';
											}
											
											if($_GET['radiobox1'] == 3){
												echo '<li data-value="3">Ком. контракт</li>';
												echo '<li data-value="0">44-ФЗ</li>';
												echo '<li data-value="1">223-ФЗ</li>';
												echo '<li data-value="2">615-ПП (185-ФЗ)</li>';
											}
										?>
									</ul>
								</div>
								
							</div>

							<div class="calculator-filter-box">

								<div class="select-box">
									<div class="select-desc">
										
										<p class="select-desc-text"></p>
										<input class="select-input" type="hidden" name="radiobox2">
										<span class="caret"></span>
									</div>
									<ul class="select-list">
										<?
											if($_GET['radiobox2'] == 0){
												echo '<li data-value="0">Исполнение</li>';
												echo '<li data-value="1">Участие</li>';
												echo '<li data-value="2">Возврат аванса</li>';
												echo '<li data-value="3">Гар. обязательства</li>';
											}
											
											if($_GET['radiobox2'] == 1){
												echo '<li data-value="1">Участие</li>';
												echo '<li data-value="0">Исполнение</li>';
												echo '<li data-value="2">Возврат аванса</li>';
												echo '<li data-value="3">Гар. обязательства</li>';
											}

											if($_GET['radiobox2'] == 2){
												echo '<li data-value="2">Возврат аванса</li>';
												echo '<li data-value="0">Исполнение</li>';
												echo '<li data-value="1">Участие</li>';
												echo '<li data-value="3">Гар. обязательства</li>';
											}
											
											if($_GET['radiobox2'] == 3){
												echo '<li data-value="3">Гар. обязательства</li>';
												echo '<li data-value="0">Исполнение</li>';
												echo '<li data-value="1">Участие</li>';
												echo '<li data-value="2">Возврат аванса</li>';
											}
										?>
									</ul>
								</div>
								
							</div>
														
							<div class="calculator-filter-box">
							
								<div class="input-box calc-filter">
									<label for="city">Реестровый номер</label>
									<input type="text" id="regnum" name="regnum" value="<?echo $_GET['regnum']?>">
								</div>
								
							</div>
								
							<div class="calculator-filter-box">
							
								<div class="input-box calc-filter">
									<label for="city">Сумма гарантии</label>
									<input type="text" id="garant" name="garant" value="<?echo $_GET['garant']?>">
								</div>
								
							</div>

							<div class="calculator-filter-box">

								<div class="input-box calc-filter">
									<label for="cash">Срок гарантии</label>
									<input type="text" id="term" name="term" value="<?echo $_GET['term']?>">
								</div>
								
							</div>
								
							<div class="calculator-filter-box">
							
								<a class="btn calc calc-filter" onclick="scndForm.submit();">Найти</a>
								
							</div>
							
						</div>
						
						<input type="hidden" name="radiobox3" id="radiobox3">
						<input type="hidden" name="radiobox4" id="radiobox4">
						<input type="hidden" name="radiobox5" id="radiobox5">
						<input type="hidden" name="info" id="info">
						<input type="hidden" name="out" value="1">
						
					</form>
					
					<div id="modalwindow">
						<div class="block">
							<h4>Дополнительные параметры</h4>
							<div class="button" onclick="closeModal()"><i class="fa fa-times" aria-hidden="true"></i></div>
						</div>
						
						<div class="container">
							<div class="item">
								<p class="desc">Информация о компании</p>
								<input type="text" placeholder="ИНН, ОГРН" class="text" value="<?echo $_GET['info']?>" id="info_modal">
								<br>
							</div>
							
							<div class="item">
								<p class="desc">Бесспорное списание</p>
								<div class="select-box">
									<div class="select-desc">
										<p class="select-desc-text">Да</p>
										<input class="select-input" type="hidden" name="radiobox3_modal" id="radiobox3_modal" value="<?echo $_GET['radiobox3']?>">
										<span class="caret"></span>
									</div>
									<ul class="select-list" value="<?echo $_GET['radiobox3']?>">	
										<?
											if($_GET['radiobox3'] == 1){
												echo '<li data-value="0">Да</li><li data-value="1">Нет</li>';
											}else{
												echo '<li data-value="1">Нет</li><li data-value="0">Да</li>';
											}
										?>
									</ul>
								</div>
							</div>
							
							<div class="item">
								<p class="desc">Форма БГ заказчика</p>
								<div class="select-box">
									<div class="select-desc">
										<p class="select-desc-text"></p>
										<input class="select-input" type="hidden" name="radiobox4_modal" id="radiobox4_modal" value="<?echo $_GET['radiobox4']?>">
										<span class="caret"></span>
									</div>
									<ul class="select-list" value="<?echo $_GET['radiobox4']?>">
										<?
											if($_GET['radiobox4'] == 1){
												echo '<li data-value="0">Есть</li><li data-value="1">Нет</li>';
											}else{
												echo '<li data-value="1">Нет</li><li data-value="0">Есть</li>';
											}
										?>
									</ul>
								</div>
							</div>
							
							<div class="item">
								<p class="desc">Авансирование по контракту</p>
								<div class="select-box">
									<div class="select-desc">
										<p class="select-desc-text">Есть</p>
										<input class="select-input" type="hidden" name="radiobox5_modal" id="radiobox5_modal" value="<?echo $_GET['radiobox5']?>">
										<span class="caret"></span>
									</div>
									<ul class="select-list" value="<?echo $_GET['radiobox5']?>">
										<?
											if($_GET['radiobox5'] == 1){
												echo '<li data-value="0">Есть</li><li data-value="1">Нет</li>';
											}else{
												echo '<li data-value="1">Нет</li><li data-value="0">Есть</li>';
											}
										?>				
									</ul>
								</div>
							</div>
							
							<div class="close-button" onclick="modalInfo();closeModal()">Готово</div>
							<div class="close-button grey" onclick="closeModal()">Отменить</div>
							
						</div>
					</div>
					
					<div class="calculator-filter-widebutton-box">
						<a class="calculator-filter-widebutton" onclick="openModal();">Больше параметров</a>
					</div>
					
					<form class="calculator-sort-form">
						<p class="sort-title">Сортировка:</p>
						<p class="sort-box">
							<a id="percent-sort">Процентная ставка в год</a>
						</p>							
						<p class="sort-box up">
							<a id="term-sort">Срок кредита</a>
						</p>							
						<p class="sort-box down">
							<a id="summ-sort">Сумма кредита</a>
						</p>
					</form>
					
				</div>
			
			</div>
			
			<div class="calculator-result">
			
				<div class="wrapper">

					<p class="result-title">Найдено 18 предложений</p>
							
					<div class="mgmt-box">
						<p>Отправьте заявку сразу во все одобренные предложения в 1 клик!</p>
						<p>Повторного заполнения анкеты не требуется.</p>
						<a class="btn btn-all" href="#">Заявка во все компании</a>
					</div>
					
					<div class="result-box">
					
						<div class="result-item">
						
							<div class="result-bank">
								<ul>
									<li>
										<div class="result-logo">
											<img src="img/_bank01.png">
										</div>
									</li>
									<li class="clear">
										<div class="result-header clear">
											<h3>ОТП банк</h3>
											<p>
												<a href="#">Поделиться</a>
											</p>
										</div>
										<div class="result-body clear">
											 <p>
												<em>Годовая процентная ставка</em> <span>18%</span>
											 </p>
											 <p>
												<em>Единовременная комиссия</em> <span>от 30 905 р.</span>
											 </p>
											 <p>
												<em>Срок кредита (дней)</em> <span>до 45 дней</span>
											 </p>
											 <p>
												<em>Ежемесячный платеж</em> <span>от 15 000 р.</span>
											 </p>
										</div>
										<div class="result-footer clear">
											<p>
												<a href="#">Подробно о предложении</a>
											</p>
											<p>
												<a href="#">Требования банка/ МФО</a>
											</p>
										</div>
									</li>
									<li>
										<div class="result-btn">
											<a class="btn btn-get-cash" href="#">Получить кредит</a>
										</div>
									</li>
								</ul>
							</div>
							
						</div>	

						<div class="result-item">
						
							<div class="result-bank">
								<ul>
									<li>
										<div class="result-logo">
											<img src="img/_bank01.png">
										</div>
									</li>
									<li class="clear">
										<div class="result-header clear">
											<h3>ОТП банк</h3>
											<p>
												<a href="#">Поделиться</a>
											</p>
										</div>
										<div class="result-body clear">
											 <p>
												<em>Годовая процентная ставка</em> <span>18%</span>
											 </p>
											 <p>
												<em>Единовременная комиссия</em> <span>от 30 905 р.</span>
											 </p>
											 <p>
												<em>Срок кредита (дней)</em> <span>до 45 дней</span>
											 </p>
											 <p>
												<em>Ежемесячный платеж</em> <span>от 15 000 р.</span>
											 </p>
										</div>
										<div class="result-footer clear">
											<p>
												<a href="#">Подробно о предложении</a>
											</p>
											<p>
												<a href="#">Требования банка/ МФО</a>
											</p>
										</div>
									</li>
									<li>
										<div class="result-btn">
											<a class="btn btn-get-cash" href="#">Получить кредит</a>
										</div>
									</li>
								</ul>
							</div>
							
						</div>	

						<div class="result-item">
						
							<div class="result-bank">
								<ul>
									<li>
										<div class="result-logo">
											<img src="img/_bank01.png">
										</div>
									</li>
									<li class="clear">
										<div class="result-header clear">
											<h3>ОТП банк</h3>
											<p>
												<a href="#">Поделиться</a>
											</p>
										</div>
										<div class="result-body clear">
											 <p>
												<em>Годовая процентная ставка</em> <span>18%</span>
											 </p>
											 <p>
												<em>Единовременная комиссия</em> <span>от 30 905 р.</span>
											 </p>
											 <p>
												<em>Срок кредита (дней)</em> <span>до 45 дней</span>
											 </p>
											 <p>
												<em>Ежемесячный платеж</em> <span>от 15 000 р.</span>
											 </p>
										</div>
										<div class="result-footer clear">
											<p>
												<a href="#">Подробно о предложении</a>
											</p>
											<p>
												<a href="#">Требования банка/ МФО</a>
											</p>
										</div>
									</li>
									<li>
										<div class="result-btn">
											<a class="btn btn-get-cash" href="#">Получить кредит</a>
										</div>
									</li>
								</ul>
							</div>
							
						</div>	

						<div class="result-item">
						
							<div class="result-bank">
								<ul>
									<li>
										<div class="result-logo">
											<img src="img/_bank01.png">
										</div>
									</li>
									<li class="clear">
										<div class="result-header clear">
											<h3>ОТП банк</h3>
											<p>
												<a href="#">Поделиться</a>
											</p>
										</div>
										<div class="result-body clear">
											 <p>
												<em>Годовая процентная ставка</em> <span>18%</span>
											 </p>
											 <p>
												<em>Единовременная комиссия</em> <span>от 30 905 р.</span>
											 </p>
											 <p>
												<em>Срок кредита (дней)</em> <span>до 45 дней</span>
											 </p>
											 <p>
												<em>Ежемесячный платеж</em> <span>от 15 000 р.</span>
											 </p>
										</div>
										<div class="result-footer clear">
											<p>
												<a href="#">Подробно о предложении</a>
											</p>
											<p>
												<a href="#">Требования банка/ МФО</a>
											</p>
										</div>
									</li>
									<li>
										<div class="result-btn">
											<a class="btn btn-get-cash" href="#">Получить кредит</a>
										</div>
									</li>
								</ul>
							</div>
							
						</div>	

						<div class="result-item">
						
							<div class="result-bank">
								<ul>
									<li>
										<div class="result-logo">
											<img src="img/_bank01.png">
										</div>
									</li>
									<li class="clear">
										<div class="result-header clear">
											<h3>ОТП банк</h3>
											<p>
												<a href="#">Поделиться</a>
											</p>
										</div>
										<div class="result-body clear">
											 <p>
												<em>Годовая процентная ставка</em> <span>18%</span>
											 </p>
											 <p>
												<em>Единовременная комиссия</em> <span>от 30 905 р.</span>
											 </p>
											 <p>
												<em>Срок кредита (дней)</em> <span>до 45 дней</span>
											 </p>
											 <p>
												<em>Ежемесячный платеж</em> <span>от 15 000 р.</span>
											 </p>
										</div>
										<div class="result-footer clear">
											<p>
												<a href="#">Подробно о предложении</a>
											</p>
											<p>
												<a href="#">Требования банка/ МФО</a>
											</p>
										</div>
									</li>
									<li>
										<div class="result-btn">
											<a class="btn btn-get-cash" href="#">Получить кредит</a>
										</div>
									</li>
								</ul>
							</div>
							
						</div>	

						<div class="result-item">
						
							<div class="result-bank">
								<ul>
									<li>
										<div class="result-logo">
											<img src="img/_bank01.png">
										</div>
									</li>
									<li class="clear">
										<div class="result-header clear">
											<h3>ОТП банк</h3>
											<p>
												<a href="#">Поделиться</a>
											</p>
										</div>
										<div class="result-body clear">
											 <p>
												<em>Годовая процентная ставка</em> <span>18%</span>
											 </p>
											 <p>
												<em>Единовременная комиссия</em> <span>от 30 905 р.</span>
											 </p>
											 <p>
												<em>Срок кредита (дней)</em> <span>до 45 дней</span>
											 </p>
											 <p>
												<em>Ежемесячный платеж</em> <span>от 15 000 р.</span>
											 </p>
										</div>
										<div class="result-footer clear">
											<p>
												<a href="#">Подробно о предложении</a>
											</p>
											<p>
												<a href="#">Требования банка/ МФО</a>
											</p>
										</div>
									</li>
									<li>
										<div class="result-btn">
											<a class="btn btn-get-cash" href="#">Получить кредит</a>
										</div>
									</li>
								</ul>
							</div>
							
						</div>	
					

						
					</div>

				</div>
			
			</div>
			
		</div>
			
		<?}?>
		
		<?if($_GET['contact']){?>
			
			<div class="content">
			<div class="wrapper">

				<div class="page-content">
				
					<div class="page-body">
					
						<div class="page-list-content post shadow">
						
							<div class="section-title breadcrumbs">
								<a href="#">Главная</a>
								<em></em>
								<span>Контакты</span>
							</div>

							<div class="section-post">

								<div class="section-page-header">

									<h2 class="page-title">
										Контакты
									</h2>

								</div>
								
								<div class="section-page-body post-body">
									
									<?
										$DB = new MYSQL($config['db_user'], $config['db_pass'], $config['db_host'], $config['db_name'], true, true, false);
								
										$DB->connection();
										$query = 'SET CHARACTER SET UTF8';
										mysql_unbuffered_query($query);
										
										$DB->sql_query('SELECT * FROM settings WHERE type="contact_sentence"');
										$res = $DB->get_all();
										
										$config['contact_sentence'] = $res[0]['content'];
										
										$DB->sql_query('SELECT * FROM settings WHERE type="contact_address"');
										$res = $DB->get_all();
										
										$config['contact_address'] = $res[0]['content'];
										
										$DB->sql_query('SELECT * FROM settings WHERE type="contact_phone"');
										$res = $DB->get_all();
										
										$config['contact_phone'] = $res[0]['content'];
										
										$DB->sql_query('SELECT * FROM settings WHERE type="contact_mail"');
										$res = $DB->get_all();
										
										$config['contact_mail'] = $res[0]['content'];
										
										$DB->sql_query('SELECT * FROM settings WHERE type="contact_pos"');
										$res = $DB->get_all();
										
										$config['contact_pos'] = $res[0]['content'];
										
									?>
									
									<p><?echo $config['contact_sentence'];?></p>
									<ul>
										<li>Адрес: <span><?echo $config['contact_address'];?></span></li>
										<li>Телефон: <a href="mailto:"><?echo $config['contact_phone'];?></a></li>
										<li>E-mail: <a href="mailto:"><?echo $config['contact_mail'];?></a></li>
									</ul>
									
									<h3 class="page-title">
										Свяжитесь с нами
									</h3>
									
									<div class="contacts-form-box">
										
										<div class="contacts-form-inner">
									
											<form id="contacts-form" name="contacts-form">
												<fieldset class="clear">
													<label for="contacts-name">Your name</label>
													<input id="contacts-name" name="contacts-name" type="text" placeholder="Your name">
													<label for="contacts-subj">Subject</label>
													<input id="contacts-subj" name="contacts-subj" type="text" placeholder="Subject">
													<label for="contacts-msg">Your message</label>
													<textarea id="contacts-msg" name="contacts-msg" placeholder="Questions or Comments"></textarea>
													<input id="contacts-submit" name="contacts-submit" type="submit" value="Send">
												</fieldset>										
											</form>
											<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3-wQUGdeTj-S79yPPfR7Cjc3bLUlaRpg"></script>
											<script type="text/javascript">
												function initialize() {
													
													var position = new google.maps.LatLng( <?echo $config['contact_pos'];?> );
													
													var address = '<?echo $config['contact_address'];?>';
													var mapOptions = {
															center: position,  
															zoom: 16, 
															minZoom: 10, 
															maxZoom: 20, 
															scrollwheel: false, 
															mapTypeId: google.maps.MapTypeId.ROADMAP,
															styles: [{'featureType':'landscape','stylers':[{'saturation':-100},{'visibility':'on'}]},{'featureType':'poi','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'road.highway','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'road.arterial','stylers':[{'saturation':-100},{'visibility':'on'}]},{'featureType':'road.local','stylers':[{'saturation':-100},{'visibility':'on'}]},{'featureType':'transit','stylers':[{'saturation':-100},{'visibility':'simplified'}]},{'featureType':'administrative.province','stylers':[{'visibility':'off'},{'saturation':-100}]},{'featureType':'water','elementType':'labels','stylers':[{'visibility':'on'},{'saturation':-100}]},{'featureType':'water','elementType':'geometry','stylers':[{'hue':'#ffff00'},{'saturation':-100}]}]
														};

													var map = new google.maps.Map(document.getElementById('gmap'), mapOptions);

													var marker = new google.maps.Marker({
														position: position, 
														map: map 
													});
										 
													var infoWindow = new google.maps.InfoWindow({
														content: address
													});
											
													infoWindow.open(map, marker);
													
													google.maps.event.addListener(marker, 'click', function() {
														infoWindow.open( map, marker );
													});
												}
												
												google.maps.event.addDomListener(window, 'load', initialize);
											</script>
											<div class="gmap" id="gmap"></div>
										</div>
									</div>
									
								</div>
							</div>
							
						</div>
			
					</div>
					
				</div>
			
			</div>

		</div>
			
		<?}?>
		
		<div class="footer">
		
			<div class="footer-top clear">
				<div class="wrapper">
				
					<div class="footer-box">
					
						<h3 class="footer-logo">
							<a href="#">UniBank</a>
						</h3>
						
						<ul class="footer-list">
							
							<?
								$DB = new MYSQL($config['db_user'], $config['db_pass'], $config['db_host'], $config['db_name'], true, true, false);
								
								$DB->connection();
								$query = 'SET CHARACTER SET UTF8';
								mysql_unbuffered_query($query);
								
								$DB->sql_query('SELECT * FROM settings WHERE type="footer_link_1"');
								$res = $DB->get_all();
								
								for($i = 0; $i < count($res); $i++){
									echo '<li>';
									echo '<a href="'.$res[$i]['content'].'">'.$res[$i]['name'].'</a>';
									echo '</li>';
								}
							?>
												
						</ul>					
					
						<div class="footer-social">
							<a href="#facebook" class="fb"></a>
							<a href="#twitter" class="tw"></a>
							<a href="#gplus" class="gp"></a>
							<a href="#vk" class="vk"></a>
							<a href="#pinterest" class="pin"></a>
							<a href="#instagram" class="in"></a>
							<a href="#linkedin" class="lin"></a>
						</div>
					
					</div>
				</div>
			</div>
			<div class="footer-bottom clear">
				<div class="wrapper">
					
					<p class="copyright">
						
						<?
							$DB = new MYSQL($config['db_user'], $config['db_pass'], $config['db_host'], $config['db_name'], true, true, false);
							
							$DB->connection();
							$query = 'SET CHARACTER SET UTF8';
							mysql_unbuffered_query($query);
							
							$DB->sql_query('SELECT * FROM settings WHERE type="footer_copyright"');
							$res = $DB->get_all();
							
							echo $res[0]['content'];
						?>
					</p>
				
					<ul class="footer-bottom-menu">
					
						<?
							$DB = new MYSQL($config['db_user'], $config['db_pass'], $config['db_host'], $config['db_name'], true, true, false);
							
							$DB->connection();
							$query = 'SET CHARACTER SET UTF8';
							mysql_unbuffered_query($query);
							
							$DB->sql_query('SELECT * FROM settings WHERE type="footer_link_2"');
							$res = $DB->get_all();
							
							for($i = 0; $i < count($res); $i++){
								echo '<li>';
								echo '<a href="'.$res[$i]['content'].'">'.$res[$i]['name'].'</a>';
								echo '</li>';
							}
						?>
						
					</ul>					
				
				</div>
			</div>
		
		</div>			

	</body>
</html>
