let addFieldTL = () => {
    let checkIfExist = document.getElementsByClassName('team-number')
    let numberTeam, teamNameLabel, labelText, inputTeamName, teamNumberLabel,teamNumberLabelText;
    if (checkIfExist.length == 0) {
        teamNameLabel = document.createElement('label')
        labelText = document.createTextNode("What would ne your team's name?")
        teamNameLabel.appendChild(labelText)
        inputTeamName = document.createElement('input')
        inputTeamName.setAttribute("class", "form-control mt-2 mb-3")
        inputTeamName.setAttribute("placeholder", "Team Name")
        inputTeamName.setAttribute("name", "teamName")

        teamNumberLabel = document.createElement('label')
        teamNumberLabelText = document.createTextNode("How many team members is your team?")
        
        numberTeam = document.createElement('select')
        numberTeam.setAttribute("class", "form-control")
        numberTeam.setAttribute("class", "team-number")
        numberTeam.setAttribute("id", "team")
        numberTeam.setAttribute("name", "teamNum")

        for (let i = 2; i <= 5; i++) {
            let choice = document.createElement('option')
            choice.setAttribute("value", i)
            let text = document.createTextNode(i)
            choice.appendChild(text)
            numberTeam.appendChild(choice)
        }
    }
    const form = document.getElementById('adds')
    form.appendChild(teamNameLabel)
    form.appendChild(inputTeamName)
    form.appendChild(teamNumberLabel)
    form.appendChild(teamNumberLabelText)
    form.appendChild(numberTeam)
}

let checkField = () => {
    let checkIfExist = document.getElementById('adds')
    if(checkIfExist.innerHTML) {
        checkIfExist.innerHTML = ''
    }
    // if (checkIfExist.length > 0) {
    //     checkIfExist.forEach(element => {
    //         console.log(element);
    //     });
    // }
}