function changeTabs(elem) {
                
    var tabs = document.getElementsByClassName("single-tab");

    for(var j=0; j<tabs.length; j++){
    tabs[j].classList.add("text-muted");
    tabs[j].style.fontWeight = "normal";
    }
    elem.classList.remove("text-muted");
    elem.style.fontWeight = "bold";
    document.getElementById("tabtitle").innerHTML = elem.innerHTML;
    if(elem.innerHTML == "Questions"){
        document.getElementById("empty-message").innerHTML = "You haven't asked any questions yet.";
        document.getElementById("activitybtn").onclick = showques;
        document.getElementById("activitybtn").innerHTML = "Ask questions";
        /*var result ="<?php question(); ?>";
        document.getElementById("tabcontent").innerHTML = result;*/
    }
    else if(elem.innerHTML == "Answers"){
        document.getElementById("empty-message").innerHTML = "You haven't answered any questions yet.";
        document.getElementById("activitybtn").onclick = gotoHome;
        document.getElementById("activitybtn").innerHTML = "Answer questions";
        /*var result ="<?php answers(); ?>";
        document.getElementById("tabcontent").innerHTML = result;*/
    }
    
}

function changeavt(){
    document.getElementById("profilepicfield").click();
}
function gotoHome(){
    window.location.href = "answer.php";
}
function gotoAnswers(){
    window.location.href = "index.php";
}

document.getElementById("profilepicfield").onchange = function() {
    console.log("h1");
    document.getElementById("changeprofile").click();
    console.log("h1");
};

function cred(){
    
}
