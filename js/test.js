//project name input
projectNameInput = document.getElementById("projectNameInput");
projectName = document.getElementById("projectName");

projectNameInput.addEventListener("input", (e) => {
    projectName.innerHTML = projectNameInput.value;
});

//short description input
shortDescriptionInput = document.getElementById("shortDescriptionInput");
shortDescription = document.getElementById("shortDescription");

shortDescriptionInput.addEventListener("input", (e) => {
    shortDescription.innerHTML = shortDescriptionInput.value;
});

//image input
imageInput = document.getElementById("imageInput");
image = document.getElementById("image");

imageInput.addEventListener("change", function (event) {
    const imageURL = URL.createObjectURL(imageInput.files[0]);
    image.src = imageURL;
});

//select program
programsSelect = document.getElementById("programsSelect");
selectedPrograms = document.getElementById("selectedPrograms");
usedPrograms = document.getElementById('usedPrograms');
// set to '' to ensur its empty
usedPrograms.value = ''

totalSelected = 0;

// listens if there is a change with the program select dropdown
programsSelect.addEventListener("change", function (event) {
    // get value e.g scss or html from the selected option
    selectedValue = programsSelect.value;

    // set hidden input to 
    if (totalSelected == 0) {
        usedPrograms.value = '';
        usedPrograms.value = selectedValue;
    } else {
        usedPrograms.value = usedPrograms.value + ', ' + selectedValue;
    }
    totalSelected++;
    
    // delete and set index to reset program select
    programIndex = programsSelect.selectedIndex;
    programsSelect.selectedIndex = 0;
    programsSelect.remove(programIndex);

    // create program element to see selected (creates an element under the <select>)
    selectedPrograms.appendChild(createProgram(selectedValue));

    // create program in example(small example for what is on the home page)
    programImage = document.createElement('img')
    programImage.alt = selectedValue
    programImage.src = 'images/programs/' + selectedValue + '.svg'
    programImage.id = selectedValue + 'program'

    document.getElementById('icons').appendChild(programImage)
});

//delete selected program (gets called when the minus button is clicked) 
function deleteProgram() {
    // deletes parent of the minus button
    id = document.getElementById(event.srcElement.id);
    id.parentElement.remove();

    if (usedPrograms.value.includes(', ' + id.id)) {
        console.log('test1')
        usedPrograms.value = usedPrograms.value.replace(', ' + id.id, '')
    } else {
        console.log('test2')
        usedPrograms.value = usedPrograms.value.replace(id.id, '')
    }
    

    // recreates the option in select program(id = programSelect)
    option = document.createElement("option");
    // id.id comes from the minus button(the id is partly for storing the name)
    option.value = id.id;
    option.innerHTML = id.id;
    programsSelect.appendChild(option);

    // deletes icon in example(small example for what is on the home page)
    // the name of the icon is the name of the element + 'program' 
    iconId = id.id + 'program'
    iconId = document.getElementById(iconId)
    iconId.remove();
}

// creates element under select (gets called in programsSelect event listener)
function createProgram(selectedValue) {
    const program = document.createElement("div");
    program.id = "program";

    const pElement = document.createElement("p");
    pElement.textContent = selectedValue;

    const buttonElement = document.createElement("button");
    // the id is partly for storing the name(when the element is deleted it gets the name from here)
    buttonElement.id = selectedValue;
    buttonElement.type = "button";
    buttonElement.className = "minus";
    buttonElement.onclick = function () {
        deleteProgram();
    };

    program.appendChild(pElement);
    program.appendChild(buttonElement);

    return program
}
