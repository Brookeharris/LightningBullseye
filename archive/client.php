<!---------------------------------------------------------------------------
Example client script for JQUERY:AJAX -> PHP:MYSQL example
---------------------------------------------------------------------------->

<html>
  <head>
    <script language="javascript" type="text/javascript" src="jquery.js"></script>
  </head>
  <body>

  <!-------------------------------------------------------------------------
  1) Create some html content that can be accessed by jquery
  -------------------------------------------------------------------------->
  <h2> Client example </h2>
  <h3>Output: </h3>
  <div id="output">this element will be accessed by jquery and this text replaced</div>

  <script id="source" language="javascript" type="text/javascript">

  $(function () 
  {
    //-----------------------------------------------------------------------
    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
    //-----------------------------------------------------------------------
    $.ajax({                                      
      url: 'api.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
		
        var dateVar = data[1];              //get id
        var timeVar = data[2];           //get name
		var temp = data[3]; 
		var pressure = data[4]; 
		var humidity = data[5]; 
        
		  //--------------------------------------------------------------------
        // 3) Update html content
        //--------------------------------------------------------------------
        $('#output').html("<b>Date: </b>"+dateVar+"<b> Time: </b>"+timeVar+"<b> Temp: </b>"+temp); //Set output element html
        //recommend reading up on jquery selectors they are awesome 
        // http://api.jquery.com/category/selectors/
      } 
    });
  }); 

  </script>
  </body>
</html>