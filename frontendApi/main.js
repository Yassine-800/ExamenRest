const boutonStart = document.querySelector(".start");
const divRestaurants = document.querySelector(".restaurants");
const divPlats = document.querySelector(".plats");





function afficheUnRestaurant(sonId) {
    let maRequete = new XMLHttpRequest();

    maRequete.open(
        "GET",
        `http://localhost/FrameworkObjetApi/index.php?controller=restaurant&task=showApi&id=${sonId}`
    )

    maRequete.onload = () => {
        let data = JSON.parse(maRequete.responseText);

        let restaurant = data.restaurant;
        let plats = data.plats;
        
        faireCardRestaurantEtCardsPlats(restaurant, plats);
    };

    maRequete.send();
}

    

    

    let maRequete = new XMLHttpRequest();

    maRequete.open(
        "GET",
        "http://localhost/FrameworkObjetApi/index.php?controller=restaurant&task=indexApi"
    );

    maRequete.onload = () => {
        let data = JSON.parse(maRequete.responseText);

        console.log(data);
        faireDesCardsRestaurants(data);
    };
    maRequete.send();

    


function faireDesCardsRestaurants(tableauRestaurant) {
    let cards = "";

    tableauRestaurant.forEach((restaurant) => {
        card =  `<div class="col-4 p-3">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">${restaurant.name}</h5>
            <p class="card-text">${restaurant.address}</p>
            <button value="${restaurant.id}" class="btn btn-primary showPlats">voir la carte</button>
            </div>
        </div>

    </div>`;

        cards += card;

        divRestaurants.innerHTML = cards;
        divPlats.innerHTML = "";
    });

    document.querySelectorAll(".showPlats").forEach((bouton) => {
        bouton.addEventListener("click", (event) => {
            afficheUnRestaurant(bouton.value);
        });
    });
}

function supprimeUnPlat(platId) {
    
        let maRequete = new XMLHttpRequest();

        maRequete.open(
           "POST",
           "http://localhost/FrameworkObjetApi/index.php?controller=plat&task=supprApi" 
        );

        maRequete.onload = () => {
                // let data = JSON.parse(maRequete.responseText);
                //  console.log(data);

                let divPlat = document.querySelector(`div[data-plat="${platId}"]`);
                divPlat.remove();

        };

        params = "platId=" + platId;
        maRequete.send(params);
    }



    function faireCardRestaurantEtCardsPlats(restaurant, plats){
        cardRestaurant = `        <div class="col-4 p-3">

    <div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">${restaurant.name}</h5>
        <p class="card-text">${restaurant.address}</p>
        </div>
             <button class="btn btn-success retourRestaurants">Retour aux Restaurants</button>
     </div> 
   
</div>`;

        divRestaurants.innerHTML = cardRestaurant;

        cardsPlats = "";

        plats.forEach((plat) => {
            cardPlat = `        <div class="row" data-plat="${plat.id}">
    <hr>
        <p><strong>${plat.name}</strong></p>
        <p>${plat.price}</p>
        <button value="${plat.id}" class="btn btn-danger supprPlat">Supprimer</button>

    <hr>
</div>`;

            cardsPlats += cardPlat;
        });

            divPlats.innerHTML = cardsPlats;

            document.querySelector(".retourRestaurants")
            .addEventListener("click", (event) => {
                let maRequete = new XMLHttpRequest();

                    maRequete.open(
                        "GET",
                        "http://localhost/FrameworkObjetApi/index.php?controller=restaurant&task=indexApi"
                    );

                    maRequete.onload = () => {
                        let data = JSON.parse(maRequete.responseText);

                        console.log(data);
                        faireDesCardsRestaurants(data);
                    };
                    maRequete.send();

            });

            document.querySelectorAll(".supprPlat").forEach((bouton) => {
                bouton.addEventListener("click", event => {
                    supprimeUnPlat(bouton.value);
                });
            });

    }

    
