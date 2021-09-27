const search = document.getElementById('search');
const codeinterne = document.getElementById('codeinterne');
const type = document.getElementById('type');
const search2 = document.getElementById('search2');
const type2 = document.getElementById('type2');
const qty2 = document.getElementById('qty2');
const codeinterne2 = document.getElementById('codeinterne2');
const prixunit = document.getElementById('prixunit');
const matchList = document.getElementById('match-list');
const qty = document.getElementById('qty');
const totalprix = document.getElementById('totalprix');
const idProduit = document.getElementById('id_produit');


const pannier = `

<ul id="ligne{{num0}}" class="colonne{{x}} items">
<button id="delbtn" onclick="deleteitem('ligne{{num3}}', 1, {{num1}});deletefromarray('{{codeInterne}}'); return false;">✖</button>
<li><input type="text" name="name" value="{{name}}" disabled></li>
<li><input type="text" name="pu" value="{{pu}}" disabled></li>
<li><input type="text" name="qt{{num6}}" value="{{qt}}"></li>
<li><input type="text"  id="p{{num2}}" value="{{total}}" disabled></li>
<li><input type="hidden" name="code{{code}}" value="{{code1}}"></li>
</ul>
`;
num = 0;
count = 1;
count0 = 0;
response = [0, 0, [0]];

//code des produits dans le panier
itemsCart = [];
function addToCart(params) {
    itemsCart.push(params);
    return itemsCart;
}
function itemIsSet(params) {
    index = itemsCart.indexOf(params);
    if (index != (-1)) {
        return true;
    }else{
        return false;
    }
}
//fin code des produits

//reset
function resetinput() {
    
    search.value = '';
    codeinterne.value = '';
    codeinterne2.value = '';
    type2.value = '';
    search2.value = '';
    prixunit.value = '';
    totalprix.value = '';
    qty.value = '';
    qty2.value = '';
}
// end reset

//empty the cart
function resetcart() {
    const div2 = document.getElementById('div2');
    div2.innerHTML = '';
    const prixnettotal = document.getElementById('prixnet');
    prixnettotal.value = '00';
    resetItemsCart();

    return response = [0, 0, [0]];
}
function resetItemsCart(){
    itemsCart = [];
return itemsCart;
}
//end reset cart

//supprimer une ligne 
function deleteitem(x, y, z) {
    this.item = x;
    this.state = y;
    this.itemindex = z;
    const carts = document.querySelectorAll("#"+this.item);
    for (let i = 0; i < carts.length; i++) {
        carts[i].innerHTML ='';
        carts[i].classList.remove('items');
    }
    var index = response[2].indexOf(this.itemindex);
    num = num - 1;
    console.log("produit restant="+num);
    response[2].splice(index, 1);
    response = [num, this.state, response[2]];
    totalprixnet()
    return response;
}
function deletefromarray(params) {
    var index = itemsCart.indexOf(params);
    itemsCart.splice(index, 1);
     return itemsCart;
}
//fin suprimer une ligne

function andranana() {
    console.log(itemsCart)
}

response = response;
//fin suprimer une ligne 
function totalprixnet() {
    b = response[0] + 1;
    count0 = 1;
    console.log(b);
    totals = [];
    total = 0;
    console.log(response[2]);
    produits = 0;
    for (let a = 1; a < b; a++) {
      n = response[2][count0++];
        var produits = document.getElementById('p'+(n)).value;
        totals.push(produits);
    }
    for (let i = 0; i < totals.length; i++) {
        total = total + Number(totals[i]);
    }
    const prixnettotal = document.getElementById('prixnet');
    prixnettotal.value = total;
}
//Ajouter au panier

//function pair 
function isPair(params) {
    pair = [0];
    k = 0;
    o = [0];
    for (let i = 0; i < 50; i++) {
        k = k + 2;
        o.push(k);
    }
    resp = o.indexOf(params);
    if (resp == (-1)) {
        res = false;
    }
    else{
        res = true;
    }
    return res;
}
//end function pair
//<li><a>0{{num}}</a></li>
function ajouter() {
    
    if (search.value != '') {
    
            stock = 0;
            stock = codeinterne.value;
            qtt = qty.value;
            // verification si le produit est dans le panier
            if (itemIsSet(codeinterne2.value)) {
                alert('Ce produit éxiste déjà dans votre panier!');
            }
            else{
                    //verification si le stock est suffisant
                    perm = Number(stock) - Number(qtt)
                    if (perm >= 0) {
                        //ajouter du produit dans le panier
                        addToCart(codeinterne2.value);
                        console.log(stock);
                        limit = 30;
                        num = response[0];
                        state = response [1];
                        count0 = response[0];
                        num++;
                        count++;
                        count0++;
                        console.log("produit ajouté = "+num)
                        if (num >= limit) {
                                alert('La limite par panier est de 30...');
                                }
                            if (isPair(num) == true) {
                                x = 3;  
                            }
                            else{
                                x = 2;
                            }
                        
                        let cart = pannier
                        cart = cart.replace('{{num0}}', count)
                        cart = cart.replace('{{num}}', num)
                        cart = cart.replace('{{num1}}', num)
                        cart = cart.replace('{{num2}}', count0)
                        cart = cart.replace('{{num6}}', count0)
                        cart = cart.replace('{{num3}}', count)
                        cart = cart.replace('{{x}}', x)
                        cart = cart.replace('{{name}}', search2.value)
                        cart = cart.replace('{{pu}}', prixunit.value)
                        cart = cart.replace('{{qt}}', qty2.value)
                        cart = cart.replace('{{total}}', totalprix.value)
                        cart = cart.replace('{{codeInterne}}', codeinterne2.value)
                        cart = cart.replace('{{code}}', count0)
                        cart = cart.replace('{{code1}}', codeinterne2.value)
                        
                        if (num < limit) {
                            document.querySelector('#div2').insertAdjacentHTML('beforeend', cart)
                            resetinput();
                            response[2].push(count0);
                            }
                        else{
                            num = num - 1;
                        }
                        //fin de l'ajout du produit dans le panier

                    }else{alert('STOCK insuffisant... En STOCK: '+stock)}
                    //verification si le stock est suffisant
            }
            // verification si le produit est dans le panier
    }else{alert('Veuillez inserer le nom ou le code du produit')}


    return response = [num, 0, response[2]]; 
}
//end Ajouter au panier

//selection du produit
function select(select, code, prix, quantidade) {
    search.value = select;
    search2.value = select;
    codeinterne.value = quantidade;
    codeinterne2.value = code;
    prixunit.value = prix;
    type2.value = type.value;
    matches = [];
    matchList.innerHTML = '';
    qty.value = 1;
    qty2.value = qty.value;
    totalprix.value = (Number(qty2.value)*Number(prix));
    qty.addEventListener('input', function (qtt) {
        qty2.value = qty.value;
        totalprix.value = (Number(qty2.value)*Number(prix));
    });
   
}
//search states.json and filter it
const searchStates = async searchText => {
    const res = await fetch('../produits.php');
    const states = await res.json();

    //get matches to current text input
    let matches = states.filter(state => {
        const regex = new RegExp(`^${searchText}`, 'gi');
        return state.descricao.match(regex) || state.codInterno.match(regex);
    });

    if (searchText.length === 0) {
        matches = [];
        codeinterne.value = '';
        codeinterne2.value = '';
        type2.value = '';
        search2.value = '';
        prixunit.value = '';
        totalprix.value = '';
        qty.value = '';
        qty2.value = '';
        matchList.innerHTML = '';
    }
    if (matches.length > 0 && matches.length < 4) {
       
        outputHTML(matches);
    }
};

//show results in HTML 
const outputHTML = matches => {
   
    if (matches.length > 0) {
        const html = matches.map(match => `
        <div id="sugg" class="card card-body mt-2 mb-1" onclick="select('${match.descricao}', '${match.codInterno}', '${match.venda}', '${match.quantidade}');">
        <h6>${match.descricao} (${match.codInterno}) <span class="text-primary"><bold>${match.venda} Ar</bold></span></h6>
        </div>
        `).join('');

    matchList.innerHTML = html;
       
    }
}

search.addEventListener('input', () => searchStates(search.value));





























































































