function createElement( str ) {
    var frag = document.createDocumentFragment();

    var elem = document.createElement('div');    
    elem.innerHTML = str;

    while (elem.childNodes[0]) {
        frag.appendChild(elem.childNodes[0]);
    }    
    return frag;
}
function add(){
    var divs = document.getElementById('1').innerHTML;
    var cln = createElement('<br> <div class="view gradient-card-header mdb-color lighten-3">                                \n' +
    '<h5 class="mb-0 font-weight-bold">Thêm mới</h5>                                \n' + 
    '</div>\n' +   divs);
    
    var calendar_info = document.getElementById('calendar_info');
    calendar_info.appendChild(cln);   
    var start_from = document.getElementsByName('start_from[]');
    start_from[start_from.length - 1].value = start_from[0].value;
    var finish_to = document.getElementsByName('finish_to[]');
    finish_to[finish_to.length - 1].value = finish_to[0].value;
    var prices = document.getElementsByName('price[]');
    prices[prices.length - 1].value = prices[0].value;
    var timestarts = document.getElementsByName('timestart[]');
    timestarts[timestarts.length - 1].value = timestarts[0].value;
    var bat = document.getElementsByName('bat[]');
    bat[bat.length - 1].value = bat[0].value;
    var e = document.getElementsByName("thu[]");
    e[e.length - 1].value = e[0].value;    
    
}
