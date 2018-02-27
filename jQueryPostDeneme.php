<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
    <?php 

    if(isset($_POST['name'])){
        $query = "SELECT * FROM student where name=".$_POST['name'];
        echo $query;
    }
    if(isset($_POST['city']))
        echo "<br>".$_POST['city'];
    ?>
    <button id="btn" >Send</button>

    <button id="btn2">Send - 2</button>








  <script>



    var path = "/jQueryPostDeneme.php";
    var params = {name: 'Johnny Bravo',city:'Ankara'};
    var method;

    $(document).ready(function () {
        $("#btn").on("click",function(){
            alert("231");

            method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
});
    });


</script>

<script>
/*
    var name = "Engin Bakır";
    var city = "Tokat";

    $(document).ready(function () {
        $("#btn2").on("click",function(){
            $.ajax({
                type:"POST",
                url:"/jQueryPostDeneme.php",
                data:{name:name,city:city},
                success:function(data){

           alert(data);
           location.reload();
       }
   });
        });
    });

    */
</script>

</body>
</html>