let i = 0;
        let imgArray = ['../HTML/foto/Photo13.jpg', '../HTML/foto/Photo14.jpg', '../HTML/foto/Photo15.jpg'];

        function changeImg(){
            document.getElementById('slideshow').src = imgArray[i];

            if(i< imgArray.length -1){
                i++;
            }
            else{
                i=0;
            }
            //setTimeout("changeImg()", 2600);
        }
        document.addEventListener(onload, changeImg());