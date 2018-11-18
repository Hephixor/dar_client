var test_url = "../../server/test";
var signup_url = "../../server/signup";
var login_url = "../../server/login";
var showsession_url = "../../server/showsession";
var logout_url = "../../server/logout";

function display(id) {
    var divs = document.getElementsByTagName("div");
    for (var i = 0; i < divs.length; i++) {
        if (divs[i].id == id) {
            divs[i].hidden = false;
        } else {
            divs[i].hidden = true;
        }
    }
}


function getOwnProfilInfo(){
  	var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
  	/*sur reception de la reponse*/
  	xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
          document.getElementById("user_pseudo").innerHTML = json['user']['username'];
          document.getElementById("user_score").innerHTML = json['user']['score'];
          if(json['user']['name']!=undefined){
            document.getElementById("user_name").innerHTML = "Nom : " + json['user']['name'];
          }
          if(json['user']['firstname']!=undefined){
            document.getElementById("user_firstname").innerHTML = "Prénom : " + json['user']['firstname'];
          }
          if(json['user']['email']!=undefined){
            document.getElementById("user_email").innerHTML = "Email : " + json['user']['email'];
          }

      }
      else{
        alert("Error fetching profil infos");
      }
      }
    };

  	/*texte a envoyer*/
  	var params = "?myself=true";

  	/*envoi asynchrone au servlet*/
    var url = "../../server/users" + params;

  	xhttp.open("GET", url , true);
  	xhttp.send();

}

function getProfilInfo(username){
  	var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
  	/*sur reception de la reponse*/
  	xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
          document.getElementById("user_pseudo").innerHTML = json['users'][0]['username'];
          document.getElementById("user_score").innerHTML = json['users'][0]['score'];
      }
      else{
        alert("Error fetching profil infos");
      }
      }
    };

  	/*texte a envoyer*/
  	var params = "?username=" + username;

  	/*envoi asynchrone au servlet*/
    var url = "../../server/users" + params;

  	xhttp.open("GET", url , true);
  	xhttp.send();

}



function leaderboards_get(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';
  var user_name = "user_name_";
  var user_score = "user_score_";

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
          for(i=0;i<10;i++){
            var user_name_formated = user_name + i;
            var user_score_formated = user_score + i;
            document.getElementById(user_name_formated).innerHTML = json['users'][i]['username'];
            document.getElementById(user_score_formated).innerHTML = json['users'][i]['score'];
          }
        }
    }
  };

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/users", true);
  xhttp.send();
}

function checkIfOnlineMenu(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
            if(json['session']!=null){
              document.getElementById("connexionMenu").hidden = true;
              document.getElementById("inscriptionMenu").hidden = true;
              document.getElementById("friendsMenu").hidden = false;
              document.getElementById("logoutMenu").hidden = false;
              document.getElementById("profilMenu").style.display = "inline-block";
            }
            else{
              document.getElementById("connexionMenu").hidden = false;
              document.getElementById("inscriptionMenu").hidden = false;
              document.getElementById("friendsMenu").hidden = true;
              document.getElementById("logoutMenu").hidden = true;
              document.getElementById("profilMenu").style.display = "none";
            }
        }
    }
  };

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/sessions", true);
  xhttp.send();
}

function checkIfOnlineGame(){
  checkIfOnlineMenu();
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
            if(json['session']==null){
              document.location.href = "index.html";
            }
        }
    }
  };

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/sessions", true);
  xhttp.send();
}

function checkIfOnlineSolo(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
            if(json['session']!=null){
              document.getElementById("connexionMenu").hidden = true;
              document.getElementById("inscriptionMenu").hidden = true;
              document.getElementById("friendsMenu").hidden = false;
              document.getElementById("logoutMenu").hidden = false;
              document.getElementById("playButton").hidden = false;
              document.getElementById("errorMsg").hidden = true;
              document.getElementById("profilMenu").style.display = "inline-block";
            }
            else{
              document.getElementById("connexionMenu").hidden = false;
              document.getElementById("inscriptionMenu").hidden = false;
              document.getElementById("friendsMenu").hidden = true;
              document.getElementById("logoutMenu").hidden = true;
              document.getElementById("errorMsg").hidden = false;
              document.getElementById("playButton").hidden = true;
              document.getElementById("profilMenu").style.display = "none";
            }
        }
    }
  };

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/sessions", true);
  xhttp.send();
}

function goToMember(username){
  localStorage.setItem("memberName",username);
  window.location.href="membre.html";
}


function friends_get(username){

  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';
  var usern = new Array();
  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
          if(json['users'][0]['friends'].length==0){
            document.getElementById("noFriend").hidden=false;
          }
            if(json['users'][0]['friends']!=null){
              for(i=0;i<json['users'][0]['friends'].length;i++){
                var ul =document.getElementById("resultList");
                var li = document.createElement('li');
                var time = document.createElement('time');
                var img = document.createElement('img');
                var div = document.createElement('div');
                var h2 = document.createElement('h2');

                img.src = "images/members/unknown-user.png";
                img.style = "max-height:100%";
                h2.className="info";
                h2.style="font-size:3vw;";

                usern[i] = json['users'][0]['friends'][i];
                h2.innerHTML=json['users'][0]['friends'][i];
                li.setAttribute("id",i);
                li.addEventListener("click", function(event) {
                  goToMember(usern[this.id]);
                  event.preventDefault();
                });


                time.appendChild(img);
                div.appendChild(h2);
                div.style="transform: translateY(+50%);";

                li.appendChild(time);
                li.appendChild(div);
                ul.appendChild(li);

                }
              }
          }
      }
  };

          var params = "?username=" + username;
          /*envoi asynchrone au servlet*/
          xhttp.open("GET", "../../server/users" + params, true);;
          xhttp.send();
}

function deleteFriend(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
                if(json['success']==true){
                  document.getElementById("addButton").hidden=false;
                  document.getElementById("deleteButton").hidden=true;
                }
                else{
                  alert("Error while adding friend");
                }
              }
          }
  };

  /*texte a envoyer*/
  var params = "?username=" + document.getElementById("user_pseudo").innerHTML;
  /*envoi asynchrone au servlet*/
  xhttp.open("DELETE", "../../server/friends"+params, true);

  xhttp.send();
}

function addFriend(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
                if(json['success']==true){
                  document.getElementById("addButton").hidden=true;
                  document.getElementById("deleteButton").hidden=false;
                }
                else{
                  alert("Error while adding friend");
                }
              }
          }
  };


  /*texte a envoyer*/
  var params = "username=" + document.getElementById("user_pseudo").innerHTML;

  /*envoi asynchrone au servlet*/
  xhttp.open("POST", "../../server/friends", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(params);
}

function search_get(){

  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';
  var usern = new Array();
  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
            if(json['users']!=null){
              for(i=0;i<json['users'].length;i++){
                var ul =document.getElementById("resultList");
                var li = document.createElement('li');
                var time = document.createElement('time');
                var img = document.createElement('img');
                var div = document.createElement('div');
                var h2 = document.createElement('h2');

                img.src = "images/members/unknown-user.png";
                img.style = "max-height:100%";
                h2.className="info";
                h2.style="font-size:3vw;";

                usern[i] = json['users'][i]['username'];
                h2.innerHTML=json['users'][i]['username'];
                li.setAttribute("id",i);
                li.addEventListener("click", function(event) {
                  goToMember(usern[this.id]);
                  event.preventDefault();
                });

                time.appendChild(img);
                div.appendChild(h2);
                div.style="transform: translateY(+50%);";

                li.appendChild(time);
                li.appendChild(div);
                ul.appendChild(li);

                }
              }
          }
      }
  };


          var params = "?username=" + escapeHtml(localStorage.getItem("search"));

          /*envoi asynchrone au servlet*/
          xhttp.open("GET", "../../server/users" + params, true);;
          xhttp.send();
}


function search(){
  var search = document.getElementById("search").value;
  localStorage.setItem("search",search);
  window.location.href="search.html";
}

function checkIfOnlineFriends(){
  checkIfOnline();
  friends_get(localStorage.getItem("username"));
}

function checkIfOnlineSearch(){
  checkIfOnline();
  search_get();
}

function checkIfFriends(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {


          for(i=0;i<json['friends'].length;i++){
            if(json['friends'][i]==localStorage.getItem("memberName")){
              document.getElementById("addButton").hidden=true;
              document.getElementById("deleteButton").hidden=false;
            }
          }
        }
        }
  };
  var params = "?username=" + localStorage.getItem("username");
  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/friends" + params, true);
  xhttp.send();
}


function checkIfOnlineMember(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
            if(json['session']!=null){
              if(localStorage.getItem("memberName")!=undefined){
                checkIfFriends();
                getProfilInfo(localStorage.getItem("memberName"));
                document.getElementById("connexionMenu").hidden = true;
                document.getElementById("inscriptionMenu").hidden = true;
                document.getElementById("friendsMenu").hidden = false;
                document.getElementById("logoutMenu").hidden = false;
                document.getElementById("profilMenu").style.display = "inline-block";
              }
              else{
                window.location.href="index.html";
              }
            }
            else{
              document.location.href = "index.html";
            }
        }
    }
  };

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/sessions", true);
  xhttp.send();
}

function checkIfOnlineProfil(){
  var xhttp = new XMLHttpRequest();
  xhttp.responseType= 'json';

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(JSON.stringify(this.response));
        if (json != null) {
            if(json['session']!=null){
              getOwnProfilInfo();
              document.getElementById("connexionMenu").hidden = true;
              document.getElementById("inscriptionMenu").hidden = true;
              document.getElementById("logoutMenu").hidden = false;
              document.getElementById("profilMenu").style.display = "inline-block";
            }
            else{
              document.location.href = "index.html";
            }
        }
    }
  };

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", "../../server/sessions", true);
  xhttp.send();
}

function checkIfOnline() {
  checkIfOnlineMenu();
}

function sessions_get() {
    var r = "sessions_get_resp_id";
    var xhttp = new XMLHttpRequest();

    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById(r).innerHTML = this.responseText;
        }
    };
    /*envoi asynchrone au servlet*/
    xhttp.open("GET", "../../server/sessions", true);
    xhttp.send();
}


function make_questions(json) {
    var title1 = "question_1_title";
    var title2 = "question_2_title";
    var picture1 = "question_1_picture";
    var picture2 = "question_2_picture";
    var price = "question_price";
    var pid1 = "question_1_pid";
    var pid2 = "question_2_pid";
    var content = "content";

    document.getElementById(title1).innerHTML = json['products'][0]['name'];
    document.getElementById(title2).innerHTML = json['products'][1]['name'];
    document.getElementById(price).innerHTML = Math.ceil(json['price']) + " €";
    document.getElementById(picture1).src = json['products'][0]['imagesUrls'][0];
    document.getElementById(picture2).src = json['products'][1]['imagesUrls'][0];
    document.getElementById(pid1).innerHTML = json['products'][0]['pid'];
    document.getElementById(pid2).innerHTML = json['products'][1]['pid'];
    document.getElementById(content).hidden = false;
    document.getElementById("loaderAnim").hidden = true;

}

function answers_post(numero_reponse) {
    if (numero_reponse == 1) {
        var a = "question_1_pid";
    } else {
        var a = "question_2_pid";
    }

    var r = "answers_post_resp_id";
    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';
    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(JSON.stringify(this.response));
            if (json != null) {
                document.getElementById("score").innerHTML = "SCORE : " + json['score'];
            }
        }
    };

    /*texte a envoyer*/
    var params = "answer=" + escapeHtml(document.getElementById(a).innerHTML);

    /*envoi asynchrone au servlet*/
    xhttp.open("POST", "../../server/answers", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);


    questions_get();
}

function questions_get() {
    document.getElementById("content").hidden = true;
    document.getElementById("loaderAnim").hidden = false;

    var r = "questions_get_resp_id";
    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';

    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(JSON.stringify(this.response));
            if (json != null) {
                make_questions(json);
            } else {
                questions_get();
            }

        }
    };

    /*envoi asynchrone au servlet*/
    xhttp.open("GET", "../../server/questions", true);
    xhttp.send();
}

function sessions_delete() {
    var r = "sessions_delete_resp_id";
    var xhttp = new XMLHttpRequest();

    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            localStorage.setItem("username",undefined);
            document.location.href = "index.html";
        }
    };

    /*envoi asynchrone au servlet*/
    xhttp.open("DELETE", "../../server/sessions", true);
    xhttp.send();
}



function test() {
    var t = "test_text_id";
    var r = "test_resp_id";
    var xhttp = new XMLHttpRequest();

    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            document.getElementById(r).innerHTML = this.responseText;
        }
    };

    /*texte a envoyer*/
    var params = "?text=" + document.getElementById(t).value;

    /*envoi asynchrone au servlet*/
    xhttp.open("GET", "../../server/test" + params, true);
    xhttp.send();
}

function users_post() {
    var u = "users_post_username_id";
    var n = "users_post_username_name";
    var f = "users_post_username_firstname";
    var m = "users_post_username_mail";
    var p = "users_post_password_id";
    var c = "users_post_confirmation_id";
    var r = "users_post_resp_id";
    var xhttp = new XMLHttpRequest();
    xhttp.responseType= 'json';
    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          var json = JSON.parse(JSON.stringify(this.response));
          if (json != null) {
              if (json['success'] == true) {
                  document.getElementById('popup1close').click();
                  document.getElementById('users_post_resp_id').hidden = true;
              }
              if (json['success'] == false) {
                  document.getElementById('users_post_resp_id').hidden = false;
                  document.getElementById('explanations2').innerHTML = json['error'];
              }
          }
        }
    };

    /*texte a envoyer*/
    var params =
        "username=" + escapeHtml(document.getElementById(u).value) +
        "&password=" + str_sha256(document.getElementById(p).value) +
        "&confirmation=" + str_sha256(document.getElementById(c).value) +
        "&name=" + escapeHtml(document.getElementById(n).value) +
        "&firstname=" + escapeHtml(document.getElementById(f).value) +
        "&email=" + escapeHtml(document.getElementById(m).value);

    /*envoi asynchrone au servlet*/
    xhttp.open("POST", "../../server/users", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

function saveUsernameSession(){
      var xhttp1 = new XMLHttpRequest();
      xhttp1.responseType= 'json';

    /*sur reception de la reponse*/
    xhttp1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var json = JSON.parse(JSON.stringify(this.response));
    if (json != null) {
    if(json['session']!=null){
      localStorage.setItem("username",json['session']['username']);
    }
    }
    }
    };

/*envoi asynchrone au servlet*/
xhttp1.open("GET", "../../server/sessions", true);
xhttp1.send();en = false;
}

function sessions_post() {
    var u = "sessions_post_username_id";
    var p = "sessions_post_password_id";
    var r = "sessions_post_resp_id";
    var xhttp = new XMLHttpRequest();
    xhttp.responseType = 'json';

    /*sur reception de la reponse*/
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
            //document.getElementById(r).innerHTML = this.responseText;
            var json = JSON.parse(JSON.stringify(this.response));
            if (json != null) {
                if (json['success'] == true) {
                    saveUsernameSession();
                    document.getElementById('popup2close').click();
                    document.getElementById('sessions_post_resp_id').hidden = true;
                }
                if (json['success'] == false) {
                    document.getElementById('sessions_post_resp_id').hidden = false;
                    document.getElementById('explanations1').innerHTML = json['error'];
                }
            }
            checkIfOnline();
            var url = window.location.pathname.substr(window.location.pathname.lastIndexOf('/') + 1);
            if(url == "solo.html"){
              checkIfOnlineSolo();
            }
            if(url == "game.html"){
              checkIfOnlineGame();
            }
        }
    };

    /*texte a envoyer*/
    var params =
        "username=" + escapeHtml(document.getElementById(u).value) +
        "&password=" + str_sha256(document.getElementById(p).value);

    /*envoi asynchrone au servlet*/
    xhttp.open("POST", "../../server/sessions", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
}

$(function() {
    $("#header").load("include/header.html");
    $("#footer").load("include/footer.html");
});

$(document).ready(function() {

        /* -------- One page Navigation ----------*/
        $('#main-menu #menu').onePageNav({
            currentClass: 'active',
            changeHash: false,
            scrollSpeed: 1500,
            scrollThreshold: 0.5,
            scrollOffset: 95,
            filter: ':not(.sub-menu a, .not-in-home)',
            easing: 'swing'
        });
    }

)

function makeAlert(){
  alert("Not yet implemented !");
}



function escapeHtml(str) {
  var unsafe = str;
    return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
 }
