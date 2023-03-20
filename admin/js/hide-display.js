$(document).ready(function(){
    
    $(".view-details").hide();
    
    setInterval(function(){
        $("#messageCounter").load("includes/counter.php");
        /*$("#ItemCounter").load("includes/count_items.php");
        $("#SupplierCounter").load("includes/count_suppliers.php");
        $("#ReceivedCounter").load("includes/count_received.php");
        $("#StockCounter").load("includes/count_stock.php");*/
    }, 2000); /* time in milliseconds (ie 2 seconds)*/
   
});
    $(".view-details").hide();
    function showOptions(s) {
        var val = s.options[s.selectedIndex].value; // get value
        //var vall = s.options[s.selectedIndex].id; // get id
      
        $(".atm").slideUp();$(".cert").slideUp();$(".dl").slideUp();$(".letter").slideUp();
        $(".national-id").slideUp();$(".novel").slideUp();$(".student-id").slideUp();$(".text-book").slideUp();
        $(".title-deed").slideUp();$(".transcript").slideUp(); $(".voucher").slideUp();$(".work").slideUp();
        $(".passport").slideUp();
      
        if(val === "ATM Card"){
            $(".atm").slideDown(400);
        }else
        if(val === "Certificate"){
            $(".cert").slideDown(400);
        }else
        if(val === "Driving License"){
            $(".dl").slideDown(400);
        }else
        if(val === "Letter"){
            $(".letter").slideDown(400);
        }else
        if(val === "National ID"){
            $(".national-id").slideDown(400);
        }else
        if(val === "Novel"){
            $(".novel").slideDown(400);
        }else
        if(val === "Student ID"){
            $(".student-id").slideDown(400);
        }else
        if(val === "Text Book"){
            $(".text-book").slideDown(400);
        }else
        if(val === "Title Deed"){
            $(".title-deed").slideDown(400);
        }else
        if(val === "Transcript"){
            $(".transcript").slideDown(400);
        }else
        if(val === "Voucher"){
            $(".voucher").slideDown(400);
        }
        if(val === "Work ID"){
            $(".work").slideDown(400);
        }else
        if(val === "Passport"){
            $(".passport").slideDown(400);
        }
        
        
    };
    
    
    function showHide(l) {
        var val = l.options[l.selectedIndex].value; // get value
        //var vall = l.options[l.selectedIndex].id; // get id
        
        if(val === ""){
            $(".view-list").show();
            $(".view-details").hide();
        }else
        if(val === "list"){
            $(".view-list").show();
            $(".view-details").hide();
        }else
        if(val === "details"){
            $(".view-list").hide();
            $(".view-details").show();
        }
    };
    
    function displayVoucher(v){
        var val = v.options[v.selectedIndex].value; // get value
        //var vall = v.options[v.selectedIndex].id; // get id
        
        if(val === ""){
            $(".station").show();
            $(".market").hide();
        }else
        if(val === "Gas Station"){
            $(".station").show();
            $(".market").hide();
        }else
        if(val === "Market"){
            $(".station").hide();
            $(".market").show();
        }
    };
    
    /*
     Display document after clicking submit button
     */
    function atm(){
        $(".atm").show();
    }