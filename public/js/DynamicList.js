document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".dynamic-list").forEach(setupList);
    
    function setupList(list) {
        let itemCount = list.querySelectorAll("li").length || 1;

        function addInput() {
            itemCount++;
            const newListItem = document.createElement("li");
            newListItem.setAttribute("id", `${list.id}_item_${itemCount}`);

            // Create input field
            const newInput = document.createElement("input");
            newInput.type = "text";
            newInput.name = list.dataset.inputName || "ListItems[]";
            newInput.id = `${list.id}_input_${itemCount}`;

            // Create remove button
            const removeButton = document.createElement("button");
            removeButton.type = "button";
            removeButton.innerText = "-";
            removeButton.classList.add("remove-btn");
            removeButton.setAttribute("data-id", `${list.id}_item_${itemCount}`);

            // Append elements
            newListItem.appendChild(newInput);
            newListItem.appendChild(removeButton);
            list.appendChild(newListItem);

            updatePlusButton();
        }

        function removeInput(event) {
            if (event.target.classList.contains("remove-btn")) {
                const itemId = event.target.getAttribute("data-id");
                const item = document.getElementById(itemId);

                if (list.children.length > 1) {
                    item.remove();
                } else {
                    alert("At least one item is required.");
                }
                updatePlusButton();
            }
        }

        function updatePlusButton() {
            list.querySelectorAll(".add-btn").forEach(btn => btn.remove());

            const lastItem = list.querySelector("li:last-child");
            if (lastItem) {
                const addButton = document.createElement("button");
                addButton.type = "button";
                addButton.innerText = "+";
                addButton.classList.add("add-btn");
                addButton.addEventListener("click", addInput);

                lastItem.appendChild(addButton);
            }
        }

        list.addEventListener("click", removeInput);
        updatePlusButton();
    }
});
