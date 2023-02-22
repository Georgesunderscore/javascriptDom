<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="board"></div>
    </div>
<script>
    
    function shuffleChildren(parent){
        let children = parent.children
        let i = children.length, k ,temp
        while(--i >= 0){
            k = Math.floor(Math.random()*(i+1))
            temp = children[k]
            children[k] = children[i]
            parent.appendChild(temp)
        }
    }
    
    function showReaction(type, clickedBox){
        clickedBox.classList.add(type)
        if(type != "success"){
            setTimeout(function(){
                clickedBox.classList.remove(type)
            }, 800)
        }
    }

    const box = document.createElement("div");
    box.classList.add("box");
    
    const board = document.querySelector("#board");


    let nb = 1

    for(let i = 1; i<= 10; i++){
        let newbox = box.cloneNode()
        newbox.innerText = i
        board.appendChild(newbox)

            newbox.addEventListener("click", function(){
                if(i == nb){
                    newbox.classList.add("box-valid")
                    if(nb == board.children.length ){
                        board.querySelectorAll(".box").forEach(function(box){
                            showReaction("succes", box)
                        })
                    }
                    nb++
                }
                else if(i > nb){
                    showReaction("error", newbox)
                    board.querySelectorAll(".box-valid").forEach(function(validBox){
                        validBox.classList.remove("box-valid")
                    })
                    nb = 0
                    
                }
                else{
                    showReaction("notice", newbox)
                    shuffleChildren(board)
                }
            })
    }
    //end for loop

    shuffleChildren(board)




</script>
</body>
</html>