function leagueFunction() {
    localStorage.setItem("res", document.getElementById("league").innerHTML);
}
function playerFunction(){
    localStorage.setItem("res", document.getElementById("player").innerHTML);
}
function teamFunction() {
    localStorage.setItem("res", document.getElementById("team").innerHTML);
}
function show(){
    document.getElementById('res').innerHTML = localStorage.getItem("res");
}
