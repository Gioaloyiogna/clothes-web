//page loader
$(window).on('load',function () {
	$(".loader").fadeOut(1000);
	$(".body-content").fadeIn(1000);
})


//chopping cart
const Cloth= document.querySelector(".cloth");
const AddToCart=document.querySelectorAll(".add-cart");
const shoppingcart=document.querySelector(".shopping-cart");
const shopping=document.querySelector(".shopping");
const products=document.querySelector(".products").children;
const cross=document.querySelector(".bx-x");
const Order=document.querySelector("#order");
const Form=document.querySelector("#form");
const clientinfo=document.querySelector(".client-info");
const controllerLeft=document.querySelector(".controllers .fa-angle-left");
const controllerRight=document.querySelector(".controllers .fa-angle-right");
let SliderArray=[{"text":"Register and get discounts","link":"our clothes"},{"text":"some text here <br> some text here","link":"our clothes"},{"text":"some text here","link":"our clothes"}];
var index=0;


function LiveSearch(){

	var searchval=$('.searchbar').val().toLowerCase();
	if ( searchval!='') {
		$('.search-result').css('display','block');
		$.ajax({
			type:"POST",
			url:"functions.php",
			data:{'dsearch':searchval},
			dataType:"text",
			async:false,
			success:function(data){
      $('.result-div').html(data);
			$('.loader').css('display','none');
			}
		});

	}
	else {
		$('.search-result').css('display','none');
	}

}
/*$('.item').click(function(){
	$('.item-bg').animate({
		display:block,
		height:"toggle";
	}, 5000
});*/
document.querySelectorAll('.item').forEach(element => {
    element.addEventListener('mouseover', (event)=>{
    event.currentTarget.children[1].classList.add('Showproduct');
    });
    element.addEventListener('mouseout', (event)=>{
        event.currentTarget.children[1].classList.remove('Showproduct');
        });
});
//silder
controllerRight.addEventListener("click", ()=>{
	/*console.log(SliderArray[i]);
document.querySelector(".carousel-content h1").innerHTML=SliderArray[i];*/

	if(index<SliderArray.length){
	document.querySelector(".carousel-content h1").innerHTML=SliderArray[index].text;

}
else {
	index=0;
	document.querySelector(".carousel-content h1").innerHTML=SliderArray[index].text;

}
index++;
//console.log(index);
});
		controllerLeft.addEventListener("click", ()=>{
			/*console.log(SliderArray[i]);
		document.querySelector(".carousel-content h1").innerHTML=SliderArray[i];*/

		if(index==0){
			document.querySelector(".carousel-content h1").innerHTML=SliderArray[index].text;
      index=SliderArray.length;
		}
		else {

document.querySelector(".carousel-content h1").innerHTML=SliderArray[index].text;
		}
		index--;



console.log(index);
		});



[...products].forEach(Element=>{
	Element.addEventListener('mouseover', ()=>{
	Element.children[2].children[2].children[1].style.display="block";
	Element.children[2].children[2].children[0].style.display="none";
});
});

[...products].forEach(Element=>{
	Element.addEventListener('mouseout', ()=>{
	Element.children[2].children[2].children[1].style.display="none";
	Element.children[2].children[2].children[0].style.display="block";
});
});

// hiding and showing search bar
$("#searchicon").click(function () {
	 $("#search-bar").toggle('slow');
});
//showin mennu bar
$(".menu-bar i").click(function () {
	 $("#hidden-menu-links").toggle('slow');
});

$(window).resize(function () {
	if ($(window).innerWidth()>1030) {
		$("#hidden-menu-links").css('display','none');
	}
});
//updating likes

$("#like").click(function(){
	alert("Sorry, we can't record your like for now. Thanks, for showing your interest to supporting us.")
	//$("#like").css('color','#f08632');


});
//live search
document.querySelector('.view-all').addEventListener('click', function () {
	    if (document.querySelector('.all-items').classList.contains('show-items')) {
				document.querySelector('.products').classList.remove('hide-items');
	    	  document.querySelector('.all-items').classList.remove('show-items');
					document.querySelector('.view-all button').innerHTML='View All';

	    }
			else {
				document.querySelector('.all-items').classList.add('show-items');
				  document.querySelector('.products').classList.add('hide-items');
					document.querySelector('.view-all button').innerHTML='Hide';
			}
})

/*chat bot*/
$('#chatus').click(function(){
	$('.chat-content').toggle('slow');
});
$('document').ready(function(){
	setTimeout(function(){
		$('#chatus').toggle('slow');
	}, 20000);

});
$('.chat-content').click(function(){
	$('.chat-content').css('display','block');
});
