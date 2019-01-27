$(document).ready(function(){    

	$('input.phone').mask("+7 (999) 999-99-99");
	
	$(".gallery_items .gallery_item .delete").click(function(){
		var it = $(this);
		var id = it.data('id');
		$.ajax({
			type: 'post', 
			url: '/gallery/delitem/',
			data: {"id":id },
			success: function(data) {
				if(data=="ok"){
					it.parent().remove();
				}
			},
			error: function(error) {
				console.log(error);
			}
		});	
	})
	
	$("#events-title").keyup(function(){
		$("#events-alias").val(
			translit( $(this).val() )
		);
		
	});

	$("#concerts-title").keyup(function(){
		$("#concerts-alias").val(
			translit( $(this).val() )
		);
		
	});

	$("#gallery-title").keyup(function(){
		$("#gallery-alias").val(
			translit( $(this).val() )
		);
		
	})
	$("#pages-title").keyup(function(){
		$("#pages-alias").val(
			translit( $(this).val() )
		);
		
	})
	/* ********************************************************************************************************* */
	function translit(str){
		var space = '-'; 
		var text = str.toLowerCase();
		var transl = {
		'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd', 'е': 'e', 'ё': 'e', 'ж': 'zh', 
		'з': 'z', 'и': 'i', 'й': 'j', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
		'о': 'o', 'п': 'p', 'р': 'r','с': 's', 'т': 't', 'у': 'u', 'ф': 'f', 'х': 'h',
		'ц': 'c', 'ч': 'ch', 'ш': 'sh', 'щ': 'sh','ъ': space, 'ы': 'y', 'ь': space, 'э': 'e', 'ю': 'yu', 'я': 'ya',
		' ': space, '_': space, '`': space, '~': space, '!': space, '@': space,
		'#': space, '$': space, '%': space, '^': space, '&': space, '*': space, 
		'(': space, ')': space,'-': space, '\=': space, '+': space, '[': space, 
		']': space, '\\': space, '|': space, '/': space,'.': space, ',': space,
		'{': space, '}': space, '\'': space, '"': space, ';': space, ':': space,
		'?': space, '<': space, '>': space, '№':space
		}
		var result = '';
		var curent_sim = '';
		for(i=0; i < text.length; i++) {
			if(transl[text[i]] != undefined) {
				 if(curent_sim != transl[text[i]] || curent_sim != space){
					 result += transl[text[i]];
					 curent_sim = transl[text[i]];
				}
			}else {
				result += text[i];
				curent_sim = text[i];
			}                              
		}          
		result = TrimStr(result);               
		return result;
	}
	
	function TrimStr(s) {
		s = s.replace(/^-/, '');
		return s.replace(/-$/, '');
	}
	
	
})