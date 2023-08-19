// Add an event listener to the birthdate input field
const getActorsButton = document.getElementById("get-actors-button");
getActorsButton.addEventListener("click", function () {
    // const birthdateInput = document.getElementById("birthdate");
    const date = document.getElementById("birthdate").value;
    // extract the month and day from the date
    const month = date.substring(5, 7);
    const day = date.substring(8, 10);
    console.log(month);
    console.log(day);

    const request = new XMLHttpRequest();
    request.open("GET", "API_Ops.php?month=" + month + "&day=" + day);
    request.onload = function () {
        var response = JSON.parse(request.responseText);
        const actors = response.actors;

        // create a container for the actor names
        const actorContainer = document.createElement("div");

        for (let i = 0; i < actors.length; i++) {
            // create a div for each actor
            const actorDetailsDiv=document.createElement("div");
            const actorName = document.createElement("p");
            actorName.textContent = "Name of actor : " + actors[i].name;
            const actorBirthdate = document.createElement("p");
            actorBirthdate.textContent = "Birth date of actor : " + actors[i].birthDate;
            const actorBirthplace = document.createElement("p");
            actorBirthplace.textContent = "Birth place of actor : " + actors[i].birthPlace;
            const breakLine = document.createElement("p");
            breakLine.textContent = "------------------------------------------";
            actorDetailsDiv.appendChild(actorName);
            actorDetailsDiv.appendChild(actorBirthdate);
            actorDetailsDiv.appendChild(actorBirthplace);
            actorDetailsDiv.appendChild(breakLine);
            actorContainer.appendChild(actorDetailsDiv);
        }

        // append the actor container to the page
        const container = document.getElementById("container");
        container.appendChild(actorContainer);
    };
    request.send();
});