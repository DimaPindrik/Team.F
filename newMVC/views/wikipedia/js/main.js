function fetchPageID(title) {
    $.ajax({
        url: 'http://en.wikipedia.org/w/api.php',
        data: { action: 'query', titles: title, format: 'json' },
        dataType: 'jsonp',
        success: function (data) {
            var array = [data.query.pages];
            for(var key in array){
                fetchText(array[key][Object.keys(array[key])[0]].pageid);
            }
            //console.log(data.query.pages);
        }
    });
}
function fetchText(pageid) {
    $.ajax({
        url: 'http://en.wikipedia.org/w/api.php',
        data: { action: 'parse', pageid: pageid, format: 'json' },
        dataType: 'jsonp',
        success: function (data) {
            output.innerHTML = JSON.stringify(data.parse.text);
            console.log(JSON.stringify(data.parse.text));
            //console.log(data.query.pages);
        }
    });

}

function changeIframe(input) {
    document.getElementById("wikiPage").src = "https://en.wikipedia.org/wiki/" + input;
}





//var page=document.getElementById("page");
//var btn=document.getElementById("btn");
//
//btn.addEventListener("click", function(){
//    var myRequest = new XMLHttpRequest();
//    var searchValue = document.getElementById('text').value;
//    if (searchValue !== '') {
//        searchValue = "barcelona";
//    }
//    var a='https://en.wikipedia.org/w/api.php?action=parse&format=json';
//    myRequest.open('GET', a, true);
//    myRequest.responseType ='text';
//    var data = JSON.parse(myRequest.responseText);
//
//    for (var q = 0; q <= data[1].length - 1; q++) {
//        var wikiTitle = data[1][q];
//        var wikiDes = data[2][q];
//        var wikiLink = data[3][q];
//        var fullLink = "<li class='list-group-item animated bounceInUp'><a class='modalButton' data-toggle='modal' data-target='#myModal' data-src='" + wikiLink + "'>" + "<i class='fa fa-globe'> </i> " + wikiTitle + "<br /><span class='small'>" + wikiDes + "</span></a></li>";
//        document.getElementById('wikilogo').style.display = "none";
//        document.getElementById("page").innerHTML += fullLink;
//    }
//});
//
//
//
//
