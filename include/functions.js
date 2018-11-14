var test_url = "../../server/test";
var signup_url = "../../server/signup";
var login_url = "../../server/login";
var showsession_url = "../../server/showsession";
var logout_url = "../../server/logout";

function logout() {
  var r = "logout_resp_id";
  var xhttp = new XMLHttpRequest();

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById(r).innerHTML = this.responseText; }};

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", logout_url , true);
  xhttp.send();
}

function showsession() {
  var r = "showsession_resp_id";
  var xhttp = new XMLHttpRequest();

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById(r).innerHTML = this.responseText; }};

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", showsession_url , true);
  xhttp.send();
}

function test() {
  var t = "test_text_id";
  var r = "test_resp_id";
  var xhttp = new XMLHttpRequest();

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById(r).innerHTML = this.responseText; }};

  /*texte a envoyer*/
  var params = "?text=" + document.getElementById(t).value;

  /*envoi asynchrone au servlet*/
  xhttp.open("GET", test_url + params , true);
  xhttp.send();
}

function signup() {
  var u = "signup_username_id";
  var p = "signup_password_id";
  var c = "signup_confirmation_id";
  var r = "signup_resp_id";
  var xhttp = new XMLHttpRequest();

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById(r).innerHTML = this.responseText; }};

  /*texte a envoyer*/
  var params =
    "username=" + document.getElementById(u).value +
    "&password=" + str_sha256(document.getElementById(p).value) +
    "&confirmation=" + str_sha256(document.getElementById(c).value);

  /*envoi asynchrone au servlet*/
  xhttp.open("POST", signup_url , true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(params);
}

function login(){
  var u = "login_username_id";
  var p = "login_password_id";
  var r = "login_resp_id";
  var xhttp = new XMLHttpRequest();

  /*sur reception de la reponse*/
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4) {
      document.getElementById(r).innerHTML = this.responseText; }};

  /*texte a envoyer*/
  var params =
    "username=" + document.getElementById(u).value +
    "&password=" + str_sha256(document.getElementById(p).value);

  /*envoi asynchrone au servlet*/
  xhttp.open("POST", login_url , true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(params);
}

$(function(){
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
