document.addEventListener('DOMContentLoaded', () => {
    var userGrid = document.querySelector('.grid-user');
    var ReferGrid = document.querySelector('.grid-refer');
    var displayGrid = document.querySelector('.grid-display');
    var ships = document.querySelectorAll('.ship');
    var destroyer = document.querySelector('.destroyer');
    var cruiser = document.querySelector('.cruiser');
    var submarine = document.querySelector('.submarine');
    var battleship = document.querySelector('.battleship');
    var carrier = document.querySelector('.carrier');
    var rotatebutton = document.querySelector('#rotate');
    var startbutton = document.querySelector('#start');
    var turnDisplay = document.querySelector('#whose-go')
    var infoDisplay = document.querySelector('#info')
    var usercell = [];
    var usercellrefer = [];
    var arrboats = [];



    const width = 10;

    function createtable(grid, squares, width) {
        for (var i = 0; i < width * width; i++) {
            const square = document.createElement('div')
            square.dataset.id = i;
            grid.appendChild(square)
            squares.push(square)


        }
    }

    createtable(userGrid, usercell, width); // making the board where user will place their ships 
    // createtable(ReferGrid, usercellrefer, width); // they will fight here on this board 

    const shiparr = [{
            name: "destroyer",
            directions: []
        },
        {
            name: "submarine",
            directions: []
        },
        {
            name: "cruiser",
            directions: []

        },
        {
            name: "battleship",
            directions: []


        },
        {
            name: "carrier",
            directions: []


        },

    ]
    var ishorizontal = true;

    function rotate() {
        if (ishorizontal == true) {
            destroyer.classList.toggle('destroyer-vertical')
            submarine.classList.toggle('submarine-vertical')
            cruiser.classList.toggle('cruiser-vertical')
            battleship.classList.toggle('battleship-vertical')
            carrier.classList.toggle('carrier-vertical')
            ishorizontal = false;
            console.log(ishorizontal)
        } else {
            destroyer.classList.toggle('destroyer')
            submarine.classList.toggle('submarine')
            cruiser.classList.toggle('cruiser')
            battleship.classList.toggle('battleship')
            carrier.classList.toggle('carrier')
            ishorizontal = true;
            console.log(ishorizontal)
        }
    }
    rotatebutton.addEventListener('click', rotate)

    // Array.from(ships).forEach(ship => ship.addEventListener('dragstart', dragingStart))
    ships.forEach(ship => ship.addEventListener('dragstart', dragingStart))
    usercell.forEach(square => square.addEventListener('dragstart', dragingStart))
    usercell.forEach(square => square.addEventListener('dragover', dragingOver))
    usercell.forEach(square => square.addEventListener('dragenter', dragingEnter))
    usercell.forEach(square => square.addEventListener('dragleave', dragingLeave))
    usercell.forEach(square => square.addEventListener('drop', dragingDrop))
    usercell.forEach(square => square.addEventListener('dragend', dragingEnd))

    let selectedIndex
    let draggedship
    let draggedlength
    let draggedcount = 0;

    ships.forEach(ship => ship.addEventListener('mousedown', e => {
        selectedIndex = e.target.id;
    }))

    function dragingStart(e) {
        draggedship = e.target
        draggedlength = e.target.childNodes.length;
        console.log(draggedlength)
        console.log(draggedship)

    }

    function dragingOver(e) {
        e.preventDefault()
    }

    function dragingEnter(e) {
        e.preventDefault()
    }

    function dragingLeave() {
        console.log('leaving the drag')
    }

    function dragingDrop() {
        let shipnameId = draggedship.lastElementChild.id
        let shipclass = shipnameId.slice(0, -1) //change the id from carrier-0 to carrier
        console.log(shipclass)
        let lastshipindex = parseInt(shipnameId.substr(-1)) //taking the index number to make sure its in the grid

        let shiplastid = lastshipindex + parseInt(this.dataset.id)

        selectedShipIndex = parseInt(selectedIndex.substr(-1))
        console.log(selectedShipIndex)

        shiplastid = shiplastid - selectedShipIndex;

        // const notallowedhor = [0,10,20,30,40,50,60,70,80,90,1,11,21,31,41,51,61,71,81,91,2,22,32,42,52,62,72,82,92,3,13,23,33,43,53,63,73,83,93]
        // const notallowedver = []


        if (ishorizontal == true) {

            if (shipclass === "destroyer") {
                for (let i = 0; i < 2; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add("taken", "destroyer")
                    shiparr[0].directions.push(parseInt(this.dataset.id) - selectedShipIndex + i);
                }
            }

            if (shipclass === "submarine") {
                for (let i = 0; i < 3; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add("taken", "submarine")
                    shiparr[1].directions.push(parseInt(this.dataset.id) - selectedShipIndex + i);
                }
            }
            if (shipclass === "cruiser") {
                for (let i = 0; i < 3; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add("taken", "cruiser")
                    shiparr[2].directions.push(parseInt(this.dataset.id) - selectedShipIndex + i);
                }
            }
            if (shipclass === "battleship") {
                for (let i = 0; i < 4; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add("taken", "battleship")
                    shiparr[3].directions.push(parseInt(this.dataset.id) - selectedShipIndex + i);
                }
            }
            if (shipclass === "carrier") {
                for (let i = 0; i < 5; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + i].classList.add("taken", "carrier")
                    shiparr[4].directions.push(parseInt(this.dataset.id) - selectedShipIndex + i);
                }
            }
        } else if (ishorizontal == false) {

            if (shipclass === "destroyer") {
                for (let i = 0; i < 2; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + (width * i)].classList.add("taken", "destroyer")
                    shiparr[0].directions.push(parseInt(this.dataset.id) - selectedShipIndex + (width * i));
                }
            }
            if (shipclass === "submarine") {
                for (let i = 0; i < 3; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + (width * i)].classList.add("taken", "submarine")
                    shiparr[1].directions.push(parseInt(this.dataset.id) - selectedShipIndex + (width * i));
                }
            }
            if (shipclass === "cruiser") {
                for (let i = 0; i < 3; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + (width * i)].classList.add("taken", "cruiser")
                    shiparr[2].directions.push(parseInt(this.dataset.id) - selectedShipIndex + (width * i));
                }
            }
            if (shipclass === "battleship") {
                for (let i = 0; i < 4; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + (width * i)].classList.add("taken", "battleship")
                    shiparr[3].directions.push(parseInt(this.dataset.id) - selectedShipIndex + (width * i));
                }
            }
            if (shipclass === "carrier") {
                for (let i = 0; i < 5; i++) {
                    usercell[parseInt(this.dataset.id) - selectedShipIndex + (width * i)].classList.add("taken", "carrier")
                    shiparr[4].directions.push(parseInt(this.dataset.id) - selectedShipIndex + (width * i));
                }
            }
        } else {
            return
        }
        draggedcount = draggedcount + 1;
        displayGrid.removeChild(draggedship);
        console.log(shiparr)


        if (draggedcount >= 5) {
            console.log(draggedcount);
            displayGrid.remove();
        }

    }


    function dragingEnd() {
        console.log("dragend")
    }

    function startgame() {

        temp_arr = JSON.stringify(shiparr);
        console.log(temp_arr);
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    document.getElementById("txthint").innerHTML = this.responseText;
                }
            }
        };
        xhr.open("GET", "game.php?obj=" + temp_arr, true);
        xhr.send();
    }


    startbutton.addEventListener('click', startgame)
});