@include('web.header')
<style>
    .collapsible {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
 .collapsible:hover {
  background-color: #ccc;
}

/* Style the collapsible content. Note: hidden by default */
.content1 {
  padding: 0 18px;
  display: none;
  overflow: hidden;
 
}

.collapsible{
    color: rgba(105,202,71,1);
}
.a{
    background-color: #dff2fe;
    border-color: #cfebfe;
    border-radius: 5px;
    border: 1px;
    padding: 9px 15px 9px 40px!important;
}
.fa-color{
    color:blue;
    font-size: 20px;
}
.line
 {
   height:50px;
   float:left;
   margin-left:5px;
   margin-right:30px;
   border:0px solid Chartreuse;
   width:2px;
   border-left-width:3px;
}

.line1
 {
   height:160px;
   float:left;
   margin-left:5px;
   margin-right:30px;
   border:0px solid Chartreuse;
   width:2px;
   border-left-width:3px;
}

.line2
 {
   height:70px;
   float:left;
   margin-left:5px;
   margin-right:30px;
   border:0px solid Chartreuse;
   width:2px;
   border-left-width:3px;
}
</style>

<div class="container">
    <br><br>
    <div class="a">
    <i class="fas fa-info-circle fa-color"></i>
       <span class="text-muted">
Due to rise in COVID-19 cases, your order could be slightly delayed. It can take 8-10 Days. We are Putting maximum efforts to ensure it reaches you as soon as possible.</span>
    </div>
    <br><br>
    <div>
<button type="button" class="collapsible">Delivery information </button>
<div class="content1">
    <br>
    <div class="line"></div>
  <p>Delivery Information includes the customer’s name, shipping address, contact details, customer’s email ID, and Delivery Time and Date for the placed order. Delivery information includes order price, quantity, and the date & time when the order was placed.
</p>
</div>
</div>
<br>
    <div>
<button type="button" class="collapsible">Tracking Information</button>
<div class="content1">
    <br>
    <div class="line"></div>
  <p>After the payment is made tracking information will be shared in 36 to 48 Hours. Delivery time will be 4-6 Days depending upon the address provided.<br><br>

<h3>USA Domestic Orders</h3>
<h5>
“Shipping label created”
</h5>
 <br>
 <p>
   <div class="line1"></div>
This is when your item has been dropped off at the postal centre and not
been scanned before it has been forwarded to your local USPS facility. <br><br>

This can happen for a number of reasons based on which State you had your product delivered from.<br><br>

We dispatch all orders in the given time frames, so even your tracking number is not working, don’t worry, your order is on its way to you.<br><br>

To track your order we suggest 17track.net </p>
</p>
</div>
</div>
<br>

    <div>
<button type="button" class="collapsible">Order processing and delivery time</button>
<div class="content1">
    <br>
    <div class="line2"></div>
  <p>Payment to be done by the customer once the order is placed. You will be notified via mail or text once payment is received. Upon the confirmation of the order, tracking information will be shared within 24-48 hours. The delivery of the order will be within 3-5 working days and may vary depending on the postal services of the area.
</p>
</div>
</div>
<br>

    <div>
<button type="button" class="collapsible">Packaging of Orders</button>
<div class="content1">
    <br>
    <div class="line2"></div>
  <p>Order Packaging refers to the different methods used to package different orders. For fragile products or the product vulnerable to spill, we use different precautions to resist any damage to the placed order. We ensure the product reaches our customers the same way they expect to maintain its quality.
</p>
</div>
</div>
<br>

    <div>
<button type="button" class="collapsible">Undelivered Orders</button>
<div class="content1">
    <br>
    <div class="line"></div>
  <p>An order is said to Undelivered when the recipient refuses to accept it, Package is damaged during the transit,Delivery address is incorrect,or nobody is available to receive the order at the specified delivery address even after multiple attempts.The order will be returned to us.
</p>
</div>
</div>
<br>

    <div>
<button type="button" class="collapsible">Contact us</button>
<div class="content1">
    <br>
    <div class="line"></div>
  <p>In an exceptional case, such as order delays, help regarding order cancellation, or non-refund of order fee, you are advised to contact our customer support service center via the given methods of communication.
</p>
</div>
</div>
<br>

    

				<img width="1750" height="400" src="{{asset('public/assets/imgs')}}/banner5-1536x351.jpg" class="img" alt="Delivery images" loading="lazy" sizes="(max-width: 1750px) 100vw, 1750px" scrset="" >
               



</div>

<script>
    var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
</script>
@include('web.footer')