



var valueCount

var price

var cart = document.getElementsByClassName('cart-btn-up');


for(i = 0; i < cart.length; i++){
    var btn = cart[i];

    //lets begin logic to dynamically increase cart qty and price

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        var btnClicked = e.target;

        //get input value
        var qtyinput = btnClicked.parentElement.parentElement.children[1].children[2];

        //assign value to var value

        valueCount = qtyinput.value;

        valueCount++

        qtyinput.value = valueCount

        var itemPrice = qtyinput.parentElement.children[0];
        var priceChange = qtyinput.parentElement.children[1];

        var price = itemPrice.value;

        var total = price * valueCount;

        var changePrice = priceChange.parentElement.parentElement.parentElement.parentElement.parentElement.previousElementSibling;

        var text = changePrice.children[0].firstElementChild.children[0] //.textContent;

        var subTotal = total.toFixed(2)

        priceChange.value = subTotal

        text.textContent = subTotal;
        //console.log(itemPrice);
    })
}

var down = document.getElementsByClassName('cart-btn-down');

for(i = 0; i < down.length; i++){
    var btn = down[i];

    btn.addEventListener('click', (e) => {
        e.preventDefault();
        btnClicked = event.target;

        //get input value
        var qtyinput = btnClicked.parentElement.parentElement.children[1].children[2];

        if(qtyinput.value > 1){
            valueCount = qtyinput.value;

            valueCount--;

            qtyinput.value = valueCount;

            var itemPrice = qtyinput.parentElement.children[0];
            var priceChange = qtyinput.parentElement.children[1];

            price = itemPrice.value;

            var total = price * valueCount;

            var changePrice = priceChange.parentElement.parentElement.parentElement.parentElement.parentElement.previousElementSibling;

            var text = changePrice.children[0].firstElementChild.children[0] //.textContent;

            var subTotal = total.toFixed(2)

            priceChange.value = subTotal

            text.textContent = subTotal;

            console.log(subTotal)
        }

    })
}



/**var up = document.getElementsByClassName('cart-btn-up');

//console.log(up)

for(i = 0; i < up.length; i++){
    var btn = up[i];
    
    //lets write logic to increase cart quantity
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        var btnClicked = event.target;
        //console.log(btnClicked)
        var qtyInput = btnClicked.parentElement.children[3]
        valueCount = qtyInput.value;

        
        valueCount++
        console.log(valueCount)
        
        qtyInput.value = valueCount;

        var itemPrice = btnClicked.parentElement.children[2];
        var itemPriceSend = btnClicked.parentElement.children[1];

        var price = itemPrice.value;

        var total = price * valueCount;

        //lets dynamically change price in view page
        var priceChange = btnClicked.parentElement.parentElement.parentElement.parentElement.previousElementSibling

        var priceChangeTwo = priceChange.firstElementChild.firstElementChild.lastChild.lastChild;

        var subTotal = total.toFixed(2);

        priceChangeTwo.data = subTotal

        itemPriceSend.value = subTotal


        //console.log(itemPriceSend)
    })
}*/

/**var scrollBtn = document.querySelector('.top-btn').addEventListener('click', () =>{
    window.scrollTo({top:0, behavior: 'smooth'})
})

console.log(scrollBtn)*/

console.log('hello')

/* Open Menu */
const sideMenu = document.getElementById('adminNav');

const openMenu = document.getElementsByClassName('ad-1');

const closeMenu = document.getElementsByClassName('adminNav-top')

if(document.querySelector('.ad-1')){

document.querySelector('.ad-1').addEventListener('click', function(){
    sideMenu.style.display = 'block';

})
}

if(document.querySelector('.adminNav-top')){

document.querySelector('.adminNav-top').addEventListener('click', () => {
    sideMenu.style.display = 'none'
})

}

//console.log(closeMenu)


