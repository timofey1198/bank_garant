function parseInfo(url){
	
	//alert(document.getElementsByName('radiobox3').value);
	
	if(url.length == 11){
		radio_b11.removeAttribute('checked');
		radio_b12.removeAttribute('checked');
		radio_b13.removeAttribute('checked');
		radio_b14.removeAttribute('checked');
		radio_b12.setAttribute('checked', '');
	}
	
	if(url.length == 19){
		radio_b11.removeAttribute('checked');
		radio_b12.removeAttribute('checked');
		radio_b13.removeAttribute('checked');
		radio_b14.removeAttribute('checked');
		radio_b11.setAttribute('checked', '');
	}
	
	$.ajax({
		type: "POST",
		url: './lib/parse.php?url='+url,
		success: function(data) {
			$('#content').html(data);
		}
	});
	
}

function checkForm(){
	
	rn_ok = 0; // Реестровый номер
	info_ok = 0; // Информация о компании
	sg_ok = 0; // Сумма гарантии
	tg_ok = 0; // Срок гарантии
	cf_error = 0;
	
	if(regnum.value != ''){
		rn_ok = 1;
	}else{
		cf_error = 1;
		alert('Реестровый номер не заполнен!');
	}
	
	if(info.value != '' && !cf_error){
		info_ok = 1;
	}else{
		cf_error = 1;
		alert('Информация о компании не указана!');
	}
	
	if(garant.value != '' && !cf_error){
		sg_ok = 1;
	}else{
		cf_error = 1;
		alert('Сумма гарантии не указана!');
	}
	
	if(term.value != '' && !cf_error){
		if(-1 < term.value.indexOf('/')){
			tg_ok = 1;
		}else{
			alert('Срок гарантии указан неверно!');
		}
	}else{
		cf_error = 1;
		alert('Срок гарантии не указан!');
	}
	
	if(rn_ok && info_ok && sg_ok && tg_ok){
		mainForm.submit();
	}
	
}

function openModal(){

	modalwindow.style.zIndex = '30';	
	modalwindow.style.transform = 'translateX(-50%) translateY(-50%) scale(1)';	
	modalwindow.style.opacity = '1';	
	
}

function closeModal(){

	//modalwindow.style.zIndex = '-30';	
	modalwindow.style.transform = 'translateX(-50%) translateY(-50%) scale(0.95)';	
	modalwindow.style.opacity = '0';	
	setTimeout(function(){modalwindow.style.zIndex = '-30'}, 200);
	
}

function modalInfo(){
	
	if(radiobox3_modal.value == 1){radiobox3.value = '0';}else{radiobox3.value = '1';}
	if(radiobox4_modal.value == 1){radiobox4.value = '0';}else{radiobox4.value = '1';}
	if(radiobox5_modal.value == 1){radiobox5.value = '0';}else{radiobox5.value = '1';}
	info.value = info_modal.value;
	
}