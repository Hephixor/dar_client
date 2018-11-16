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
              document.getElementById("logoutMenu").hidden = false;
              document.getElementById("profilMenu").style.display = "inline-block";
            }
            else{
              document.getElementById("connexionMenu").hidden = false;
              document.getElementById("inscriptionMenu").hidden = false;
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
              document.getElementById("logoutMenu").hidden = false;
              document.getElementById("playButton").hidden = false;
              document.getElementById("errorMsg").hidden = true;
              document.getElementById("profilMenu").style.display = "inline-block";
            }
            else{
              document.getElementById("connexionMenu").hidden = false;
              document.getElementById("inscriptionMenu").hidden = false;
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

    console.log(json);

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
    var params = "answer=" + document.getElementById(a).innerHTML;

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
                //console.log(Object.values(this.response));
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
            //document.getElementById(r).innerHTML = this.responseText;
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
        "username=" + document.getElementById(u).value +
        "&password=" + document.getElementById(p).value +
        "&confirmation=" + document.getElementById(c).value;

    /*envoi asynchrone au servlet*/
    xhttp.open("POST", "../../server/users", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(params);
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
                    document.getElementById('popup2close').click();
                    document.getElementById('sessions_post_resp_id').hidden = true;
                }
                if (json['success'] == false) {
                    document.getElementById('sessions_post_resp_id').hidden = false;
                    document.getElementById('explanations1').innerHTML = json['error'];
                }
            }
            checkIfOnline();
        }
    };

    /*texte a envoyer*/
    var params =
        "username=" + document.getElementById(u).value +
        "&password=" + document.getElementById(p).value;

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
