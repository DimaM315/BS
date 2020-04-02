var countSub = 1;
var countMess = 1;
var countLiked = 1;
var countContact = 1;

$('#hover_el').bind('click', function(){
	if(countSub % 2){
		$('.section').css('cursor', 'pointer');
	}else{
		$('.section').css('cursor', 'default');
	};
	changeOpacity('.sub_section', countSub % 2);
			
	

	countSub++;
});

$('#my_message').bind('click', function(){
	changeOpacity('#sub_message', countMess % 2);
	countMess++;
});

$('#my_liked').bind('click', function(){
	changeOpacity('#sub_liked', countLiked % 2);
	countLiked++;
});

$('#my_contact').bind('click', function(){
	changeOpacity('#sub_contact', countContact % 2);
	countContact++;
});



function changeOpacity(selector, value){
	$(selector).css('opacity', value);
};



$('.message').bind('click', messActiveShow);


function messActiveShow(){
	$('.mess_active').removeClass().addClass('message');
	$(this).removeClass().addClass('mess_active');

	$('.mess_active').bind('click', messActiveHide);// подвешиваем функцию на созданные классы
}

function messActiveHide(){
	$(this).removeClass().addClass('message');
	$('.message').bind('click', messActiveShow); // класс message перезаписался у элемента, поэтому повторное назначение фун-и
}




getArticles(1);
getArticles(2);
getArticles(3);
function getArticles(id){
	$.ajax({
		url:'articles.php',
		type:'GET',
		data:{
			id:id
		},
		success:function(response, status){
			var article = JSON.parse(response);

			$('#feed').prepend(
				$('<div>',{
					class:'article',
					html:'<h2>'+article.title+'</h2><div class="article_text">'+article.text+
					'<hr><em>Автор:</em><a href="\\?userID='+article.author+'" class="a_post">'+article.author+'</a></div>'
				})
			);
		}
	})
}
