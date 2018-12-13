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

<body>

  <!-- Home Page -->
  <div data-role="page" id="home">
    <header data-role="header" data-position="fixed">
    <h1>Academic Guide UI</h1>
    <a href="#panelL1" data-iconpos="notext" data-icon="bars">Menu</a>
    <a href="#search" data-iconpos="notext" data-icon="search">Search</a>
  </header>

  <!-- ####################################################################################################################################### -->
  <div data-role="panel" id="panelL1" data-position="left" data-display="overlay" data-dismissible="true" data-theme="b" class="panel-0pad">
    <ul data-role="listview" id="panelList">
      <li data-icon="false"><a data-rel="close" href="#home">Beranda</a></li>
      <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
        <h4>Fakultas</h4>
        <ul data-role="listview" data-inset="false">
          <li>Fakultas Kedokteran</li>
          <li>Fakultas Kedokteran Gigi</li>
          <li>Fakultas Teknik</li>
        </ul>
      </div>
      <li data-icon="false"><a data-rel="close" href="#cart">Pembayaran</a></li>
      <div data-role="collapsible" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-iconpos="right">
        <h4>Websites</h4>
        <ul data-role="listview" data-inset="false">
          <li>SCeLE</li>
          <li>SIAK-NG</li>
        </ul>
      </div>
      <li data-icon="false"><a data-rel="close" href="#register">Beasiswa</a></li>
      <li data-icon="false"><a data-rel="close" href="#help">Tentang</a></li>
    </ul>
  </div>
  <div class="bg-img"></div>
  </div>

<!-- ################################################################################################################### -->
<!-- Search Page -->

<div data-role="page" id="search">
  <header data-role="header" data-position="fixed">
  <a data-rel="back" data-direction="reverse" href="#home">Back</a>
  <h1>Academic Guide UI</h1>

</header>

<form class="ui-filterable">
    <input id="filterBasic-input" data-type="search">
</form>
<ul data-role="listview" data-filter="true" data-input="#filterBasic-input" id="articleList">
</ul>
</div>

<!-- SCRIPT untuk Dynamic List dan Dynamic Page    -->
<script type="text/javascript">

  $.getJSON("data.json",function(articles){
    $('#articleList').empty();

    $.each(articles,function(i,article){
      $('#articleList').append(generateArticleLink(article));
    });

    $('#articleList').listview('refresh');
  });

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



</body>
</html>
