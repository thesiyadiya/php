<html lang="en">
    <head>
        <body>
            <table id="main" border="0" callspacing="0">
                <tr>
                    <td id="header">
                        <h1> php with ajax</h1>
                    </td>
                </tr>
                <tr>
                    <td id="table-load">
                        <input type="button" id="load-button" value="Load Data">
                    </td>
                </tr>
                <tr>
                    <td id="table-data">
                        <table border="1" width="100%"" cellpacing="0" cellpadding="10px">
                            <tr>
                                <th>sr</th>
                                <th>name</th>
                                <th>password</th>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#load-button").on("click",function(e){
                    $.ajax({
                        url:"ajax-load.php",
                        type:"POST",
                        success:function(data){
                            $("#table-data").html(data);
                        }
                    });
                });

            });
            </script>
                    </body>
    </head>
</html>
