const search = document.getElementById('search');
const matchList = document.getElementById('match-list');
//end Ajouter au panier

//selection du produit
function select(select) {
    search.value = select;
    matchList.innerHTML = '';
}
//search states.json and filter it
const searchStates = async searchText => {
    const res = await fetch('../facture.php');
    const states = await res.json();

    //get matches to current text input
    let matches = states.filter(state => {
        const regex = new RegExp(`^${searchText}`, 'gi');
        return state.nome.match(regex) || state.numero.match(regex);
    });

    if (searchText.length === 0) {
        matches = [];
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
        <div id="sugg2" class="card card-body mt-2 mb-1" onclick="select('${match.nome}');">
        <h6>${match.nome}<span class="text-primary"><bold>(${match.numero})</bold></span></h6>
        </div>
        `).join('');

    matchList.innerHTML = html;
       
    }
}

search.addEventListener('input', () => searchStates(search.value));


