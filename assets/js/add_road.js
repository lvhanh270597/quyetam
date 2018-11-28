function add(){
    id += 1;
    var s = '';
    for (var k in start){
        if (start.hasOwnProperty(k)) {
            s += '<option value="'+k+'">'+start[k]+'</option>';             
        }
    }
    var div = document.createElement('div');
    div.className = 'col-md-4';
    div.id = id.toString();
    div.innerHTML = '\n' +
    '<div class="md-form mb-0"> \n' + 
        '<select class="browser-default custom-select mb-4" name="start[]" required>\n' +
            '<option value="" disabled selected>Bắt đầu</option>\n' +        
            s + '\n' +
        '</select>\n' +
    '</div>';

    var div2 = document.createElement('div');
    div2.className = 'col-md-4';
    div2.id = id.toString();
    div2.innerHTML = '\n' +
    '<div class="md-form mb-0"> \n' + 
        '<select class="browser-default custom-select mb-4" name="finish[]" required>\n' +
            '<option value="" disabled selected>Kết thúc</option>\n' +        
            s + '\n' +
        '</select>\n' +
    '</div>';

    var div3 = document.createElement('div');
    div3.className = 'col-md-4';    
    div3.id = id.toString();
    div3.innerHTML = '\n' +
    '<div class="md-form mt-2"> \n' + 
        '<label class="btn btn-sm btn-danger waves-effect waves-light" onclick="remove('+id.toString()+')">Xóa</label> \n' +
    '</div>';

    var road_info = document.getElementById('road_info');
    road_info.appendChild(div);
    road_info.appendChild(div2);
    road_info.appendChild(div3);
}

function remove(id){
    id = id.toString();
    document.getElementById(id).remove();
    document.getElementById(id).remove();
    document.getElementById(id).remove();
}