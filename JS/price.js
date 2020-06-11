function maxPrice() {
    console.log("Maxprice");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("test1");
            let tab=this.responseText;
            console.log(tab);

            console.log("test2");
            tab=JSON.parse(tab);

            document.getElementById("range").max = tab['maxprice'];
            document.getElementById("range").min = tab['minprice'];
            document.getElementById("range").value = tab['maxprice'];
            document.getElementById("textSlide").innerHTML = "Prix maximum: "+document.getElementById("range").value+" €";

        }
    };
    xmlhttp.open("GET", "getmaxprice.php", true);
    xmlhttp.send();
}

function rangerVol(prix, order) {
    console.log("Maxprice");
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("test1");
            let result=this.responseText.split(',');
            console.log(result);
            result=JSON.parse(result);
            console.log(result);
            document.getElementById("allCard").innerHTML = "";
            if (order === 0)
            {
                document.getElementById("actualOrder").innerHTML = "Actuelle : Decroissant";
            }else {
                document.getElementById("actualOrder").innerHTML = "Actuelle : Croissant";
            }
            let compteur = 0;
            let nbr_Flight=result.length;
            for (let k = 0; k < nbr_Flight; k++) {
                let valeurSlide= document.getElementById("range").value;
                if (result[k]['price'] <=valeurSlide)
                {
                    if (order === 0){
                        document.getElementById("allCard").innerHTML = "<div class='card'>" +
                            "<h5 class='card-header'> Vol #"+result[k]['id']+"</h5>" +
                            "<div class='card-body'>" +
                            "<h5 class='card-title'><i class='fa fa-plane'></i> &nbsp;"+result[k]['departuretime']+" - "+result[k]['arrivaltime']+"</h5>" +
                            "<div class='row'>" +
                            "<div class='col'>" +
                            "<p class='card-text'><i class='fa fa-map-marker'></i>"+result[k]['origincity']+" ("+result[k]['sessionOP']+") à"+result[k]['destinationcity']+" ("+result[k]['sessionDP']+")<br><i class='fa fa-calendar'></i> "+result[k]['daypropre']+"</p>" +
                            "</div>"+
                            "<div class='col'>"+
                            "<p class='card-text'>Durée du voyage <br><i class='fa fa-clock-o' ></i>&nbsp;"+result[k]['travelTime']+"</div>"+
                            "<div class='col'>"+
                            "<p class='card-text'>Capacité Restante <br> <div class='progress'>"+
                            "<div id='progress-bar' class='progress-bar bg-white' style='width:"+result[k]['capacity']+"%;color:white; background-color:orangered !important;' aria-valuemin='0' aria-valuemax='100'>"+result[k]['capacity']+" %</div>"+
                            "</div>"+
                            "</div>"+
                            "</div>"+
                            "<hr><h5 class='card-text'>À partir de "+result[k]['price']+"€</h5>"+
                            "<form method='POST' action='controller.php?func=selectedFlight&id="+result[k]['id']+"&price="+result[k]['price']+"&travelTime="+result[k]['travelTime']+"&capacity="+result[k]['capacity']+"'><button style='float:right; width:30%' type='submit' class='btn btn-outline-white'>Sélectionner</button></form>"+
                            "</div>"+
                            "</div><br>"+ document.getElementById("allCard").innerHTML;
                    }else{
                        document.getElementById("allCard").innerHTML = document.getElementById("allCard").innerHTML +"<div class='card'>" +
                            "<h5 class='card-header'> Vol #"+result[k]['id']+"</h5>" +
                            "<div class='card-body'>" +
                            "<h5 class='card-title'><i class='fa fa-plane'></i> &nbsp;"+result[k]['departuretime']+" - "+result[k]['arrivaltime']+"</h5>" +
                            "<div class='row'>" +
                            "<div class='col'>" +
                            "<p class='card-text'><i class='fa fa-map-marker'></i>"+result[k]['origincity']+" ("+result[k]['sessionOP']+") à"+result[k]['destinationcity']+" ("+result[k]['sessionDP']+")<br><i class='fa fa-calendar'></i> "+result[k]['daypropre']+"</p>" +
                            "</div>"+
                            "<div class='col'>"+
                            "<p class='card-text'>Durée du voyage <br><i class='fa fa-clock-o' ></i>&nbsp;"+result[k]['travelTime']+"</div>"+
                            "<div class='col'>"+
                            "<p class='card-text'>Capacité Restante <br> <div class='progress'>"+
                            "<div id='progress-bar' class='progress-bar bg-white' style='width:"+result[k]['capacity']+"%;color:white; background-color:orangered !important;' aria-valuemin='0' aria-valuemax='100'>"+result[k]['capacity']+" %</div>"+
                            "</div>"+
                            "</div>"+
                            "</div>"+
                            "<hr><h5 class='card-text'>À partir de "+result[k]['price']+"€</h5>"+
                            "<form method='POST' action='controller.php?func=selectedFlight&id="+result[k]['id']+"&price="+result[k]['price']+"&travelTime="+result[k]['travelTime']+"&capacity="+result[k]['capacity']+"'><button style='float:right; width:30%' type='submit' class='btn btn-outline-white'>Sélectionner</button></form>"+
                            "</div>"+
                            "</div><br>";
                    }

                    compteur++;
                }
                if (compteur === 0){
                    document.getElementById("allCard").innerHTML = "<div class='alert alert-primary' role='alert'>Aucun vol disponible pour ce prix</div>";
                }

            }

        }
    };
    xmlhttp.open("GET", "getprice.php", true);
    xmlhttp.send();
}

window.onload = function() {
    console.log("Debut SQL");
    maxPrice();
    let valeurSlide= document.getElementById("range").value;
    rangerVol(valeurSlide,1);

};
function changeNumer(){
    document.getElementById("textSlide").innerHTML = "Prix maximum: "+document.getElementById("range").value+" €";
    console.log(document.getElementById("range").value);

}
function chargePage(){
    document.getElementById("allCard").innerHTML = "<div id='myNav' class='overlay' style='width: 100%'>" +
        "<div class='overlay-content'>" +
        "<div class='d-flex justify-content-center' style='color: orangered'>" +
        "<div class='spinner-border' role='status' style='width: 4rem; height: 4rem;'></div>" +
        "</div>" +
        "</div>" +
        "</div>";
}

function launchSearch(){
    chargePage();
    let valeurSlide= document.getElementById("range").value;
    rangerVol(valeurSlide, 1);

}

function ASC(){
    chargePage();
    let valeurSlide= document.getElementById("range").value;
    rangerVol(valeurSlide, 1);
}

function DESC() {
    chargePage();
    let valeurSlide= document.getElementById("range").value;
    rangerVol(valeurSlide, 0);

}

function main() {
    console.log("Start");
    document.getElementById("range").addEventListener("change", changeNumer);

    document.getElementById("searchButton").addEventListener("click", launchSearch);


    document.getElementById("croissantButton").addEventListener("click", ASC);
    document.getElementById("decroissantButton").addEventListener("click", DESC);


}
main();