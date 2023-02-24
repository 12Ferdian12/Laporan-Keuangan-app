var xhr = new XMLHttpRequest();
const errorNotFound = "tidak ada data";

function getDataKategori(){
    xhr.open('GET','/JsTrain/Laporan-Keuangan-app/php/get-kategori.php',true);
    xhr.send();

    xhr.onload = function(){
        let data = JSON.parse(xhr.response);
        inputDataTableKategori(data);
    }
}



function inputDataTableKategori(data){
    if(data.length === 0){
        document.getElementById("dataKategori").innerHTML = "<H1>" + errorNotFound + '</H1>'
        return;
    }

    var containerData = '<table class="table"><thead><tr><th scope="col">ID</th><th scope="col">NAME</th><th scope="col">ACTION</th></tr></thead><tbody>'
    
    for(var i = 0; i < data.length; i++){
        containerData += '<tr>'
            var index = i + 1
            containerData += '<td>' + index + '</td>' + '<td>' + data[i]['namaKategori'] + '</td>'
            var dataString = JSON.stringify(data[i]);
            containerData += "<td><button href='EditCategory.php?id="+data[i]['KetegoriID']+"' class='btn btn-warning'>Edit</button> <button class='btn btn-danger'>Delete</button></td>";
        containerData += '</tr>'
    }
    containerData += '</tbody></table>'
    document.getElementById("dataKategori").innerHTML = containerData;
}