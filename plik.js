
function myFunctionO() {


    var x = document.getElementById("Obu").value;
    var xmlhttp = new XMLHttpRequest();


    $(".obudowa").each(function () {
        $(this).hide()
    });
    $("#" + x).show();

}




function myFunctionPG() {


    var x = document.getElementById("plytaG").value;
    $(".plyta").each(function () {
        $(this).hide()
    });
    $("#" + x).show();
    //${'#IdOpisuDoPokazania').show();
    //  document.getElementById("Obudowa").innerHTML = "You selected: " + x;
}




function myFunctionZ() {


    var x = document.getElementById("zasilacz").value;
    $(".zasilacz").each(function () {
        $(this).hide()
    });
    $("#" + x).show();
    //${'#IdOpisuDoPokazania').show();
    //  document.getElementById("Obudowa").innerHTML = "You selected: " + x;
}


function myFunctionPr() {


    var x = document.getElementById("procesor").value;
    $(".procesor").each(function () {
        $(this).hide()
    });
    $("#" + x).show();
    //${'#IdOpisuDoPokazania').show();
    //  document.getElementById("Obudowa").innerHTML = "You selected: " + x;
}



function myFunctionPa() {


    var x = document.getElementById("pamiec").value;
    $(".pamiec").each(function () {
        $(this).hide()
    });
    $("#" + x).show();
    //${'#IdOpisuDoPokazania').show();
    //  document.getElementById("Obudowa").innerHTML = "You selected: " + x;
}


  
            //Browser Support Code
            function ajaxFunction() {
                var ajaxRequest;  // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequest = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }

                // Create a function that will receive data 
                // sent from the server and will update
                // div section in the same page.

                ajaxRequest.onreadystatechange = function () {
                    if (ajaxRequest.readyState == 4) {

                        var ajaxDisplay = document.getElementById('PlyGluDiv');
                        ajaxDisplay.innerHTML = ajaxRequest.responseText;

                    }
                }

                // Now get the value from user and pass it to
                // server script.


                var obud = document.getElementById('Obu').value;

                var queryString = "?obud=" + obud;

                ajaxRequest.open("GET", "html/Controller/Plyta.php" + queryString, true);

                ajaxRequest.send(null);
            }
            //

   
//        <!-- Przesyłanie zmiennej z selecta Obudowa do wybierania zasilacza  -->
     

            //Browser Support Code
            function ajaxFunctionZ() {
                var ajaxRequestZ;  // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequestZ = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequestZ = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequestZ = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }

                // Create a function that will receive data 
                // sent from the server and will update
                // div section in the same page.

                ajaxRequestZ.onreadystatechange = function () {
                    if (ajaxRequestZ.readyState == 4) {

                        var ajaxDisplayZ = document.getElementById('zasilaczDiv');
                        ajaxDisplayZ.innerHTML = ajaxRequestZ.responseText;

                    }
                }

                // Now get the value from user and pass it to
                // server script.


                var obud = document.getElementById('Obu').value;

                var queryString = "?obud=" + obud;

                ajaxRequestZ.open("GET", "html/Controller/Zasilacz.php" + queryString, true);

                ajaxRequestZ.send(null);
            }


      

//        <!--Przesyłanie danych z selecta Płyta główna    Do możliwości wyboru Procesora                -->

      

            //Browser Support Code
            function ajaxFunctionPr() {
                var ajaxRequestPr;  // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequestPr = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequestPr = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequestPr = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }

                // Create a function that will receive data 
                // sent from the server and will update
                // div section in the same page.

                ajaxRequestPr.onreadystatechange = function () {
                    if (ajaxRequestPr.readyState == 4) {

                        var ajaxDisplayPr = document.getElementById('ProcesorDiv');
                        ajaxDisplayPr.innerHTML = ajaxRequestPr.responseText;

                    }
                }

                // Now get the value from user and pass it to
                // server script.


                var plyglo = document.getElementById('plytaG').value;

                var queryString = "?plyglo=" + plyglo;

                ajaxRequestPr.open("GET", "html/Controller/Procesor.php" + queryString, true);

                ajaxRequestPr.send(null);
            }
            //

     
//        <!-- Przesyłanie zmiennej z selecta Obudowa do wybierania Pamięci  -->
    
        function ajaxFunctionPa() {
                var ajaxRequestPa;  // The variable that makes Ajax possible!

                try {
                    // Opera 8.0+, Firefox, Safari
                    ajaxRequestPa = new XMLHttpRequest();
                } catch (e) {
                    // Internet Explorer Browsers
                    try {
                        ajaxRequestPa = new ActiveXObject("Msxml2.XMLHTTP");
                    } catch (e) {
                        try {
                            ajaxRequestPa = new ActiveXObject("Microsoft.XMLHTTP");
                        } catch (e) {
                            // Something went wrong
                            alert("Your browser broke!");
                            return false;
                        }
                    }
                }

                // Create a function that will receive data 
                // sent from the server and will update
                // div section in the same page.

                ajaxRequestPa.onreadystatechange = function () {
                    if (ajaxRequestPa.readyState == 4) {

                        var ajaxDisplayPa = document.getElementById('PamiecDiv');
                        ajaxDisplayPa.innerHTML = ajaxRequestPa.responseText;

                    }
                }

                // Now get the value from user and pass it to
                // server script.


                var plyglo = document.getElementById('plytaG').value;

                var queryString = "?plyglo=" + plyglo;

                ajaxRequestPa.open("GET", "html/Controller/Pamiec.php" + queryString, true);

                ajaxRequestPa.send(null);
            }
            //



            //