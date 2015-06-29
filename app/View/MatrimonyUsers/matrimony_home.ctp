
	<?php 
		echo $this->Html->css(array('style3'));
		echo $this->Html->script(array('modernizr.custom.86080'));
	?>
	<style type="text/css">
	    
 		.navbar-header{
 		   /* background: rgba(255,255,255,0.8); */
 		}
 		   
    	#globalFooter{
    		position: fixed;
    		bottom: 0;
    		/* background: rgba(238,238,238,0.8); */
    	}
    
    	.matriSearch{
    		position: fixed;
		    bottom: 120px;
		     background: rgba(255,255,255,0.8); 
		    width: 100%;
		    left: 0;
		    /* background-color: #fff; */
    	}
    
    </style>

<div id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
            <li><span>Image 05</span></li>
            <li><span>Image 06</span></li>
        </ul>
        <div class="container">
            <div class="matriSearch">
            	<?php echo $this->element('searchBasic');?>
<!--  			    <form class="form-inline horizontal-form" role="form"> -->
<!-- 				    <table> -->
<!-- 				    	<tbody> -->
<!-- 				    		<tr> -->
<!-- 				    			<td><input type="radio">Bride</td> -->
<!-- 				    			<td></td> -->
<!-- 				    			<td><input type="radio">Groom</td> -->
<!-- 				    			<td></td> -->
<!-- 				    			<td class="">Age</td> -->
<!--  				    			<td><input class="form-control" type="text" placeholder="18" style="width:45px;"></td>-->
<!-- 				    			<td>to</td> -->
<!-- 				    			<td><input class="form-control" type="text" placeholder="40" style="width:45px;"></td> -->
<!-- 				    			<td><button type="button" class="btn btn-info"><span class="glyphicon glyphicon-search"></span>  Search</button></td> -->
<!-- 				    			<td></td> -->
<!-- 				    		</tr> -->
<!-- 				    	</tbody> -->
<!-- 				    </table> -->
<!-- 			  	</form>    -->
            
                <div class="clr"></div>
            </div>
        </div>
      </div> 