
function goToArticleDetailPage2(articleTitle, articlePoin, articleImages, articleUmum, articleKonten, articleRefURL){
  var articlePage = $("<div data-role='page' id='detail'>"
                  + "<header data-role='header' data-position='fixed'>"
                  + "<a data-rel='back' data-direction='reverse' href=''#home'>Back</a>"
                  + "<h1>Academic Guide UI</h1>"
                  + "</header>"
                  + "<content data-role='content'>"
                  + "<div class='swiper-container'>"
                  + "<div class='swiper-wrapper'>"
                  + "<div class='swiper-slide' style='background-image:url("
                  + articleImages[0] + ")'></div><div class='swiper-slide' style='background-image:url("
                  + articleImages[1] + ")'></div><div class='swiper-slide' style='background-image:url("
                  + articleImages[2] + ")'></div></div><div class='swiper-pagination'></div></div><div style='padding:9px'><h1>"
                  + articleTitle + "</h1><h3>Poin - Poin Penting</h3><div id='poin'></div><br><script>document.getElementById('poin').innerHTML = '"
                  + articlePoin + "';</script><h3>Penjelasan Umum</h3><div id='umum'></div><br><script>document.getElementById('umum').innerHTML = '"
                  + articleUmum + "';</script><h3>Konten</h3><div id='konten'></div><br><script>document.getElementById('konten').innerHTML = '"
                  + articleKonten + "';</script><a href='http://"
                  + articleRefURL + "''><img src='visit.png' alt='visit' class='visit'></a></div></content></div>");
  articlePage.appendTo( $.mobile.pageContainer );
  $.mobile.changePage( articlePage );
}
