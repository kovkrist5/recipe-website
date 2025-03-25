document.addEventListener("DOMContentLoaded", function () {
    let instructionCount = 1;

    function addInput() {
        instructionCount++;
        const instructionsList = document.getElementById("instructionsList");

        // Remove existing "+" button from last item
        const existingPlusButton = document.getElementById("addButton");
        if (existingPlusButton) {
            existingPlusButton.remove();
        }

        // Create new item
        const newListItem = document.createElement("li");
        newListItem.setAttribute("id", `instruction_item_${instructionCount}`);

        // makes input field(s)
        const newInput = document.createElement("input");
        newInput.type = "text";
        newInput.name = "instructions[]";
        newInput.id = `instruction_${instructionCount}`;

        // Create remove button
        const removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.innerText = "-";
        removeButton.classList.add("remove-btn");
        removeButton.setAttribute("data-id", `instruction_item_${instructionCount}`);

        // Add input and "-" button
        newListItem.appendChild(newInput);
        newListItem.appendChild(removeButton);

        // Add the new list item to instructions list
        instructionsList.appendChild(newListItem);

        //  the "+" button ONLY to the last item
        addPlusButtonToLast();
    }

    function removeInput(event) {
        if (event.target.classList.contains("remove-btn")) {
            const itemId = event.target.getAttribute("data-id");
            const item = document.getElementById(itemId);
            const instructionsList = document.getElementById("instructionsList");

            if (instructionsList.children.length > 1) {
                item.remove();
            } else {
                alert("At least one instruction is required.");
            }

            // makes sure the plus is the last item (?)
            addPlusButtonToLast();
        }
    }

    function addPlusButtonToLast() {
        // takes out extra plus buttons
        const existingPlusButton = document.getElementById("addButton");
        if (existingPlusButton) {
            existingPlusButton.remove();
        }

        // gets all list items cuh
        const allItems = document.querySelectorAll("#instructionsList li");

        // the thing that adds the last +
        if (allItems.length > 0) {
            const lastItem = allItems[allItems.length - 1];

            const addButton = document.createElement("button");
            addButton.type = "button";
            addButton.innerText = "+";
            addButton.id = "addButton";
            addButton.addEventListener("click", addInput);

            lastItem.appendChild(addButton);
        }
    }

    // i dont know 
    document.getElementById("instructionsList").addEventListener("click", removeInput);

    // makes sure of something
    addPlusButtonToLast();
});
