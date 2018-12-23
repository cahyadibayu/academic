<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>Academic Guide UI</title>
  <link rel="stylesheet" href="jquery.mobile-1.4.5.css" /><!-- code.jquery.com/mobile/1.4.5 -->
  <link rel="stylesheet" href="style.css" />
  <script src="jquery-1.11.1.js"></script><!-- from code.jquery.com -->
  <script src="jquery.mobile-1.4.5.js"></script><!-- code.jquery.com/mobile/1.4.5 -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<script type="text/javascript">

function getObjects(obj, key, val) {
  var objects = [];
  for (var i in obj) {
      if (!obj.hasOwnProperty(i)) continue;
      if (typeof obj[i] == 'object') {
          objects = objects.concat(getObjects(obj[i], key, val));
      } else
      //if key matches and value matches or if key matches and value is not passed (eliminating the case where key matches but passed value does not)
      if (i == key && obj[i] == val || i == key && val == '') { //
          objects.push(obj);
      } else if (obj[i] == val && key == ''){
          //only add if the object is not already in the array
          if (objects.lastIndexOf(obj) == -1){
              objects.push(obj);
          }
      }
  }
  return objects;
}


function specific(myNum,address){
  $.getJSON("data.json",function(data){
    $(address).empty();
    getObjects(data,'id',myNum);
      $.each(objects,function(i,article){
          $(address).append(generateArticleLink(article));
      });
    $(address).listview('refresh');
  });
}

specific('1','#data1');



  /*
  $.getJSON("data.json",function(articles){
    $('#data1').empty();
    $('#data2').empty();
    $('#data3').empty();
    $('#data4').empty();

    $.each(articles,function(i,article){
      $('#data1').append(generateArticleLink(article));
      $('#data2').append(generateArticleLink(article));
      $('#data3').append(generateArticleLink(article));
      $('#data4').append(generateArticleLink(article));
    });

    $('#data1').listview('refresh');
    $('#data2').listview('refresh');
    $('#data3').listview('refresh');
    $('#data4').listview('refresh');
  });
*/

  function generateArticleLink(x){
    return '<li><a href="javascript:void(0)'
          + '" onclick="goToArticleDetailPage(\''
          + x.title
          + '\',\''
          + x.picUrl
          + '\',\''
          + x.description
          + '\',\''
          + x.refUrl + '\')">'
          + x.title
          + '</a></li>';
  }

  function goToArticleDetailPage(articleName, articlePicUrl, articleDescription, articleRefURL){
    var articlePage = $("<div data-role='page' id='detail'><header data-role='header' data-position='fixed'><a data-rel='back' data-direction='reverse' href=''#home'>Back</a><h1>Academic Guide UI</h1></header><h1>"
                  + articleName + "</h1><div data-role='content'><img border='0' src='"
                  + articlePicUrl + "' width=204 height=288><img><p>"
                  + articleDescription + "</p><p>For more information visit : <a href='http://"
                  + articleRefURL + "' rel='external'>"
                  + articleRefURL + "</a></p></div>");
    articlePage.appendTo( $.mobile.pageContainer );
    $.mobile.changePage( articlePage );
  }

</script>
<body>
  <div data-role="page" id="home">
    <header data-role="header" data-position="fixed">
    <h1>Academic Guide UI</h1>
    <a href="#panelL1" data-iconpos="notext" data-icon="bars">Menu</a>
    <a href="#search" data-iconpos="notext" data-icon="search">Search</a>
  </header>

  <!-- ####################################################################################################################################### -->
  <div data-role="panel" id="panelL1" data-position="left" data-display="overlay" data-dismissible="true" data-theme="b" class="panel-0pad">
    <ul data-role="listview" id="panelList">
      <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
        <h4>Fakultas</h4>
        <ul data-role="listview" data-inset="false" id="data1">

        </ul>
      </div>
      <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
        <h4>Pembayaran</h4>
        <ul data-role="listview" data-inset="false" id="data2">

        </ul>
      </div>
      <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
        <h4>Websites</h4>
        <ul data-role="listview" data-inset="false" id="data3">

        </ul>
      </div>
      <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
        <h4>Beasiswa</h4>
        <ul data-role="listview" data-inset="false" id="data4">

        </ul>
      </div>
    </ul>
  </div>
  <div class="bg-img"></div>
  </div>

</body>
</html>
