document.addEventListener("DOMContentLoaded", function () {
    let instructionCount = 1;

    // Function to add a new input field with a remove button
    function addInput() {
        instructionCount++;
        const instructionsList = document.getElementById("instructionsList");

        // Create a new list item for the instruction
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
        removeButton.classList.add("remove-btn");
        removeButton.setAttribute("data-id", `instruction_item_${instructionCount}`);

        // Append the input and remove button to the new list item
        newListItem.appendChild(newInput);
        newListItem.appendChild(removeButton);

        // Append the new list item to the instructions list
        instructionsList.appendChild(newListItem);

        // Make sure the "+" button is only on the last item
        addPlusButtonToLast();
    }

    // Function to remove an instruction input
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

            // Ensure that the "+" button is always the last item
            addPlusButtonToLast();
        }
    }

    // Function to add the "+" button to the last list item
    function addPlusButtonToLast() {
        const existingPlusButton = document.getElementById("addButton");
        if (existingPlusButton) {
            existingPlusButton.remove();
        }

        // Get all list items
        const allItems = document.querySelectorAll("#instructionsList li");

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

    // Attach the event listener to remove items when the remove button is clicked
    document.getElementById("instructionsList").addEventListener("click", removeInput);

    // Make sure there's a "+" button on the last item initially
    addPlusButtonToLast();
});
