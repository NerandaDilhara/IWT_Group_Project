document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("agentForm");
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const agentList = document.getElementById("agentList");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const name = nameInput.value;
        const email = emailInput.value;

        if (name.trim() === "" || email.trim() === "") {
            alert("Please fill out both name and email.");
            return;
        }

        // Send the data to a PHP script for insertion into the database
        // You will need to create the PHP script for this purpose

        // After successful insertion, you can update the list with the new agent
        addAgentToList(name, email);
    });

    // Function to add an agent to the list
    function addAgentToList(name, email) {
        const listItem = document.createElement("li");
        listItem.innerHTML = `
            <span>${name}</span>
            <span>${email}</span>
            <button class="delete-button">Delete</button>
        `;
        agentList.appendChild(listItem);

        // Clear input fields
        nameInput.value = "";
        emailInput.value = "";
    }

    // You can add event listeners for delete, edit, and other actions here
});
