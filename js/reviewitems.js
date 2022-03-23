const iprice=document.querySelectorAll('.price');
const iquantity=document.querySelectorAll('.quantity');
const  itotal=document.querySelectorAll('.itotal');
const totalprice=document.querySelector('#total-price');
var total=0;
function subtotal() {
total=0;
  for (var i = 0; i < iprice.length; i++) {
itotal[i].value=(iprice[i].innerHTML)*(iquantity[i].value);
total=total+(iprice[i].innerHTML)*(iquantity[i].value);

  }

  totalprice.innerHTML=total;
  //document.querySelector('.quantity-form').submit();
}





$(document).ready(function(){
  var itemsarray=[];
  const itemsmainarray=[];
  iquantity.forEach((Element) => {
    Element.addEventListener("change",()=>{
      if (itemsmainarray.length!=0 ) {

        itemsmainarray.forEach((ArrayElement) => {

          if (ArrayElement.includes(Element.id)) {
         ArrayElement[1]=Element.value;

          }
          else {
            itemsarray.push( Element.id);
            itemsarray.push( Element.value);
            itemsmainarray.push(itemsarray);

          }
          itemsarray=[];
        });

      }

    else {
      itemsarray.push( Element.id);
      itemsarray.push( Element.value);
      itemsmainarray.push(itemsarray);
      itemsarray=[];
    }
    console.log(itemsmainarray);

});

  });
  $("#order-items").click(function(){
console.log(itemsmainarray);
    $.ajax({
      type:"POST",
      url:'../functions.php',
      data:{'itemsvalues':itemsmainarray},
      success:function(data){
         console.log(data);
      }
    });
  });

});
