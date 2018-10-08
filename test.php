
<?php
require_once("header_html_fancy_loader.php");
?>
 <style>




/* Actual content */
.container-item{
  /*position: relative;
  margin-top:40px;
  float:left;
  margin-right:20px;*/
  position: absolute;
  top:50%;
  left:50%;
  margin-left:-130px;
  margin-top:-130px;
}

.item{
  width:260px;
  height:260px;
  background-image: url(http://fc06.deviantart.net/fs71/i/2010/037/9/b/Shoe_Product_Shot_by_ChrisHavron.jpg);
  -webkit-background-size: 100%;
       -o-background-size: 100%;
          background-size: 100%;
  position: relative;
  top:0;
  left:0;
  z-index:5;
  overflow: hidden;
  -webkit-border-radius: 3px;
          border-radius: 3px;
  -webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.3);
          box-shadow: 0 1px 5px rgba(0,0,0,0.3);
}

.item-overlay{
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 3px;
  /* IE9 SVG, needs conditional override of 'filter' to 'none' */
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjI4JSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMC40MiIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: -moz-linear-gradient(top,  rgba(0,0,0,0) 0%, rgba(0,0,0,0) 28%, rgba(0,0,0,0.42) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(28%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.42))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* IE10+ */
  background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#6b000000',GradientType=0 ); /* IE6-8 */

  -webkit-transition: background-color 0.3s ease-in-out;
     -moz-transition: background-color 0.3s ease-in-out;
      -ms-transition: background-color 0.3s ease-in-out;
       -o-transition: background-color 0.3s ease-in-out;
          transition: background-color 0.3s ease-in-out;
}
.item:hover .item-overlay{
  /* IE9 SVG, needs conditional override of 'filter' to 'none' */
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjI4JSIgc3RvcC1jb2xvcj0iIzAwMDAwMCIgc3RvcC1vcGFjaXR5PSIwIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiMwMDAwMDAiIHN0b3Atb3BhY2l0eT0iMC40MiIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: -moz-linear-gradient(top,  rgba(0,0,0,0) 0%, rgba(0,0,0,0) 28%, rgba(0,0,0,0.42) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(28%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.42))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* IE10+ */
  background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(0,0,0,0) 28%,rgba(0,0,0,0.42) 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#6b000000',GradientType=0 ); /* IE6-8 */
  background-color: rgba(0,0,0,0.4);
}
.item-content{
  position: absolute;
  width:100%;
  bottom: 0;
  -webkit-transform: translate(0,100%);
     -moz-transform: translate(0,100%);
      -ms-transform: translate(0,100%);
       -o-transform: translate(0,100%);
          transform: translate(0,100%);
  
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
  
}
.item:hover .item-content{
  -webkit-transform: translate(0,0);
     -moz-transform: translate(0,0);
      -ms-transform: translate(0,0);
       -o-transform: translate(0,0);
          transform: translate(0,0);
      
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}

.item-top-content{
  position: relative;
}
.item-top-content-inner{
  position: absolute;
  bottom: 0;
  padding:10px 15px 10px 15px;
  background: rgba(255,255,255,.85);
  width:100%;
}
.item-add-content{
  padding:0 15px 15px 15px;
  opacity:0;
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}
.item:hover .item-add-content{
  opacity:1
}
.item-add-content-inner{
  border:0px solid #dadada;
  border-top-width:1px;
  padding-top:10px;
}



/* Buttons */
.item-button{
  border-radius:3px;
  width:30px;
  height:30px;
}
.item-button.play{
  background-color:#40c781;
  position: absolute;
  top: 15px;
  left: 15px;
  opacity:0;
  background-image: url(http://webstudios.dk/resources/img/play-img.png);
}
.item-button.play:hover{
  background-color:#34a46c;
  }
.container-item:hover .item-button.play{
  opacity:1;
}

.item-button.share{
  background-color:#4f4f4f;
  position: absolute;
  top: 50px;
  left: 15px;
  opacity:0;
  background-image: url(http://webstudios.dk/resources/img/share-img.png);
}
.item-button.share:hover{
  background-color:#333333;
  }
.container-item:hover .item-button.share{
  opacity:1;
}
.btn.buy{
  background-color: #40c781;
  text-align:center;
  line-height:42px;
  font-weight:700;
  color:#fff;
  border-radius:3px;
  text-decoration:none;
  opacity:1;
  border:0px solid #35a76e;
  border-bottom-width:2px;
  -webkit-transition: all 0.2s ease-in-out;
     -moz-transition: all 0.2s ease-in-out;
      -ms-transition: all 0.2s ease-in-out;
       -o-transition: all 0.2s ease-in-out;
          transition: all 0.2s ease-in-out;
}
.btn.buy:hover{
  background-color:#34a46c;
}
.expand{
  display:block;
}

/* Tags */
.sale-tag{
  width: 50px;
  height: 100px;
  background: #40c781;
  position: absolute;
  top:-45px;
  right:-10px;
  -webkit-transform: rotate(-45deg);
     -moz-transform: rotate(-45deg);
      -ms-transform: rotate(-45deg);
       -o-transform: rotate(-45deg);
          transform: rotate(-45deg);
}
.sale-tag span{
  position:absolute;
  top:48px;
  left:2px;
  -webkit-transform: rotate(45deg);
     -moz-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
       -o-transform: rotate(45deg);
          transform: rotate(45deg);
  font-size:11px;
  color:#fff;
}

/* content */

.item-product{
  width:70%;
  float:left;
}
.item-product-price{
  width:30%;
  float:right;
  text-align: right;
}
/* Style / Theming */

body{
  /* IE10 Consumer Preview */ 
  background-image: -ms-radial-gradient(center, circle farthest-corner, #FFFFFF 0%, #E3E3E3 100%);

  /* Mozilla Firefox */ 
  background-image: -moz-radial-gradient(center, circle farthest-corner, #FFFFFF 0%, #E3E3E3 100%);

  /* Opera */ 
  background-image: -o-radial-gradient(center, circle farthest-corner, #FFFFFF 0%, #E3E3E3 100%);

  /* Webkit (Safari/Chrome 10) */ 
  background-image: -webkit-gradient(radial, center center, 0, center center, 497, color-stop(0, #FFFFFF), color-stop(1, #E3E3E3));

  /* Webkit (Chrome 11+) */ 
  background-image: -webkit-radial-gradient(center, circle farthest-corner, #FFFFFF 0%, #E3E3E3 100%);

  /* W3C Markup, IE10 Release Preview */ 
  background-image: radial-gradient(circle farthest-corner at center, #FFFFFF 0%, #E3E3E3 100%);
}

/*Prduct title*/
h2{
  font-size:1em;
  font-weight:400;
  color:#222;
}

.subdescription{
  font-family: 'helvetica neue';
  font-size:0.8em;
  font-weight:400;
  color:#7d7d7d;
}

/*product price*/
.item-product-price{
  color:#40c781;
  font-size:1em;
  font-weight:700;
  position:relative;
  font-family:'helvetica neue'
}
.item-product-price .subdescription{
  color:#7d7d7d;
}
.old-price{
  border:0 solid #7d7d7d;
  border-bottom-width:1px;
  margin-top:-11px;
  width:30px;
  position:absolute;
  right:-2px;
  bottom:10px;
  -webkit-transform: rotate(-30deg);
     -moz-transform: rotate(-30deg);
      -ms-transform: rotate(-30deg);
       -o-transform: rotate(-30deg);
          transform: rotate(-30deg);
}

.item-content{
  background: rgba(255,255,255,.85);
}
.item-add-content{
  font-family: 'Lato', sans-serif;
  font-weight:400;
  color:#7d7d7d;
}
.item-add-content .section{
  margin-bottom:10px;
}
.item-add-content .section:last-of-type{
  margin-bottom:0;
}
.item-add-content h4{
  font-weight:600;
  color:#222;
  font-size:0.8em;
}
.item-add-content p{
  font-size:0.8em;
}


/* Item menu */
.item-menu{
  position: absolute;
  top:3px;
  left:0px;
  height:254px;
  width:260px;
  border-radius:3px 0 0 3px;
  background:#4f4f4f;
  -webkit-border-radius: 3px;
          border-radius: 3px;
  -webkit-box-shadow: 0 1px 5px rgba(0,0,0,0.3);
          box-shadow: 0 1px 5px rgba(0,0,0,0.3);
  -webkit-transform: translate(0,0);
     -moz-transform: translate(0,0);
      -ms-transform: translate(0,0);
       -o-transform: translate(0,0);
          transform: translate(0,0);
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}
.item-menu.visible{
  -webkit-transform: translate(-70px,0);
     -moz-transform: translate(-70px,0);
      -ms-transform: translate(-70px,0);
       -o-transform: translate(-70px,0);
          transform: translate(-70px,0);
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}
.item-menu:hover{
  -webkit-transform: translate(-70px,0);
     -moz-transform: translate(-70px,0);
      -ms-transform: translate(-70px,0);
       -o-transform: translate(-70px,0);
          transform: translate(-70px,0);
  -webkit-transition: all 0.3s ease-in-out;
     -moz-transition: all 0.3s ease-in-out;
      -ms-transition: all 0.3s ease-in-out;
       -o-transition: all 0.3s ease-in-out;
          transition: all 0.3s ease-in-out;
}
/*List*/
.popout-menu ul{
  list-style-type:none;
}
.popout-menu ul li{
  -webkit-box-shadow: inset 0px 1px rgba(255,255,255,0.1);
          box-shadow: inset 0px 1px rgba(255,255,255,0.1);
  border-bottom:1px solid #434343;
}
.popout-menu ul li:first-of-type{
  -webkit-border-radius: 3px 0;
          border-radius: 3px 0;
}
.popout-menu ul li:last-of-type{
  border-bottom-width:0px;
}
.popout-menu ul li:hover{
  background:#434343;
}
.popout-menu ul li a{
  color:#eaeaea;
  font-weight:600;
  font-size:0.8em;
  text-decoration:none;
  line-height: 36px;
  padding:0 15px;
  display:block;
  text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
}
</style>
<section id="about" class="about">
 <div class="container">
  <div class="about-area">
   <div class="title-area text-center">
    <h2 class="about-title">Trip-Hop.net</h2>
    <p class="title-description">Passe en version 6.0</p>
  </div><!-- /.title-area -->
  <div class="about-items">
    <div class="col-sm-4"><iframe style="border: 0; width: 350px; height: 786px;" src="https://bandcamp.com/EmbeddedPlayer/album=1768387051/size=large/bgcol=ffffff/linkcol=0687f5/transparent=true/" seamless><a href="http://trip-hopnet.bandcamp.com/album/best-tunes-2017">Best Tunes 2017 by Trip-Hop.net</a></iframe>
      <p style="width:80%"></div>
        <div class="col-sm-8">
          Chez Trip-Hop.net, on est content, content, content et pas peu fier de vous présenter notre compilation Best Tunes 2017 ! 
          <br/> <br/>   On tenait, bien évidemment, à remercier l'ensemble des artistes qui ont répondu présents à notre sollicitation et qui ont permis de vous concocter une tracklist de malade ! L'ensemble de la rédaction est ravie de voir que le fait de partager sa passion de la musique, ça fait écho auprès des artistes et que l'aventure commencée il y a fort longtemps maintenant continue encore aujourd'hui.
          <br/> <br/>   Merci donc à LAAKE, Laboréal, A Bit Advanced Music, Nym, Alaskam, Al'Tarba, Konixion, Lo-End Dub, Specta Ciera & Arbee, CloZinger, Silvestro Dice, Yaul, Arms and Sleepers, Murochny, ElektroBin, Cortel, Tallisker, Missine+Tripstoic, Degiheugi, Pacific Shore, Krivitsky, Frizzy P & Mister Cole et Hugo Kant ! Votre confiance signifie tellement pour nous ! Beaucoup d'amour !
          <br/> <br/>   Merci à Darmé pour cette pochette qui claque ! Et merci à Marko Segura pour l'ingénierie du son !
          <br/> <br/>   On va tâcher de continuer 2018 comme 2017 mais en mieux, en continuant à vous faire découvrir de nouvelles pépites, et en vous réservant quelques surprises !
          <br/> <br/>   Merci à vous de nous suivre, si vous souhaitez nous filer un coup de main, n'hésitez surtout pas, toutes les bonnes volontés, pour aider notre travail bénévole sont les bienvenues !
          <br/><br/>    
          <center>
            <img src="images/logo_tr.png" alt="header_logo"  id="header_logo" style="display:block;" />
          </center>
          <br/>
        </p></div>
      </div><!-- /.about-items -->
    </div><!-- /.about-area -->
  </div><!-- /.container -->
</section><!-- /#about -->
 <div class="wrapper">
    <section class="row">
      <div class="container-item">
        <div class="item">
          <div class="item-overlay">
            <a href="#" class="item-button play"><i class="play"></i></a>
            <a href="#" class="item-button share share-btn"><i class="play"></i></a>
            <div class="sale-tag"><span>SALE</span></div>
          </div>
          <div class="item-content">
            <div class="item-top-content">
              <div class="item-top-content-inner">
                <div class="item-product">
                  <div class="item-top-title">
                    <h2>Ipath lowrunner</h2>
                    <p class="subdescription">
                      Low skateshoes - Grey
                    </p>
                  </div>
                </div>
                <div class="item-product-price">
                  <span class="price-num">$17</span>
                  <p class="subdescription">$36</p>
                  <div class="old-price"></div>
                </div>
              </div>  
            </div>
            <div class="item-add-content">
              <div class="item-add-content-inner">
                <!-- <div class="section">
                  <h4>Sizes</h4>
                  <p>40,41,42,43,44,45</p>
                </div> -->
                <div class="section">
                  <a href="#" class="btn buy expand">Buy now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item-menu popout-menu">
          <ul>
            <li><a href="#" class="popout-menu-item">Share</a></li>
            <li><a href="#" class="popout-menu-item">Info</a></li>
            <li><a href="#" class="popout-menu-item">Seller</a></li>
          </ul>
        </div>
      </div>
    </section>
  </div>
<?php
$useragent=$_SERVER['HTTP_USER_AGENT'];
if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
  include('./php/loadChroniquesMobile.php');
}
else{
  include('./php/loadChroniquesSlider.php');
}

include('./php/loadNewsSliderFancy.php');
include('./php/loadBigReleases.php');
?>

<!-- Subscribe Section -->
<section id="subscribe-section" class="subscribe-section text-center">
  <div class="container">
    <form class="news-letter" method="post" action="./php/addNewsletterSubscriber.php">
      <p class="alert-success"></p>
      <p class="alert-warning"></p>

      <div class="subscribe-hide">
        <h4 class="sub-title" style="color:#f6f6f6;margin-top: -10px;padding-bottom: 10px">S'inscrire à la newsletter</h3>
          <input class="form-control" type="email" id="subscribe-email" name="subscribe-email" placeholder="Adresse Email"  required>
          <button  type="submit" id="subscribe-submit" class="btn btn-md">S'inscrire</button>
          <div class="subscribe-error"></div>
        </div><!-- /.subscribe-hide -->
        <div class="subscribe-message"></div>
      </form><!-- /.news-letter -->
    </div><!-- /.container -->
  </section><!-- /#subscribe-section -->
  <!-- Subscribe Section End --> 



<!-- <section id="contact" class="contact">
  <div class="contact-area">
    <div id="message-details" class="message-details">
    <center><h4 class="sub-title" style="color:#888;margin-top: -30px;padding-bottom: 10px">Nous contacter</h4></center>
      <div class="container">

        <form action="email.php" method="post" id="myForm" class="message-form">
          <div class="row">
            <div class="col-sm-6">
              <input id="first_name" class="form-control" name="first_name" type="text" value="" size="30" aria-required="true" placeholder="Nom*" title="first_name" required>
              <input id="contact_email" class="form-control" name="contact_email" type="email" value="" size="30" aria-required="true" placeholder="Email*" title="contact_email"  required>
              <input id="subject" class="form-control" name="subject" type="subject" value="" size="30" aria-required="true" placeholder="Objet*" title="Subject"  required>
            </div>
            <div class="col-sm-6">
              <textarea id="message" class="form-control" name="message" cols="45" rows="3" aria-required="true" placeholder="Message" title="Message"  required></textarea>
              <button name="submit" class="btn btn-lg full-width" type="submit" id="submit">Envoyer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section> -->

<div id="popup-article4" class="popup">
  <div class="popup__block">
    <h1 class="popup__title">Nous contacter</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eaque optio vitae in explicabo recusandae sit id sapiente excepturi tempore, nemo, nulla odio deleniti rerum nisi perferendis aut molestias! Incidunt nesciunt iusto praesentium! In at maiores quibusdam enim quis, quam!</p>
    <img src="./images/logo_tr.jpg" class="popup__media popup__media_right" alt="The foto of nature">
    <section id="contact" class="contact">
      <div class="contact-area">
        <div id="message-details" class="message-details">
          <center><h4 class="sub-title" style="color:#888;margin-top: -30px;padding-bottom: 10px">Nous contacter</h4></center>
          <div class="container">

            <form action="email.php" method="post" id="myForm" class="message-form">
              <div class="row">
                <div class="col-sm-6">
                  <input id="first_name" class="form-control" name="first_name" type="text" value="" size="30" aria-required="true" placeholder="Nom*" title="first_name" required>
                  <input id="contact_email" class="form-control" name="contact_email" type="email" value="" size="30" aria-required="true" placeholder="Email*" title="contact_email"  required>
                  <input id="subject" class="form-control" name="subject" type="subject" value="" size="30" aria-required="true" placeholder="Objet*" title="Subject"  required>
                </div>
                <div class="col-sm-6">
                  <textarea id="message" class="form-control" name="message" cols="45" rows="3" aria-required="true" placeholder="Message" title="Message"  required></textarea>
                  <button name="submit" class="btn btn-lg full-width" type="submit" id="submit">Envoyer</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <a href="#" class="popup__close">close</a>
  </div>
</div>
<div id="popup-article1" class="popup">
  <div class="popup__block">
    <h1 class="popup__title">Recherche Améliorée</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eaque optio vitae in explicabo recusandae sit id sapiente excepturi tempore, nemo, nulla odio deleniti rerum nisi perferendis aut molestias! Incidunt nesciunt iusto praesentium! In at maiores quibusdam enim quis, quam!</p>
    <img src="./images/logo_tr.jpg" class="popup__media popup__media_right" alt="The foto of nature">
    <p>Architecto magni dolores cumque tenetur nemo id aperiam, ratione temporibus at, consectetur totam, fuga et illo rerum earum dicta. Vitae ullam harum enim aliquid hic commodi voluptas cumque iste ex accusantium architecto doloremque reprehenderit, asperiores vero dolor, esse inventore dolorem.</p>
    <p>Excepturi eaque, reprehenderit dolores, cum molestias repellendus in expedita. Placeat totam, quos pariatur quidem explicabo id harum ab voluptatum. Necessitatibus, aliquam! Dolorum voluptatem ut laudantium excepturi cumque, hic iure impedit ullam accusantium error natus recusandae, quia fuga quo voluptates officiis?</p>    
    <a href="#" class="popup__close">close</a>
  </div>
</div>
<div id="popup-article2" class="popup">
  <div class="popup__block">
    <h1 class="popup__title">Équipe plus grande</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eaque optio vitae in explicabo recusandae sit id sapiente excepturi tempore, nemo, nulla odio deleniti rerum nisi perferendis aut molestias! Incidunt nesciunt iusto praesentium! In at maiores quibusdam enim quis, quam!</p>
    <img src="./images/logo_tr.jpg" class="popup__media popup__media_right" alt="The foto of nature">
    <p>Architecto magni dolores cumque tenetur nemo id aperiam, ratione temporibus at, consectetur totam, fuga et illo rerum earum dicta. Vitae ullam harum enim aliquid hic commodi voluptas cumque iste ex accusantium architecto doloremque reprehenderit, asperiores vero dolor, esse inventore dolorem.</p>
    <p>Excepturi eaque, reprehenderit dolores, cum molestias repellendus in expedita. Placeat totam, quos pariatur quidem explicabo id harum ab voluptatum. Necessitatibus, aliquam! Dolorum voluptatem ut laudantium excepturi cumque, hic iure impedit ullam accusantium error natus recusandae, quia fuga quo voluptates officiis?</p>    
    <a href="#" class="popup__close">close</a>
  </div>
</div>

<div id="popup-article" class="popup">
  <div class="popup__block">
    <h1 class="popup__title">Nous contacter</h1>
    <img src="./images/logo_tr.jpg" class="popup__media popup__media_right" alt="The foto of nature">


    <center><div id="message-details" class="message-details" style="margin-left:-100px;width:100%">
      <div class="container">
        <form action="email.php" method="post" id="myForm" class="message-form">
          <div class="row">
            <div class="col-sm-6">
              <input id="first_name" class="form-control" name="first_name" type="text" value="" size="30" aria-required="true" placeholder="Nom*" title="first_name" required>
              <input id="contact_email" class="form-control" name="contact_email" type="email" value="" size="30" aria-required="true" placeholder="Email*" title="contact_email"  required>
              <input id="subject" class="form-control" name="subject" type="subject" value="" size="30" aria-required="true" placeholder="Objet*" title="Subject"  required>
            </div>
            <div class="col-sm-6">
              <textarea id="message" class="form-control" name="message" cols="45" rows="3" aria-required="true" placeholder="Message" title="Message"  required></textarea>
              <button name="submit" class="btn btn-lg full-width" type="submit" id="submit">Envoyer</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </center>

  <a href="#" class="popup__close">close</a>
</div>
</div>
  <script>
  $("window").load(function() {
  $("#body").removeClass("preload");
});

    $(".share-btn").mouseenter(function() {
      setTimeout(function() {
      $(".item-menu").addClass("visible")
      }, 500);
    });
    $(".share-btn").mouseleave(function() {
      setTimeout(function() {
      $(".item-menu").removeClass("visible")
      }, 500);
    });
    $(".item-menu").hover(function() {
      $(".item-menu").addClass("visible")
    });
    $(".item-menu").mouseleave(function() {
      setTimeout(function() {
      $(".item-menu").removeClass("visible")
      }, 500);
    });
    $(".container-item").hover(function() {
      setTimeout(function() {
      $(".container-item").css("z-index","1000")
      }, 500);
    });

</script>
<!-- <a href="#popup-article" class="card__link btn">
 <span class="btn-icon"><i class="fa fa-arrow-circle-right"></i></span>
 Nous contacter  
</a> -->
<?php
require_once("footer_html.php");
?>

