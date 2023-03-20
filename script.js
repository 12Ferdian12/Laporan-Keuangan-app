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
            containerData += "<td><a href='EditCategory.php?id="+data[i]['KategoriID']+"' class='btn btn-warning'>Edit</a> <button onClick='onDelete("+data[i]["KategoriID"]+")' class='btn btn-danger'>Delete</button></td>";
        containerData += '</tr>'
    }
    containerData += '</tbody></table>'
    document.getElementById("dataKategori").innerHTML = containerData;
}

function getUrlVars(param=null)
{
	if(param !== null)
	{
		var vars = [], hash; 
        // contoh kasus
        // url?id=7&keyword=odol&location=jakarta
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

        // url
        // id=7&keyword=odol&location=jakarta

        // hashes[0] = "id=7"
        // hashes[1] = "keyword=odol"
        // hashes[2] = "location=jakarta"

		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars[param];
	} 
	else 
	{
		return null;
	}

}

function getDataTransaksi(){
    xhr.open('GET','/JsTrain/Laporan-Keuangan-app/php/get-transaksi.php',true);
    xhr.send();

    xhr.onload = function(){
        let data = JSON.parse(xhr.response);
        inputDataTableTransaksi(data);
    }
}

function inputDataTableTransaksi(data){
    if(data.length === 0){
        document.getElementById("dataTransaksi").innerHTML = "<H1>" + errorNotFound + '</H1>'
        return;
    }

    var containerData = `
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Judul</th>
              <th scope="col">Category Name</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
    `
    
    for(var i = 0; i < data.length; i++){
        containerData += '<tr>'
            var index = i + 1
            var dataString = JSON.stringify(data[i]);
            containerData += '<td>' + index + '</td>' 
            containerData += '<td>' + data[i]['Tanggal'] + '</td>'
            containerData += '<td>' + data[i]['Judul'] + '</td>' 
            containerData += '<td>' + data[i]['namaKategori'] + '</td>'
            if (data[i]["Tipe"] == "Pengeluaran"){
                 containerData += '<td style="color:red">-' + new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(data[i]['Jumlah'])  + '</td>'
            }
            else{
                containerData += '<td style="color:green">+' + new Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(data[i]['Jumlah'])  + '</td>'
            }
           
            containerData += "<td><button onClick='onDelete("+data[i]["TransaksiID"]+")' class='btn btn-danger'>Delete</button></td>";
        containerData += '</tr>'
    }
    containerData += '</tbody></table>'
    document.getElementById("dataTransaksi").innerHTML = containerData;
}