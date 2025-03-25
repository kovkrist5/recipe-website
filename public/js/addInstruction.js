document.addEventListener("DOMContentLoaded", function () {
    let instructionCount = 1;

    // Function to add a new input field with a remove button
    function addInput() {
        instructionCount++;
        const instructionsList = document.getElementById("instructionsList");

        // Create a new list item
        const newListItem = document.createElement("li");
        newListItem.setAttribute("id", `instruction_item_${instructionCount}`);

        // Create an input field
        const newInput = document.createElement("input");
        newInput.type = "text";
        newInput.name = "instructions[]";
        newInput.id = `instruction_${instructionCount}`;

        // Create a remove button
        const removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.innerText = "-";
        removeButton.onclick = function () {
            removeInput(newListItem.id);
        };

        // Append the input and remove button to the list item
        newListItem.appendChild(newInput);
        newListItem.appendChild(removeButton);

        // Append the list item to the instructions list
        instructionsList.appendChild(newListItem);
    }

    // Function to remove a specific input field
    function removeInput(itemId) {
        const item = document.getElementById(itemId);
        if (item) {
            item.remove();
        }
    }

    // Attach event listeners to buttons
    document.getElementById("addButton").addEventListener("click", addInput);
});

// This function is now handled via event listeners on page load.


