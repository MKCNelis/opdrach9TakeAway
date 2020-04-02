<script>
 
    function show(x) { 
        switch(x) { 
         case x.style.display='none':  
        x.style.display='block'; 
        break; 
        case x.style.display=='block':
            x.style.display='none'; 
        break;} 
        return false;
    }   
</script> 


 <div id="openen"><a href="#1" name="1" onmouseover="return show(this);">click here</a></div> 
    <div id="benefits" style="display:none;">some input in here plus the close button 
           <div id="upbutton"><a onmouseover="return hide(this);">click here</a></div> 
    </div> 