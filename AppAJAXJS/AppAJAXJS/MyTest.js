
$(document).ready(function () {
  test();
});

function test() {
   var jsonData= SongSearch();
    //GetFromYunDa(jsonData);
}

function SongSearch() {
    var jsonData;
    //var songData1 = { "SongID": "3612742", "SongName": "My heart will go on", "Singer": "Dion", "Album": "Titanic", "Arranger": "" };
    var songData1 = { "SongID": "2480672", "SongName": "khafka kahfka kahfa ajfh", "Singer": "Tyler James", "Album": "The Unlikely Lad", "Arranger": "" };
    var songData = JSON.stringify(songData1);

    $.ajax({
        url: "http://emartctg.com/contents/",
        type: 'POST',
        crossDomain: true,
        data: { "getSongData": songData },
        dataType: 'json',
        async:false,
        success: function (response, textStatus, jqXHR) {
            jsonData= response;
			//document.write(jsonData);
			//alert(JSON.stringify(jsonData));
			document.write(JSON.stringify(jsonData));
        },
        error: function (responseData, textStatus, errorThrown) {
            console.warn(responseData, textStatus, errorThrown);
            //alert('CORS failed - ' + textStatus);
        }
    });

    return jsonData;
}

function GetFromYunDa(jsonData) {
    var userID = "ben";
    var isGetCache = false;

    var yundaData;
    $.ajax({
        type: "get",
        url: "http://112.74.135.127:9999/api/Products/GetBatchJosn",
        dataType: "json",
        data: { 'userID': userID, 'isGetCache': isGetCache },
        async:false,
        error: function (err) {
            console.log(err.statusText)
        },
        success: function (text) {
            yundaData=JSON.stringify(text);
        }
    });

    alert(jsonData);
    alert(yundaData);
}
