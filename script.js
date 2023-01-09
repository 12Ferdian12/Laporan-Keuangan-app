
var xmlHttp = new XMLHttpRequest();
xmlHttp.open( "GET", 'https://jsonplaceholder.typicode.com/posts', false ); // false for synchronous request
xmlHttp.send( null );
console.log(xmlHttp.responseText);