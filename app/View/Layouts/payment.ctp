<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <script type="text/javascript" 
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script type="text/javascript" 
        src="https://openpay.s3.amazonaws.com/openpay.v1.min.js"></script>
<script type='text/javascript' 
  src="https://openpay.s3.amazonaws.com/openpay-data.v1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  

<script type="text/javascript">
        $(document).ready(function() {

            OpenPay.setId('mzdtln0bmtms6o3kck8f');
            OpenPay.setApiKey('pk_f0660ad5a39f4912872e24a7a660370c');
            OpenPay.setSandboxMode(true);
            var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
            
            $('#pay-button').on('click', function(event) {
                event.preventDefault();
                $("#pay-button").prop( "disabled", true);
                OpenPay.token.extractFormAndCreate('payment-form', sucess_callbak, error_callbak);                
            });

            var sucess_callbak = function(response) {
              var token_id = response.data.id;
              $('#token_id').val(token_id);
              $('#payment-form').submit();
            };

            var error_callbak = function(response) {
                var desc = response.data.description != undefined ? response.data.description : response.message;
                alert("ERROR [" + response.status + "] " + desc);
                $("#pay-button").prop("disabled", false);
            };

        });
    </script>

<style>
@charset "US-ASCII";
@import "http://fonts.googleapis.com/css?family=Lato:300,400,700";

*, ::after, ::before {
     box-sizing: inherit !important; 
}
* {
    color: #444;
    font-family: Lato;
    font-size: 16px;
    font-weight: 300;
}
::-webkit-input-placeholder {
   font-style: italic;
}
:-moz-placeholder {
   font-style: italic;
}
::-moz-placeholder {
   font-style: italic;
}
:-ms-input-placeholder {  
   font-style: italic;
}

body {
    float: left;
    margin: 0;
    padding: 0;
    width: 100%;
}
strong {
	font-weight: 700;
}
a {
    cursor: pointer;
    display: block;
    text-decoration: none;
}
a.button {
    border-radius: 5px 5px 5px 5px;
    -webkit-border-radius: 5px 5px 5px 5px;
    -moz-border-radius: 5px 5px 5px 5px;
    text-align: center;
    font-size: 21px;
    font-weight: 400;
    padding: 12px 0;
    width: 100%;
    display: table;
    background: #E51F04;
    background: -moz-linear-gradient(top,  #E51F04 0%, #A60000 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#E51F04), color-stop(100%,#A60000));
    background: -webkit-linear-gradient(top,  #E51F04 0%,#A60000 100%);
    background: -o-linear-gradient(top,  #E51F04 0%,#A60000 100%);
    background: -ms-linear-gradient(top,  #E51F04 0%,#A60000 100%);
    background: linear-gradient(top,  #E51F04 0%,#A60000 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#E51F04', endColorstr='#A60000',GradientType=0 );
}
a.buttonback {
    border-radius: 5px 5px 5px 5px;
    -webkit-border-radius: 5px 5px 5px 5px;
    -moz-border-radius: 5px 5px 5px 5px;
    text-align: center;
    font-size: 21px;
    font-weight: 400;
    padding: 12px 0;
    width: 100%;
    display: table;
    background: #E51F04;
    background: -moz-linear-gradient(top,  #cccccc 0%, #ff4444 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#cccccc), color-stop(100%,#ff4444));
    background: -webkit-linear-gradient(top,  #cccccc 0%,#ff4444 100%);
    background: -o-linear-gradient(top,  #cccccc 0%,#ff4444 100%);
    background: -ms-linear-gradient(top,  #cccccc 0%,#ff4444 100%);
    background: linear-gradient(top,  #cccccc 0%,#ff4444 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#cccccc', endColorstr='#ff4444',GradientType=0 );
}
a.button i, a.buttonback i {
    margin-right: 10px;
}
a.button.disabled, a.buttonback.disabled {
    background: none repeat scroll 0 0 #ccc;
    cursor: default;
}
.bkng-tb-cntnt {
    float: left;
    width: 800px;
}
.bkng-tb-cntnt a.button, .bkng-tb-cntnt a.buttonback {
    color: #fff;
    float: right;
    font-size: 14px;
    padding: 5px 20px;
    width: auto;
}
.bkng-tb-cntnt a.button.o, .bkng-tb-cntnt a.buttonback.o {
    background: none repeat scroll 0 0 rgba(0, 0, 0, 0);
    color: #e51f04;
    border: 1px solid #e51f04;
}
.bkng-tb-cntnt a.button i, .bkng-tb-cntnt a.buttonback i {
    color: #fff;
}
.bkng-tb-cntnt a.button.o i, .bkng-tb-cntnt a.buttonback.o i {
    color: #e51f04;
}
.bkng-tb-cntnt a.button.right i, .bkng-tb-cntnt a.buttonback.right i {
    float: right;
    margin: 2px 0 0 10px;
}
.bkng-tb-cntnt a.button.left, .bkng-tb-cntnt a.buttonback.left {
    float: left;
}
.bkng-tb-cntnt a.button.disabled.o, bkng-tb-cntnt a.buttonback.disabled.o  {
    border-color: #ccc;
    color: #ccc;
}
.bkng-tb-cntnt a.button.disabled.o i, .bkng-tb-cntnt a.buttonback.disabled.o i {
    color: #ccc;
}
.pymnts {
    float: left;
    width: 800px;
}
.pymnts * {
    float: left;
}

.sctn-row {
    margin-bottom: 35px;
    width: 800px;
}
.sctn-col {
    width: 375px;
}
.sctn-col.l {
    width: 425px;
}
.sctn-col input {
    border: 1px solid #ccc;
    font-size: 18px;
    line-height: 24px;
    padding: 10px 12px;
    width: 333px;
}
.sctn-col label {
    font-size: 18px;
    line-height: 18px;
    margin-bottom: 7px;
    width: 100%;
}
.sctn-col.x3 {
    width: 300px;
}
.sctn-col.x3.last {
    width: 200px;
}
.sctn-col.x3 input {
    width: 210px;
}
.sctn-col.x3 a {
    float: right;
}
.pymnts-sctn {
    width: 800px;
}
.pymnt-itm {
    margin: 0 0 3px;
    width: 800px;
}
.pymnt-itm h2 {
    background-color: #e9e9e9;
    font-size: 18px;
    line-height: 18px;
    margin: 0;
    padding: 28px 0 28px 20px;
    width: 780px;
}
.pymnt-itm.active h2 {
    background-color: #e51f04;
    color: #fff;
    cursor: default;
}
.pymnt-itm div.pymnt-cntnt {
    display: none;
}
.pymnt-itm.active div.pymnt-cntnt {
    background-color: #f7f7f7;
    display: block;
    padding: 0 0 30px;
    width: 100%;
}

.pymnt-cntnt div.sctn-row {
    margin: 20px 30px 0;
    width: 740px;
}
.pymnt-cntnt div.sctn-row div.sctn-col {
    width: 345px;
}
.pymnt-cntnt div.sctn-row div.sctn-col.l {
    width: 395px;
}
.pymnt-cntnt div.sctn-row div.sctn-col input {
    width: 303px;
}
.pymnt-cntnt div.sctn-row div.sctn-col.half {
    width: 155px;
}
.pymnt-cntnt div.sctn-row div.sctn-col.half.l {
    float: left;
    width: 190px;
}
.pymnt-cntnt div.sctn-row div.sctn-col.half input {
    width: 113px;
}
.pymnt-cntnt div.sctn-row div.sctn-col.cvv {
    background-image: url("./cvv.png");
    background-position: 156px center;
    background-repeat: no-repeat;
    padding-bottom: 30px;
}
.pymnt-cntnt div.sctn-row div.sctn-col.cvv div.sctn-col.half input {
    width: 110px;
}
.openpay {
    float: right;
    height: 60px;
    margin: 10px 30px 0 0;
    width: 435px;
}
.openpay div.logo {
    background-image: url("img/openpay.png");
    background-position: left bottom;
    background-repeat: no-repeat;
    border-right: 1px solid #ccc;
    font-size: 12px;
    font-weight: 400;
    height: 45px;
    padding: 15px 20px 0 0;
}
.openpay div.shield {
    background-image: url("img/security.png");
    background-position: left bottom;
    background-repeat: no-repeat;
    font-size: 12px;
    font-weight: 400;
    margin-left: 20px;
    padding: 20px 0 0 40px;
    width: 200px;
}
.card-expl {
    float: left;
    height: 80px;
    margin: 20px 0;
    width: 800px;
}
.card-expl div {
    background-position: left 45px;
    background-repeat: no-repeat;
    height: 70px;
    padding-top: 10px;
}
.card-expl div.debit {
    background-image: url("img/cards2.png");
    margin-left: 20px;
    width: 540px;
}
.card-expl div.credit {
    background-image: url("img/cards1.png");
    border-right: 1px solid #ccc;
    margin-left: 30px;
    width: 209px;
}
.card-expl h4 {
    font-weight: 400;
    margin: 0;
}
</style>
</head> 
     <body>
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
    </body>
</html>
