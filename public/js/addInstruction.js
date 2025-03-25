let instructionCount = 1;

//new instruction input

function addInput() {
    instructionCount++;
    const instructionList = document.getElementById("instructionList");

//create list item

const newListItem = document.createElement("li");

//new input field

const newInput = document.createElement("input");
newInput.type = "text";
newInput.name = "instruction[]";
newInput.id = `instruction_${instructionCount}`;

//?? something input field to list item

newListItem.appendChild(newInput);

instructionList.appendChild(newListItem);

}
//this is for removal
function removeInput() {
    const instructionsList = document.getElementById("instructionsList");

    // Check if there are any input fields to remove
    if (instructionsList.children.length > 1) {
        instructionsList.removeChild(instructionsList.lastElementChild);
        instructionCount--;
    }
}

